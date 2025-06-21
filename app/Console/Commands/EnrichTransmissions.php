<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class EnrichTransmissions extends Command
{
    protected $signature = 'transmissions:enrich {--limit=1}';
    protected $description = 'Enrich transmissions with AI-generated title, description, and signal threads';

    public function handle()
    {
        $key = env('OPENAI_API_KEY');
        if (!$key) {
            $this->error('Missing OPENAI_API_KEY in .env');
            return 1;
        }

        $limit = (int) $this->option('limit');

        $rows = DB::table('transmissions')
            ->whereNotNull('transmission_transcript')
            ->whereNull('transmission_tags')
            ->where("flag_public", 1)
            ->orderBy('stamp_published', 'desc')
            ->limit($limit)
            ->get();

        if ($rows->isEmpty()) {
            $this->info('No transmissions to process.');
            return 0;
        }

        foreach ($rows as $row) {
            $this->line("Processing: {$row->youtube_id}...");
            $prompt = file_get_contents(resource_path('prompts/transcript_enrichment.txt'));
            $response = Http::withToken($key)->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-4o',
                'temperature' => 0.7,
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => $prompt,
                    ],
                    [
                        'role' => 'user',
                        'content' => "Transcript JSON:\n" . $row->transmission_transcript,
                    ]
                ]
            ]);

            if ($response->failed()) {
                $this->error("OpenAI call failed: " . $response->body());
                continue;
            }

            $data = $response->json('choices.0.message.content');

            if (!$data) {
                $this->warn('No content returned.');
                continue;
            }

            $clean = preg_replace('/^```json\\s*|\\s*```$/', '', trim($data));

            $decoded = json_decode($clean, true);
            if (!$decoded || !isset($decoded['title'], $decoded['description'], $decoded['signal_threads'])) {
                $this->warn('Malformed response: ' . $data);
                continue;
            }

            DB::table('transmissions')
                ->where('transmission_id', $row->transmission_id)
                ->update([
                    'transmission_title' => $decoded['title'],
                    'transmission_description' => $decoded['description'],
                    'transmission_tags' => json_encode($decoded['signal_threads']),
                ]);

            $this->info("✔ Stored AI enrichment for {$row->youtube_id}");
            sleep(2); // throttle to avoid hitting rate limits
        }

        return 0;
    }
}
