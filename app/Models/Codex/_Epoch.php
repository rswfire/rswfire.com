<?php

namespace App\Models\Codex;

use App\Models\Codex\Transmission;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class _Epoch extends Model
{
    use HasUlids;

    protected $table = "codex__epochs";
    protected $primaryKey = "epoch_id";
    public $incrementing = false;
    protected $keyType = "string";

    const CREATED_AT = "stamp_created";
    const UPDATED_AT = "stamp_updated";
    public $timestamps = true;

    protected $fillable = [
        "epoch_title",
        "epoch_summary",
        "epoch_slug",
        "epoch_start",
        "epoch_end",
        "flag_active",
        "stamp_created",
        "stamp_updated",
    ];

    protected $casts = [
        "epoch_start" => "date",
        "epoch_end" => "date",
        "flag_active" => "boolean",
        "stamp_created" => "datetime",
        "stamp_updated" => "datetime",
    ];

    public function transmissions(): HasMany
    {
        return $this->hasMany(Transmission::class, "epoch_id");
    }
}
