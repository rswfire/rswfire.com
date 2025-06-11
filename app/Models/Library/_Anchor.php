<?php

namespace App\Models\Library;

use App\BaseModel;
use App\Models\Library\Transmission;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\HasMany;

class _Anchor extends BaseModel
{
    use HasUlids;

    protected $table = "library__anchors";
    protected $primaryKey = "anchor_id";

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
