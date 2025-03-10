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
        Schema::create('sentences_parts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sentence_id')->constrained('sentences')->onDelete('cascade');
            $table->string('name', 255); // الأداة
            $table->text('description'); // وصف
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sentences_parts');
    }
};
