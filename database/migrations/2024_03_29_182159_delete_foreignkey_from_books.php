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
            if (Schema::hasColumn('books', 'author_id')) {
                $table->dropForeign(['author_id']);
                $table->dropColumn('author_id');
            }
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            //
                // Add back the 'author_id' column
            $table->unsignedInteger('author_id');
                
                // Add foreign key constraint
            $table->foreign('author_id')->references('person_id')->on('people');
        
        });
    }
};
