<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Process;

class IngestTranscripts extends Command
{
    protected $signature = 'transcripts:ingest';
    protected $description = 'Fetch and populate YouTube transcripts';

    public function handle()
    {
        $rows = DB::table('transmissions')
            ->whereNull('transmission_transcript')
            ->select('transmission_id', 'youtube_id')
            ->get();

        foreach ($rows as $row) {
            $this->info("Fetching transcript for {$row->youtube_id}...");

            $result = Process::run("python3 scripts/fetch_transcript.py {$row->youtube_id}");

            if ($result->failed()) {
                $this->error("Failed: {$result->output()}");
                continue;
            }

            $payload = json_decode($result->output(), true);

            if (isset($payload['error'])) {
                $this->warn("Error: " . $payload['error']);
                continue;
            }

            DB::table('transmissions')
                ->where('transmission_id', $row->transmission_id)
                ->update(['transmission_transcript' => $payload['transcript']]);

            $this->info("Stored transcript for {$row->youtube_id}");
        }
    }
}
