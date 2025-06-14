<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Google_Client;
use Google_Service_YouTube;
use App\Models\Transmission;

class TransmissionSync extends Command
{
    protected $signature = "transmission:sync";
    protected $description = "Sync all YouTube videos into transmissions (public, unlisted, private).";

    public function handle()
    {
        $objClient = new Google_Client();
        $objClient->setAuthConfig(storage_path("oauth-secret.json"));
        $objClient->setAccessType("offline");
        $objClient->setRedirectUri("https://rswfire.com/oauth2callback");
        $objClient->addScope(Google_Service_YouTube::YOUTUBE_FORCE_SSL);

        $tokenPath = storage_path("oauth-tokens.json");
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $objClient->setAccessToken($accessToken);

        if ($objClient->isAccessTokenExpired()) {
            $objClient->fetchAccessTokenWithRefreshToken($objClient->getRefreshToken());
            file_put_contents($tokenPath, json_encode($objClient->getAccessToken()));
        }

        $objYouTube = new Google_Service_YouTube($objClient);

        // Step 1: Fetch video IDs using search.list
        $videoIds = [];
        $pageToken = null;

        do {
            $searchResponse = $objYouTube->search->listSearch('id', [
                'forMine' => true,
                'type' => 'video',
                'maxResults' => 50,
                'pageToken' => $pageToken,
            ]);

            foreach ($searchResponse->getItems() as $item) {
                if (isset($item['id']['videoId'])) {
                    $videoIds[] = $item['id']['videoId'];
                }
            }

            $pageToken = $searchResponse->getNextPageToken();
        } while ($pageToken);

        $videoIds = array_reverse($videoIds); // oldest to newest

        // Step 2: Fetch video details in chunks of 50
        foreach (array_chunk($videoIds, 50) as $chunk) {
            $details = $objYouTube->videos->listVideos("snippet,statistics,contentDetails", [
                "id" => implode(",", $chunk),
            ]);

            foreach ($details->getItems() as $info) {
                $videoSnippet = $info['snippet'];
                $thumbnails = $videoSnippet['thumbnails'] ?? [];
                $thumbnail =
                    $thumbnails['maxres']['url'] ??
                    $thumbnails['standard']['url'] ??
                    $thumbnails['high']['url'] ??
                    $thumbnails['medium']['url'] ??
                    $thumbnails['default']['url'] ?? '';

                $duration = $this->parseDuration($info["contentDetails"]["duration"]);
                $stats = $info["statistics"];
                $videoId = $info["id"];

                Transmission::updateOrCreate(
                    ["youtube_id" => $videoId],
                    [
                        "transmission_title" => $videoSnippet["title"],
                        "transmission_description" => $videoSnippet["description"],
                        "stamp_published" => $videoSnippet["publishedAt"],
                        "url_youtube" => "https://www.youtube.com/watch?v=" . $videoId,
                        "transmission_duration" => $duration,
                        "count_views" => $stats["viewCount"] ?? 0,
                        "count_likes" => $stats["likeCount"] ?? 0,
                        "count_comments" => $stats["commentCount"] ?? 0,
                        "stamp_updated" => now(),
                        "url_thumbnail" => $thumbnail,
                    ]
                );

                $this->info("Synced: {$videoSnippet["title"]}");
            }
        }

        $this->info("All transmissions synced successfully.");
    }

    private function parseDuration($strDuration)
    {
        $interval = new \DateInterval($strDuration);
        return ($interval->h * 3600) + ($interval->i * 60) + $interval->s;
    }
}
