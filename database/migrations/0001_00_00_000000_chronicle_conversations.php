<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("chronicle_conversations", function (Blueprint $objTable) {
            $objTable->ulid("conversation_id")->primary();
            $objTable->uuid("openai_conversation_id")->nullable();
            $objTable->string("conversation_title")->nullable();
            $objTable->enum("conversation_visibility", ["public", "private", "protected", "draft"])->default("draft");
            $objTable->decimal("conversation_vulnerability", 4, 3)->nullable();
            $objTable->text("conversation_notes")->nullable();
            $objTable->json("conversation_metadata")->nullable();

            $objTable->timestamp("stamp_created")->useCurrent();
            $objTable->timestamp("stamp_updated")->useCurrent()->useCurrentOnUpdate();
            $objTable->timestamp("stamp_started")->nullable();
            $objTable->timestamp("stamp_ended")->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("chronicle_conversations");
    }
};
