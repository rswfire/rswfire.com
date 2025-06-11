<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create("chronicle_messages", function (Blueprint $objTable) {
            $objTable->ulid("message_id")->primary();
            $objTable->ulid("conversation_id");
            $objTable->ulid("parent_id")->nullable();
            $objTable->enum("message_author", ["user", "ai"]);
            $objTable->longText("message_content");
            $objTable->unsignedInteger("sibling_index")->default(0);
            $objTable->boolean("is_retry")->default(false);
            $objTable->boolean("is_selected")->default(true);
            $objTable->unsignedInteger("message_depth")->default(0);

            $objTable->uuid("openai_message_id")->nullable();
            $objTable->json("message_metadata")->nullable();
            $objTable->json("child_ids")->nullable();
            $objTable->boolean("end_turn")->nullable();
            $objTable->string("message_status")->nullable();

            $objTable->timestamp("stamp_created")->useCurrent();
            $objTable->timestamp("stamp_updated")->useCurrent()->useCurrentOnUpdate();

            $objTable->foreign("conversation_id", "fidx_conversation-id")
                ->references("conversation_id")
                ->on("chronicle_conversations")
                ->onDelete("cascade");

            $objTable->foreign("parent_id", "fidx_message-id")
                ->references("message_id")
                ->on("chronicle_messages")
                ->onDelete("cascade");
        });
    }

    public function down(): void {
        Schema::dropIfExists("chronicle_messages");
    }
};
