<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Video;

class SyncYouTubeTranscripts extends Command
{
    protected $signature = 'sync:transcripts';
    protected $description = 'Download and store deduplicated YouTube transcripts as clean text';

    public function handle()
    {
        $videos = Video::where(function ($query) {
            $query->whereNull('video_transcript')
                ->orWhereRaw('TRIM(video_transcript) = ""');
        })->get();

        foreach ($videos as $video) {
            $videoId = $video->youtube_id;
            $url = "https://www.youtube.com/watch?v={$videoId}";

            $this->info("Fetching transcript for: {$video->video_title}");

            $outputDir = storage_path("app/transcripts");
            if (!is_dir($outputDir)) mkdir($outputDir, 0755, true);

            $originalCookieFile = storage_path("youtubecookies.txt");
            $cookieCopyPath = storage_path("app/tmp_cookies.txt");
            copy($originalCookieFile, $cookieCopyPath);
            chmod($cookieCopyPath, 0644);

            $command = escapeshellcmd("yt-dlp --cookies '{$cookieCopyPath}' --skip-download --write-auto-sub --sub-lang en --output '{$outputDir}/{$videoId}.%(ext)s' {$url}");

            exec($command, $output, $exitCode);

            unlink($cookieCopyPath); // Cleanup temp cookie

            // Find the .vtt file
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

            $video->video_transcript = $transcript;
            $video->save();

            $this->info("Transcript saved for: {$video->video_title}");
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

            // Skip timestamps and metadata
            if (
                $line === '' ||
                str_starts_with($line, 'WEBVTT') ||
                preg_match('/^\d{2}:\d{2}/', $line) ||
                preg_match('/^NOTE/', $line)
            ) {
                continue;
            }

            // Deduplicate lines
            $hash = md5($line);
            if (in_array($hash, $seen)) continue;

            $seen[] = $hash;
            $text[] = $line;
        }

        return count($text) ? implode("\n", $text) : null;
    }
}
