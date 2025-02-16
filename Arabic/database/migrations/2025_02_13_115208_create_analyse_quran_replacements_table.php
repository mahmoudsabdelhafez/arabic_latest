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
        Schema::create('analyse_quran_replacements', function (Blueprint $table) {
            $table->id();
            $table->string('original', 10);
            $table->string('replacement', 10);
            $table->string('next_string', 10);
            $table->string('word_position', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analyse_quran_replacements');
    }
};
