<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('arabic_three_letter_combinations', function (Blueprint $table) {
            $table->id();
            $table->string('combination', 3)->collation('utf8mb4_general_ci');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('arabic_three_letter_combinations');
    }
};
