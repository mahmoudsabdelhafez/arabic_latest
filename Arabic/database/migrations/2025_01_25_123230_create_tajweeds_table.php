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
        Schema::create('tajweeds', function (Blueprint $table) {
            $table->id();
            $table->string('rule_name'); // Name of the tajweed rule
            $table->foreignId('category_id')->constrained('tajweed_categories') ->cascadeOnDelete(); 
            $table->string('expression')->nullable(); // Expression or symbols
            $table->text('description')->nullable(); // Detailed explanation
            $table->text('example_ayah')->nullable(); // Example ayah
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tajweeds');
    }
};
