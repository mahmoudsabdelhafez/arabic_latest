<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('arabic_letter_adjectives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('arabic_letter_id');
            $table->boolean('exception')->default(false);
            $table->timestamps();

            // Foreign keys
            $table->foreign('category_id')->references('id')->on('nun_sakinah_and_tanween_rules')->onDelete('cascade');
            $table->foreign('arabic_letter_id')->references('id')->on('arabic_letters')->onDelete('cascade');

            // Unique constraint to prevent duplicate letter-category combinations
            $table->unique(['category_id', 'arabic_letter_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('arabic_letter_adjectives');
    }
};

