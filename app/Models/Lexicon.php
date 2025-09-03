<?php

namespace App\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Lexicon extends BaseModel
{
    use HasUlids;

    protected $table = "com_lexicon";
    protected $primaryKey = "lexicon_id";

    protected $fillable = [
        "lexicon_term",
        "lexicon_slug",
        "lexicon_essence",
        "lexicon_expanded",
        "lexicon_category",
        "lexicon_links",
        "tonality_mythic",
        "tonality_clinical",
        "tonality_poetic",
        "tonality_tactical",
    ];

}
