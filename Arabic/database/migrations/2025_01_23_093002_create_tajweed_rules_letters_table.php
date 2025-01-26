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
        Schema::create('tajweed_rules_letters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tajweed_rule_id')->constrained('tajweed_rules')->onDelete('cascade'); // Foreign key to Tajweed rules
            $table->foreignId('letter_1_id')->constrained('letters')->onDelete('cascade'); // Foreign key to Letters table
            $table->foreignId('letter_2_id')->nullable()->constrained('arabic_letters')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tajweed_rules_letters');
    }
};
