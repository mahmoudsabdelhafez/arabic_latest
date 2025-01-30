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
        Schema::create('seeking_refuges', function (Blueprint $table) {
            $table->id();
            $table->text('formula'); // صيغة الاستعاذة
            $table->text('ruling'); // حكم الاستعاذة
            $table->text('cases')->nullable(); // حالات الاستعاذة
            $table->text('note')->nullable(); // ملاحظة
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seeking_refuges');
    }
};
