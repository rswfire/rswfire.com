<?php

namespace App\Models\Codex;

use App\Models\Codex\_Anchor;
use App\Models\Codex\_Epoch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transmission extends Model
{
    protected $table = "codex_transmissions";
    protected $primaryKey = "transmission_id";
    public $incrementing = false;
    protected $keyType = "string";

    const CREATED_AT = "stamp_created";
    const UPDATED_AT = "stamp_updated";
    public $timestamps = true;

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
    ];

    public function anchor(): BelongsTo
    {
        return $this->belongsTo(CodexAnchor::class, "anchor_id");
    }

    public function epoch(): BelongsTo
    {
        return $this->belongsTo(CodexEpoch::class, "epoch_id");
    }
}
