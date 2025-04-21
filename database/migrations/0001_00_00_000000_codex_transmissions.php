<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("codex_transmissions", function (Blueprint $objTable) {
            $objTable->ulid("transmission_id")->primary();
            $objTable->string("youtube_id", 20)->unique();

            $objTable->string("transmission_title", 255);
            $objTable->text("transmission_description");
            $objTable->unsignedInteger("transmission_duration")->default(0);

            $objTable->unsignedBigInteger("count_comments")->default(0);
            $objTable->unsignedBigInteger("count_likes")->default(0);
            $objTable->unsignedBigInteger("count_views")->default(0);

            $objTable->longText("transmission_transcript")->nullable();
            $objTable->longText("transmission_ai_notes")->nullable();
            $objTable->longText("transmission_ai_reflections")->nullable();

            $objTable->string("url_s3", 500)->default("");
            $objTable->string("url_youtube", 500)->default("");

            $objTable->json("transmission_flags")->nullable();
            $objTable->json("transmission_tags")->nullable();

            $objTable->foreignUlid("anchor_id")->nullable()->constrained("codex__anchors", "anchor_id")->nullOnDelete();
            $objTable->json("anchor_trace")->nullable();

            $objTable->foreignUlid("epoch_id")->nullable()->constrained("codex__epochs", "epoch_id")->nullOnDelete();
            $objTable->string("epoch_signature", 255)->default("");

            $objTable->decimal("transmission_latitude", 10, 7)->nullable();
            $objTable->decimal("transmission_longitude", 10, 7)->nullable();

            $objTable->boolean("flag_public")->default(true);

            $objTable->timestamp("stamp_created")->useCurrent();
            $objTable->dateTime("stamp_published")->nullable();
            $objTable->timestamp("stamp_updated")->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("codex_transmissions");
    }
};
