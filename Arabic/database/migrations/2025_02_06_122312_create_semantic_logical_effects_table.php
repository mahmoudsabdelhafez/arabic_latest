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
        Schema::create('semantic_logical_effects', function (Blueprint $table) {
            $table->id();
            $table->string('typical_relation'); // Stores the typical relation
            $table->string('nisbah_type'); // Stores the nisbah type
            $table->text('semantic_roles'); // Stores semantic roles
            $table->text('conditions')->nullable(); // Stores conditions (optional)
            $table->text('notes')->nullable(); // Stores notes (optional)
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
