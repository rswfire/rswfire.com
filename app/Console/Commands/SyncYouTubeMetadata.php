<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Google_Client;
use Google_Service_YouTube;
use App\Models\Transmission;
use Illuminate\Support\Facades\DB;

class SyncYouTubeMetadata extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'youtube:sync-metadata {--limit=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */


    public function handle()
    {

        $limit = (int)$this->option('limit');

        $client = new Google_Client();
        $client->setAuthConfig(storage_path('oauth-secret.json'));
        $client->setAccessType('offline');
        $client->setPrompt('consent');
        $client->setScopes([
            Google_Service_YouTube::YOUTUBE_FORCE_SSL,
        ]);

        $tokenPath = storage_path('oauth-tokens.json');
        if (!file_exists($tokenPath)) {
            throw new \Exception("Token file not found: {$tokenPath}");
        }
        $token = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($token);

        if ($client->isAccessTokenExpired()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            file_put_contents($tokenPath, json_encode($client->getAccessToken()));
        }

        $youtube = new Google_Service_YouTube($client);

        $transmissions = Transmission::whereNotNull('youtube_id')
            ->whereNotNull('transmission_title')
            ->whereNotNull('transmission_description')
            ->where("flag_youtube", 0)
            ->take($limit)
            ->get();

        foreach ($transmissions as $t) {
            try {
                $video = $youtube->videos->listVideos('snippet,status', [
                    'id' => $t->youtube_id,
                ])->getItems()[0] ?? null;

                if (!$video) {
                    $this->warn("Video not found: {$t->youtube_id}");
                    continue;
                }

                $description  = "Nothing here will wait for you to catch up.\n";
                $description .= "There is no summary to soften the entry.\n";
                $description .= "There is no title that reveals what it means.\n";
                $description .= "These transmissions were never meant to persuade.\n";
                $description .= "They weren’t made for you.\n";
                $description .= "And still — they are offered.\n";
                $description .= "https://rswfire.com/transmission/{$t->transmission_id}\n\n";
                $description .= $t->transmission_description;

                if (!empty($t->transmission_tags)) {
                    $tags = is_string($t->transmission_tags)
                        ? json_decode($t->transmission_tags, true)
                        : $t->transmission_tags;

                    if (is_array($tags) && count($tags)) {
                        $description .= "\n\n" . implode(', ', $tags);
                    }
                }

                $status = $video->getStatus();
                $status->setPrivacyStatus('public');
                $video->setStatus($status);

                $snippet = $video->getSnippet();
                $snippet->setTitle($t->transmission_title);
                $snippet->setDescription($description);

                $video->setSnippet($snippet);
                $youtube->videos->update('snippet,status', $video);

                DB::table('transmissions')
                    ->where('transmission_id', $t->transmission_id)
                    ->update(['flag_youtube' => 1]);

                $this->info("✅ Updated: {$t->youtube_id}");
                sleep(5);
            } catch (\Throwable $e) {
                $this->error("❌ Error for {$t->youtube_id}: " . $e->getMessage());
            }
        }
    }

}
