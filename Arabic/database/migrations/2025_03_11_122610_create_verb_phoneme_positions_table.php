<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('verb_phoneme_positions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('augmented_three_letter_verb_id')->constrained()->onDelete('cascade');
            $table->foreignId('phoneme_activitie_id')->constrained()->onDelete('cascade');
            $table->integer('position');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('verb_phoneme_positions');
    }
};
