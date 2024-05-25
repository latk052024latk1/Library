<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->mediumIncrements('book_id');
            $table->string("title", 50);
            $table->unsignedInteger('author_id');
            $table->string("desc", 200);
            $table->foreign('author_id')->references('person_id')->on('people');

            #$table->id();
            #$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
