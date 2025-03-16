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
        Schema::create('sensual_adjectives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('verb_id')->nullable(); // إضافة العمود قبل المفتاح الأجنبي
            $table->foreign('verb_id')->references('id')->on('verbs')->onDelete('set null');
            $table->text('tool_name');
            $table->text('place_name');
            $table->text('time_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensual_adjectives');
    }
};
