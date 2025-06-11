<?php

namespace App\Models\Chronicle;

use App\BaseModel;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Conversation extends BaseModel
{
    use HasUlids;

    protected $table = "chronicle_conversations";
    protected $primaryKey = "conversation_id";

    protected $fillable = [
        "conversation_id",
        "openai_conversation_id",
        "conversation_title",
        "stamp_started",
        "stamp_ended",
        "conversation_metadata",
        "conversation_visibility",
        "conversation_vulnerability",
        "conversation_notes",
    ];

    protected $casts = [
        "conversation_metadata" => "array",
        "stamp_started" => "datetime",
        "stamp_ended" => "datetime",
    ];

    public function messages(): HasMany {
        return $this->hasMany(Message::class)->orderBy("stamp_created");
    }
}
