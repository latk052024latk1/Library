<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            //
            $table->unsignedSmallInteger("language_id")->after("desc");
            $table->foreign("language_id")->references("language_id")->on("languages");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            //
            $table->dropForeign(["language_id"]);
            $table->dropColumn("language_id");
        });
    }
};
