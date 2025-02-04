<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('arabic_tools_leters_diacritics', function (Blueprint $table) {
        $table->id();
        $table->foreignId('arabic_tool_id')->constrained('arabic_tools')->onDelete('cascade');
        $table->foreignId('arabic_letter_id')->constrained('arabic_leters')->onDelete('cascade');
        $table->foreignId('arabic_diacritic_id')->nullable()->constrained('arabic_diacritics')->onDelete('cascade');
        
        // Additional columns
        $table->string('usage_meaning')->nullable();  // Description or usage meaning of the relation
        $table->string('effect')->nullable();         // The effect of the relation between the entities
        $table->text('example')->nullable();         // Example for the relation
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arabic_tools_leters_diacritics');
    }
};
