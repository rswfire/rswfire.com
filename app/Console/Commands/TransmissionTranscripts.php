<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Transmission;

class TransmissionTranscripts extends Command
{
    protected $signature = 'transmission:transcripts-curl';
    protected $description = 'Fetch and save YouTube auto-transcripts via direct JSON API';

    public function handle()
    {
        $videos = Transmission::whereNull('transmission_transcript')
            ->orWhereRaw('TRIM(transmission_transcript) = ""')
            ->get();

        foreach ($videos as $video) {
            $id = $video->youtube_id;
            $url = "https://www.youtube.com/watch?v={$id}";
            $this->info("📡 Fetching transcript for: {$video->transmission_title}");

            $html = $this->curlGet($url);
            if (!$html) { $this->warn("Failed to fetch page."); continue; }

            if (!preg_match(
                '/raw_player_response\s*=\s*(\{.+?\});/',
                $html, $m
            )) {
                $this->warn("raw_player_response not found.");
                continue;
            }

            $json = json_decode($m[1], true);
            $tracks = $json['captions']['playerCaptionsTracklistRenderer']['captionTracks'] ?? null;
            if (!$tracks || empty($tracks)) {
                $this->warn("No captionTracks found.");
                continue;
            }

            $base = $tracks[0]['baseUrl'];
            $caps = $this->curlGet("{$base}&fmt=json3");
            if (!$caps) { $this->warn("Transcript fetch failed."); continue; }

            $capsJson = json_decode($caps, true);
            $text = implode("\n", array_map(
                fn($e) => implode('', array_column($e['segs'] ?? [], 'utf8')),
                $capsJson['events'] ?? []
            ));

            if (!$text) { $this->warn("Empty transcript."); continue; }

            $video->transmission_transcript = $text;
            $video->save();

            $this->info("✅ Saved transcript for: {$id}");
        }

        $this->info("All done.");
    }

    private function curlGet($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
        $res = curl_exec($ch);
        $ok = curl_getinfo($ch, CURLINFO_HTTP_CODE) === 200;
        curl_close($ch);
        return $ok ? $res : null;
    }
}
