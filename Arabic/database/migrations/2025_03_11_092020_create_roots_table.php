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
        Schema::create('roots', function (Blueprint $table) {
            $table->id();
            $table->string('root'); // الفعل
            $table->unsignedBigInteger('type_id')->nullable(); // إضافة العمود قبل المفتاح الأجنبي
            $table->unsignedBigInteger('sensual_moral_type_id')->nullable(); // إضافة العمود قبل المفتاح الأجنبي
            $table->foreign('type_id')->references('id')->on('verb_types')->onDelete('set null');
            $table->foreign('sensual_moral_type_id')->references('id')->on('sensual_moral_types')->onDelete('set null');
            $table->text('example');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roots');
    }
};
