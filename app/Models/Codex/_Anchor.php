<?php

namespace App\Models\Codex;

use App\Models\Codex\Transmission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class _Anchor extends Model
{
    protected $table = "codex__anchors";
    protected $primaryKey = "anchor_id";
    public $incrementing = false;
    protected $keyType = "string";

    const CREATED_AT = "stamp_created";
    const UPDATED_AT = "stamp_updated";
    public $timestamps = true;

    protected $fillable = [
        "anchor_title",
        "anchor_summary",
        "anchor_tags",
        "flag_active",
        "stamp_created",
        "stamp_updated",
    ];

    protected $casts = [
        "anchor_tags" => "array",
        "flag_active" => "boolean",
        "stamp_created" => "datetime",
        "stamp_updated" => "datetime",
    ];

    public function transmissions(): HasMany
    {
        return $this->hasMany(Transmission::class, "anchor_id");
    }
}
