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
        Schema::create('contextual_conditions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('linking_tool_id')->constrained('linking_tools')->onDelete('cascade'); // Foreign key to linking_tools table
            
            // Polymorphic relationship
            $table->morphs('tool'); // This creates tool_id and tool_type
            
            $table->text('linguistic_condition')->nullable();
            $table->text('syntactic_context')->nullable();
            $table->text('semantic_context')->nullable();
            $table->text('outcome_effect')->nullable();
            $table->text('example_text')->nullable();
            $table->text('syntactic_analysis')->nullable();
            $table->text('semantic_analysis')->nullable();
            $table->text('source_reference')->nullable();
            $table->text('notes')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contextual_conditions');
    }
};
