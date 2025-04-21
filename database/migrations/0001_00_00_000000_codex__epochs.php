<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("codex__epochs", function (Blueprint $table) {
            $table->ulid("epoch_id")->primary();
            $table->string("epoch_title", 255);
            $table->text("epoch_slug");
            $table->string("epoch_signature", 255)->unique();
            $table->date("epoch_start")->nullable();
            $table->date("epoch_end")->nullable();
            $table->boolean("flag_active")->default(true);

            $table->timestamp("stamp_created")->useCurrent();
            $table->timestamp("stamp_updated")->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("codex__epochs");
    }
};
