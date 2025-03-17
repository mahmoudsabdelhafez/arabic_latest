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
        Schema::create('root_letters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('letter_id')->nullable(); // إضافة العمود قبل المفتاح الأجنبي
            $table->foreign('letter_id')->references('id')->on('arabic_letters')->onDelete('set null');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('root_letters');
    }
};
