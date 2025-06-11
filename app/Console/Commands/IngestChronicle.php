<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use App\Models\Chronicle\Conversation;
use App\Models\Chronicle\Message;

class IngestChronicle extends Command
{
    protected $signature = 'chronicle:ingest {--file=conversations.json}';
    protected $description = 'Ingest ChatGPT archive JSON into chronicle structure';

    public function handle(): int
    {
        $path = storage_path("app/" . $this->option("file"));

        if (!file_exists($path)) {
            $this->error("File not found: $path");
            return self::FAILURE;
        }

        $data = json_decode(file_get_contents($path), true);

        if (!is_array($data)) {
            $this->error("Invalid JSON structure.");
            return self::FAILURE;
        }

        foreach ($data as $rawConv) {
            $this->processConversation($rawConv);
        }

        $this->info("Ingestion complete.");
        return self::SUCCESS;
    }

    protected function processConversation(array $rawConv): void
    {
        $conv = Conversation::create([
            "conversation_id" => Str::ulid()->toBase32(),
            "openai_conversation_id" => $rawConv["conversation_id"] ?? null,
            "conversation_title" => $rawConv["title"] ?? null,
            "stamp_started" => isset($rawConv["create_time"]) ? now()->setTimestamp($rawConv["create_time"]) : null,
            "stamp_ended" => isset($rawConv["update_time"]) ? now()->setTimestamp($rawConv["update_time"]) : null,
            "conversation_metadata" => $rawConv["conversation_metadata"] ?? null,
        ]);

        $mapping = $rawConv["mapping"] ?? [];

        $messageMap = []; // internal ID → Message instance

        // First pass: create messages without relationships
        foreach ($mapping as $id => $node) {
            $msg = $node["message"] ?? null;

            if (!$msg || empty($msg["content"]["parts"])) {
                continue;
            }

            $parts = $msg["content"]["parts"] ?? [];

            $normalized = collect($parts)
                ->flatMap(function ($part) {
                    if (is_string($part)) return [$part];

                    if (is_array($part)) {
                        // Flatten array of text chunks or rich object
                        return collect($part)
                            ->map(function ($sub) {
                                if (is_string($sub)) return $sub;
                                if (is_array($sub) && isset($sub['text'])) return $sub['text'];
                                return is_scalar($sub) ? (string)$sub : json_encode($sub);
                            })
                            ->all();
                    }

                    return [is_scalar($part) ? (string)$part : json_encode($part)];
                })
                ->filter()
                ->implode("\n");

            $content = $normalized;

            $message = new Message([
                "message_id" => Str::ulid()->toBase32(),
                "openai_message_id" => $node["id"] ?? null,
                "conversation_id" => $conv->conversation_id,
                "parent_id" => null, // set in second pass
                "message_author" => $msg["author"]["role"] === "assistant" ? "ai" : "user",
                "message_content" => $content,
                "stamp_created" => $this->safeTimestamp($msg["create_time"] ?? null),
                "message_metadata" => $msg["metadata"] ?? null,
                "message_status" => $msg["status"] ?? null,
                "end_turn" => $msg["end_turn"] ?? null,
                "child_ids" => $node["children"] ?? [],
            ]);

            $messageMap[$id] = $message;
        }

        // Second pass: set relationships + branching details
        foreach ($mapping as $id => $node) {
            $message = $messageMap[$id] ?? null;
            if (!$message) continue;

            $parentId = $node["parent"] ?? null;
            if ($parentId && isset($messageMap[$parentId])) {
                $message->parent_id = $messageMap[$parentId]->message_id;
                $message->message_depth = ($messageMap[$parentId]->message_depth ?? 0) + 1;
            }

            // Set retry info by checking siblings
            if ($parentId) {
                $siblings = collect($mapping)
                    ->filter(fn($n) => ($n["parent"] ?? null) === $parentId)
                    ->keys()
                    ->values();

                $siblingIndex = $siblings->search($id);
                $message->sibling_index = $siblingIndex;
                $message->is_retry = $siblings->count() > 1;
                $message->is_selected = ($siblings->first() === $id);
            }

            $message->save();
        }
    }

    protected function safeTimestamp($raw): \Illuminate\Support\Carbon
    {
        if (!is_numeric($raw)) return now();

        $ts = intval($raw);

        // OpenAI sometimes returns garbage like 5740900000, which is outside any sane datetime
        if ($ts < 946684800 || $ts > 4102444800) { // roughly year 2000 to 2100
            return now();
        }

        return now()->setTimestamp($ts);
    }

}
