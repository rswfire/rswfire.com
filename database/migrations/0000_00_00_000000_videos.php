<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("videos", function (Blueprint $objTable) {
            $objTable->bigIncrements("video_id");
            $objTable->string("youtube_id", 20)->unique();
            $objTable->string("video_title", 255);
            $objTable->text("video_description");
            $objTable->integer("video_duration");
            $objTable->unsignedBigInteger("count_views");
            $objTable->unsignedBigInteger("count_likes");
            $objTable->unsignedBigInteger("count_comments");

            $objTable->longText("video_transcript");
            $objTable->longText("video_reflection_ai");
            $objTable->longText("video_reflection_ai_later");

            $objTable->string("url_s3", 500);
            $objTable->string("url_youtube", 500);

            $objTable->json("video_tags")->nullable();
            $objTable->json("video_flags")->nullable();

            $objTable->timestamp("stamp_created")->useCurrent();
            $objTable->dateTime("stamp_published")->nullable();
            $objTable->timestamp("stamp_updated")->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("videos");
    }
};
