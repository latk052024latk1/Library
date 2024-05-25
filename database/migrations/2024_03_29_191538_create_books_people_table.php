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
        Schema::create('books_people', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('book_id');
            $table->unsignedInteger('person_id');

            $table->foreign('book_id')->references('book_id')->on('books')->onDelete('cascade');
            $table->foreign('person_id')->references('person_id')->on('people')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books_people');
    }
};
