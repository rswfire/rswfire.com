<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Transmission;

class TransmissionTranscripts extends Command
{
    protected $signature = 'transmission:transcripts';
    protected $description = 'Download and store deduplicated YouTube transcripts as clean text';

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

            $outputDir = storage_path("app/transcripts");
            if (!is_dir($outputDir)) mkdir($outputDir, 0755, true);

            $cookiePath = storage_path("youtubecookies.txt");

            $command = escapeshellcmd("yt-dlp --cookies '{$cookiePath}' --skip-download --write-auto-sub --sub-lang en --convert-subs srt -o '{$outputDir}/{$videoId}.%(ext)s' {$url}");


            exec($command, $output, $exitCode);

            $matches = glob("{$outputDir}/{$videoId}*.vtt");
            $vttPath = $matches[0] ?? null;

            if ($exitCode !== 0 || !$vttPath || !file_exists($vttPath)) {
                $this->warn("Transcript not found or failed for video: {$videoId}");
                continue;
            }

            $transcript = $this->parseVttTranscript($vttPath);
            if (!$transcript) {
                $this->warn("Transcript was empty or unusable: {$videoId}");
                continue;
            }

            $video->transmission_transcript = $transcript;
            $video->save();

            $this->info("Transcript saved for: {$video->transmission_title}");
        }

        $this->info("All transcripts synced.");
    }

    private function parseVttTranscript(string $vttPath): ?string
    {
        $lines = explode("\n", file_get_contents($vttPath));
        $text = [];
        $seen = [];

        foreach ($lines as $line) {
            $line = trim($line);

            if (
                $line === '' ||
                str_starts_with($line, 'WEBVTT') ||
                preg_match('/^\d{2}:\d{2}/', $line) ||
                preg_match('/^NOTE/', $line)
            ) {
                continue;
            }

            $hash = md5($line);
            if (in_array($hash, $seen)) continue;

            $seen[] = $hash;
            $text[] = $line;
        }

        return count($text) ? implode("\n", $text) : null;
    }
}
