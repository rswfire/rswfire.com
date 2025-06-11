<?php

namespace App\Models\Library;

use App\BaseModel;
use App\Models\Library\_Anchor as LibraryAnchor;
use App\Models\Library\_Epoch as LibraryEpoch;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transmission extends BaseModel
{
    use HasUlids;

    protected $table = "library_transmissions";
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
        return $this->belongsTo(LibraryAnchor::class, "anchor_id");
    }

    public function epoch(): BelongsTo
    {
        return $this->belongsTo(LibraryEpoch::class, "epoch_id");
    }
}
