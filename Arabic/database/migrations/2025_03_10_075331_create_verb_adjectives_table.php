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
        Schema::create('verb_adjectives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('verb_id')->nullable(); // إضافة العمود قبل المفتاح الأجنبي
            $table->foreign('verb_id')->references('id')->on('verbs')->onDelete('set null');
            $table->text('marrah_noun');
            $table->text('haiah_noun');
            $table->text('meme_noun');
            $table->text('similar_adjective');
            $table->text('Exaggeration_formula');
            $table->text('subject_noun');
            $table->text('affected_noun');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verb_adjectives');
    }
};
