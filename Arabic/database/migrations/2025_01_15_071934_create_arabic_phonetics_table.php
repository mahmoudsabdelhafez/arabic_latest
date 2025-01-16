<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('arabic_phonetics', function (Blueprint $table) {
            $table->id();
            $table->char('arabic_letter', 1)->collation('utf8mb4_general_ci');
            $table->string('phonetic_representation', 100)->collation('utf8mb4_general_ci');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('arabic_phonetics');
    }
};
