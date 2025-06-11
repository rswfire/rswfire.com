<?php

namespace App\Models\Library;

use App\BaseModel;
use App\Models\Library\Transmission;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\HasMany;

class _Epoch extends BaseModel
{
    use HasUlids;

    protected $table = "library__epochs";
    protected $primaryKey = "epoch_id";

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
