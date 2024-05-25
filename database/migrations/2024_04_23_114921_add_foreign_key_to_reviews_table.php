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
        Schema::table('reviews', function (Blueprint $table) {
            //
            $table->unsignedInteger("book_id")->after("review_id");
            $table->foreign("book_id")->references("book_id")->on("books");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            //
            $table->dropForeign(["book_id"]);
            $table->dropColumn("book_id");
        });
    }
};
