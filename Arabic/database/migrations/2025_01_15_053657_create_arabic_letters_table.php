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
        Schema::create('arabic_letters', function (Blueprint $table) {
            $table->id();
            $table->char('letter', 1)->collation('utf8mb4_general_ci');
            $table->string('unicode_value', 10)->collation('utf8mb4_general_ci');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arabic_letters');
    }
};
