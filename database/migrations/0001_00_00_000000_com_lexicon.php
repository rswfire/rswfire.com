<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create("com_lexicon", function (Blueprint $objTable) {
            $objTable->ulid("lexicon_id")->primary();
            $objTable->string("lexicon_term")->unique();
            $objTable->string("lexicon_slug")->unique();
            $objTable->text("lexicon_essence");
            $objTable->longText("lexicon_expanded");
            $objTable->string("lexicon_category");
            $objTable->string("lexicon_links")->nullable();
            $objTable->text("tonality_mythic")->nullable();
            $objTable->text("tonality_clinical")->nullable();
            $objTable->text("tonality_poetic")->nullable();
            $objTable->text("tonality_tactical")->nullable();
            $objTable->timestamp("stamp_created")->useCurrent();
            $objTable->timestamp("stamp_updated")->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down()
    {
        Schema::dropIfExists("com_lexicon");
    }
};
