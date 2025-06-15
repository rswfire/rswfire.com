<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Transmission;
use Illuminate\Support\Facades\Http;

class TransmissionTranscripts extends Command
{
    protected $signature = 'transmission:transcripts';
    protected $description = 'Fetch and save auto-generated YouTube transcripts';

    public function handle()
    {
        $apiKey = config('services.youtube.key');

        Transmission::whereNull('transmission_transcript')
            ->orWhere('transmission_transcript', '')
            ->chunk(50, function ($videos) use ($apiKey) {
                foreach ($videos as $video) {
                    $id = $video->youtube_id;
                    $this->info("Processing $id …");

                    $resp = Http::post(
                        "https://youtubei.googleapis.com/youtubei/v1/player?key={$apiKey}",
                        [
                            "context" => [
                                "client" => [
                                    "clientName" => "WEB",
                                    "clientVersion" => "2.20210622.10.03"
                                ]
                            ],
                            "videoId" => $id
                        ]
                    );

                    if (!$resp->ok()) {
                        $this->warn("Failed fetching player for $id");
                        continue;
                    }

                    $tracks = $resp->json('captions.playerCaptionsTracklistRenderer.captionTracks', []);
                    $en = collect($tracks)->first(fn($t)=> $t['languageCode'] === 'en');

                    if (!$en || empty($en['baseUrl'])) {
                        $this->warn("No English captions for $id");
                        continue;
                    }

                    $caps = Http::get($en['baseUrl'])->json();
                    $events = collect($caps['events'] ?? []);
                    $text = $events->flatMap(function ($e) {
                        return array_filter(array_map(fn($s)=> $s['utf8'] ?? '', $e['segs'] ?? []));
                    })->join("\n");

                    if (empty($text)) {
                        $this->warn("Empty transcript for $id");
                        continue;
                    }

                    $video->transmission_transcript = $text;
                    $video->save();
                    $this->info("Saved transcript for $id");
                }
            });
        $this->info("All done.");
    }
}
