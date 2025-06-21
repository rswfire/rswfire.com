<?php

namespace App\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Transmission extends BaseModel
{
    use HasUlids;

    protected $table = "transmissions";
    protected $primaryKey = "transmission_id";

    protected $fillable = [
        "youtube_id",
        "transmission_title",
        "transmission_description",
        "transmission_duration",
        "count_comments",
        "count_likes",
        "count_views",
        "transmission_transcript",
        "transmission_ai_notes",
        "transmission_ai_reflections",
        "url_s3",
        "url_thumbnail",
        "url_youtube",
        "transmission_flags",
        "transmission_tags",
        "anchor_id",
        "anchor_trace",
        "epoch_id",
        "epoch_signature",
        "transmission_latitude",
        "transmission_longitude",
        "flag_public",
        "stamp_created",
        "stamp_published",
        "stamp_updated",
        "is_portrait",
    ];

    protected $casts = [
        "transmission_flags" => "array",
        "transmission_tags" => "array",
        "anchor_trace" => "array",
        "flag_public" => "boolean",
        "stamp_created" => "datetime",
        "stamp_published" => "datetime",
        "stamp_updated" => "datetime",
        "transmission_latitude" => "float",
        "transmission_longitude" => "float",
        "is_portrait" => "boolean",
    ];

}
