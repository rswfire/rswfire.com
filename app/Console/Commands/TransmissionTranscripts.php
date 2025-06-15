<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Transmission;

class TransmissionTranscripts extends Command
{
    protected $signature = 'transmission:transcripts';
    protected $description = 'Download auto-generated YouTube transcripts via HTTP and save to "transmission_transcript"';

    public function handle()
    {
        $videos = Transmission::whereNull('transmission_transcript')
            ->orWhereRaw('TRIM(transmission_transcript) = ""')
            ->get();

        foreach ($videos as $video) {
            $id = $video->youtube_id;
            $this->info("Fetching transcript for: {$video->transmission_title}");

            $xml = @file_get_contents(
                "http://video.google.com/timedtext?lang=en&v={$id}"
            );

            if (!$xml) {
                $this->warn("No transcript found for: {$id}");
                continue;
            }

            $text = '';
            libxml_use_internal_errors(true);
            $doc = new \DOMDocument();
            if (!@$doc->loadXML($xml)) {
                $this->warn("Failed parsing XML for: {$id}");
                continue;
            }

            foreach ($doc->getElementsByTagName('text') as $node) {
                $text .= html_entity_decode($node->textContent) . "\n";
            }

            $clean = trim(preg_replace('/\s+/', ' ', $text));
            if (!$clean) {
                $this->warn("Transcript empty after cleanup for {$id}");
                continue;
            }

            $video->transmission_transcript = $clean;
            $video->save();

            $this->info("Saved transcript for: {$video->transmission_title}");
        }

        $this->info("All done.");
    }
}
