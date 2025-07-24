<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create("contact_messages", function (Blueprint $objTable) {
            $objTable->ulid("message_id")->primary();
            $objTable->string("message_name");
            $objTable->string("message_email")->nullable();
            $objTable->string("message_subject")->nullable();
            $objTable->text("message");
            $objTable->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists("contact_messages");
    }

};
