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
        Schema::create('phonemes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('arabic_letter_id')->constrained('arabic_letters')->onDelete('cascade');
            $table->string('ipa');
            $table->string('type');
            $table->string('place_of_articulation');
            $table->string('manner_of_articulation');
            $table->string('voicing');
            $table->string('sound_effects');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phonemes');
    }
};
