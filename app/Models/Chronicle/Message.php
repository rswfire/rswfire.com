<?php

namespace App\Models\Chronicle;

use App\BaseModel;
use App\Models\Conversation as ChronicleConversation;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Message extends BaseModel
{
    use HasUlids;

    protected $table = "chronicle_messages";
    protected $primaryKey = "message_id";

    protected $fillable = [
        "message_id",
        "conversation_id",
        "parent_id",
        "openai_message_id",
        "message_author",
        "message_content",
        "message_metadata",
        "child_ids",
        "end_turn",
        "message_status",
        "sibling_index",
        "is_retry",
        "is_selected",
        "message_depth",
        "stamp_created",
    ];

    protected $casts = [
        "message_metadata" => "array",
        "child_ids" => "array",
        "end_turn" => "boolean",
        "is_retry" => "boolean",
        "is_selected" => "boolean",
        "stamp_created" => "datetime",
    ];


    public function conversation(): BelongsTo
    {
        return $this->belongsTo(ChronicleConversation::class, "conversation_id");
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Message::class, "parent_id");
    }

    public function children(): HasMany
    {
        return $this->hasMany(Message::class, "parent_id");
    }
}
