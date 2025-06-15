<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Transmission;

class TransmissionTranscripts extends Command {
    protected $signature = 'transmission:transcripts';
    public function handle() {
        $videos = Transmission::whereNull('transmission_transcript')->get();
        foreach ($videos as $vid) {
            $id = $vid->youtube_id;
            $resp = file_get_contents("https://youtube.com/get_video_info?video_id=$id");
            parse_str($resp, $data);
            $pr = json_decode($data['player_response'] ?? '{}', true);
            // find English ASR track
            $track = collect($pr['captions']['playerCaptionsTracklistRenderer']['captionTracks'] ?? [])
                ->first(fn($t)=> $t['languageCode']=='en' && $t['kind']=='asr');
            if (!$track) { $this->warn("$id: no ASR captions"); continue; }
            $xmlUrl = $track['baseUrl'];
            $xml = @simplexml_load_file($xmlUrl);
            if (!$xml) { $this->warn("$id: couldn’t fetch XML"); continue;}
            $text = implode("\n", array_map('trim', (array)$xml->text));
            Transmission::where('youtube_id',$id)->update(['transmission_transcript' => $text]);
            $this->info("$id: saved transcript");
        }
    }
}
