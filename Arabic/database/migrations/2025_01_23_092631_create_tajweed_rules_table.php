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
        Schema::create('tajweed_rules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('tajweed_categories')->onDelete('cascade');
            $table->string('rule_name'); // Name of the Tajweed rule
            $table->text('description')->nullable(); // Detailed description of the rule
            $table->boolean('applies_to_letters')->default(true);
            $table->boolean('applies_to_diacritics')->default(false);
            $table->text('examples')->nullable(); // Examples of the rule's application
            $table->tinyInteger('priority')->default(1); // Priority of the rule
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tajweed_rules');
    }
};
