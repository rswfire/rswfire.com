<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = "videos";
    protected $primaryKey = "video_id";

    public $timestamps = false;

    protected $fillable = [
        "youtube_id",
        "video_title",
        "video_description",
        "video_duration",
        "count_views",
        "count_likes",
        "count_comments",
        "video_transcript",
        "video_reflection_ai",
        "video_reflection_ai_later",
        "url_s3",
        "url_youtube",
        "video_tags",
        "video_flags",
        "stamp_created",
        "stamp_published",
        "stamp_updated",
    ];

    protected $casts = [
        "video_tags" => "array",
        "video_flags" => "array",
        "stamp_created" => "datetime",
        "stamp_published" => "datetime",
        "stamp_updated" => "datetime",
    ];
}
