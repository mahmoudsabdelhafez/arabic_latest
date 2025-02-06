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
        Schema::create('classifications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('subtype');
            $table->foreignId('linking_tool_id')->constrained('linking_tools')->onDelete('cascade');
            $table->text('subtool_name');
            $table->text('example_sentence');
            $table->text('description');
            $table->string('typical_nisbah');
            $table->text('logical_effect');
            $table->text('semantic_effect');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classifications');
    }
};
