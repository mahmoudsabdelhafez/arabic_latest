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
        Schema::create('tools_informations', function (Blueprint $table) {
            $table->id();
        $table->unsignedBigInteger('linking_tool_id');  // Foreign key to linking_tools table
        $table->morphs('tool');  // This creates 'tool_id' and 'tool_type' columns
        $table->string('short_label');
        $table->unsignedBigInteger('classification_id');  // Foreign key to classification table
        $table->string('morphological_form');
        $table->string('typical_nisbah');
        $table->string('primary_usage');
        $table->text('secondary_usages');
        $table->text('notes');
        $table->text('example_ayah');
        $table->text('example_explanation');
        $table->text('syntactic_analysis');
        $table->text('semantic_analysis');
        $table->timestamps();

        // Add foreign keys
        $table->foreign('linking_tool_id')->references('id')->on('linking_tools')->onDelete('cascade');
        $table->foreign('classification_id')->references('id')->on('classifications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tools_informations');
    }
};
