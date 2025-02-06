<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

        // الدلالات المنطقية 

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('semantic_logical_effects', function (Blueprint $table) {
            $table->id();
            $table->string('typical_relation_1'); // First typical relation
            $table->string('typical_relation_2'); // Second typical relation
            $table->text('semantic_roles'); // Semantic roles
            $table->text('conditions')->nullable(); // Conditions (optional)
            $table->text('notes')->nullable(); // Notes (optional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semantic_logical_effects');
    }
};
