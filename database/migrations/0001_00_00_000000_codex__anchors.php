<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("codex__anchors", function (Blueprint $objTable) {
            $objTable->ulid("anchor_id")->primary();
            $objTable->string("anchor_title", 255);
            $objTable->text("anchor_summary")->default("");
            $objTable->json("anchor_tags")->nullable();
            $objTable->boolean("flag_active")->default(true);

            $objTable->timestamp("stamp_created")->useCurrent();
            $objTable->timestamp("stamp_updated")->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("codex__anchors");
    }
};
