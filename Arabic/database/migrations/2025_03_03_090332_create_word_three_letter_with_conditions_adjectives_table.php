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
        Schema::create('word_three_letter_with_conditions_adjectives', function (Blueprint $table) {
            $table->id();
            $table->string('word', 3)->unique(); // تخزين الكلمات الثلاثية
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('word_three_letter_with_conditions_adjectives');
    }
};
