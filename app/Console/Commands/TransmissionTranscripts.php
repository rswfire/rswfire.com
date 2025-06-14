<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Transmission;

class TransmissionTranscripts extends Command
{
    protected $signature = 'transmission:transcripts';
    protected $description = 'Fetch and save auto-generated YouTube transcripts for unlisted videos.';

    public function handle()
    {
        $videos = Transmission::where(function ($query) {
            $query->whereNull('transmission_transcript')
                ->orWhereRaw('TRIM(transmission_transcript) = ""');
        })->get();

        foreach ($videos as $video) {
            $videoId = $video->youtube_id;
            $url = "https://www.youtube.com/watch?v={$videoId}";

            $this->info("Fetching transcript for: {$video->transmission_title}");

            $html = shell_exec("curl -s '{$url}'");
            if (!$html) {
                $this->warn("Could not fetch YouTube page.");
                continue;
            }

            if (!preg_match('/"captions":\{(.*?)\}\,"videoDetails"/s', $html, $matches)) {
                $this->warn("No captions found on page.");
                continue;
            }

            $captionsJson = json_decode('{' . $matches[1] . '}', true);
            $captionTracks = $captionsJson['playerCaptionsTracklistRenderer']['captionTracks'] ?? null;

            if (!$captionTracks || !isset($captionTracks[0]['baseUrl'])) {
                $this->warn("No caption tracks available.");
                continue;
            }

            $captionUrl = $captionTracks[0]['baseUrl'] . '&fmt=json3';
            $jsonTranscript = shell_exec("curl -s '{$captionUrl}'");

            if (!$jsonTranscript) {
                $this->warn("Failed to download transcript JSON.");
                continue;
            }

            $parsed = json_decode($jsonTranscript, true);
            $events = $parsed['events'] ?? [];

            $text = collect($events)
                ->map(function ($event) {
                    return collect($event['segs'] ?? [])->pluck('utf8')->join('');
                })
                ->filter()
                ->implode("\n");

            if (trim($text) === '') {
                $this->warn("Transcript is empty after parsing.");
                continue;
            }

            // Save to database
            $video->transmission_transcript = $text;
            $video->save();

            // Save to file
            $outputDir = storage_path("app/transcripts");
            if (!is_dir($outputDir)) mkdir($outputDir, 0755, true);

            file_put_contents("{$outputDir}/{$videoId}.txt", $text);

            $this->info("Transcript saved for: {$video->transmission_title}");
        }

        $this->info("All transcripts processed.");
    }
}
