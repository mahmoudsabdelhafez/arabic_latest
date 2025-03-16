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
        Schema::create('augmented_three_letter_verbs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('root_id')->nullable(); // إضافة العمود قبل المفتاح الأجنبي
            $table->foreign('root_id')->references('id')->on('roots')->onDelete('set null');
            $table->unsignedBigInteger('word_type_id')->nullable(); // إضافة العمود قبل المفتاح الأجنبي
            $table->foreign('word_type_id')->references('id')->on('word_types')->onDelete('set null');
            $table->text('addition_type');
            $table->text('pattern');
            $table->text('pattern_name');
            $table->text('example');
            $table->text('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('augmented_three_letter_verbs');
    }
};
