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

        $channels = $objYouTube->channels->listChannels("contentDetails", ["mine" => true]);
        $uploadsPlaylistId = $channels[0]["contentDetails"]["relatedPlaylists"]["uploads"];

        $arrAllVideos = [];
        $strPageToken = null;

        do {
            $response = $objYouTube->playlistItems->listPlaylistItems("snippet", [
                "playlistId" => $uploadsPlaylistId,
                "maxResults" => 50,
                "pageToken" => $strPageToken,
            ]);

            $arrAllVideos = array_merge($arrAllVideos, $response->getItems());
            $strPageToken = $response->getNextPageToken();
        } while ($strPageToken);

        $arrAllVideos = array_reverse($arrAllVideos);

        foreach ($arrAllVideos as $objVideo) {
            $strYouTubeId = $objVideo["snippet"]["resourceId"]["videoId"];
            $objSnippet = $objVideo["snippet"];

            $details = $objYouTube->videos->listVideos("snippet,statistics,contentDetails", [
                "id" => $strYouTubeId,
            ]);

            if (count($details->getItems()) === 0) {
                $this->warn("No details for video: $strYouTubeId");
                continue;
            }

            $info = $details[0];
            $videoSnippet = $info['snippet'];
            $thumbnails = $videoSnippet['thumbnails'] ?? [];
            $thumbnail =
                $thumbnails['maxres']['url'] ??
                $thumbnails['standard']['url'] ??
                $thumbnails['high']['url'] ??
                $thumbnails['medium']['url'] ??
                $thumbnails['default']['url'] ??
                '';
            $duration = $this->parseDuration($info["contentDetails"]["duration"]);
            $stats = $info["statistics"];

            Transmission::updateOrCreate(
                ["youtube_id" => $strYouTubeId],
                [
                    "transmission_title" => $objSnippet["title"],
                    "transmission_description" => $objSnippet["description"],
                    "stamp_published" => $objSnippet["publishedAt"],
                    "url_youtube" => "https://www.youtube.com/watch?v=" . $strYouTubeId,
                    "transmission_duration" => $duration,
                    "count_views" => $stats["viewCount"] ?? 0,
                    "count_likes" => $stats["likeCount"] ?? 0,
                    "count_comments" => $stats["commentCount"] ?? 0,
                    "stamp_updated" => now(),
                    'url_thumbnail' => $thumbnail,
                ]
            );

            $this->info("Synced transmission: {$objSnippet["title"]}");
        }

        $this->info("All transmissions synced successfully.");
    }

    private function parseDuration($strDuration)
    {
        $interval = new \DateInterval($strDuration);
        return ($interval->h * 3600) + ($interval->i * 60) + $interval->s;
    }
}
