<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create("content", function (Blueprint $objTable) {
            $objTable->ulid("content_id")->primary();
            $objTable->string("content_type");
            $objTable->string("content_title")->nullable();
            $objTable->longText("content_body");
            $objTable->json("content_meta")->nullable();
            $objTable->timestamp("stamp_created")->useCurrent();
            $objTable->dateTime("stamp_published")->nullable();
            $objTable->timestamp("stamp_updated")->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void {
        Schema::dropIfExists("content");
    }
};
