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
        Schema::create('root_word_suffixes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('root_word_id')->constrained('root_words')->onDelete('cascade');
            $table->foreignId('suffix_id')->constrained('suffixes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('root_word_suffixes');
    }
};
