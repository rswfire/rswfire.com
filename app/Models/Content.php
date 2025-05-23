<?php

namespace App\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Content extends BaseModel
{
    use HasUlids;

    protected $table = "content";
    protected $primaryKey = "content_id";

    protected $fillable = [
        "content_type",
        "content_title",
        "content_body",
        "content_meta",
    ];

    protected $casts = [
        "content_meta" => "array",
    ];
}
