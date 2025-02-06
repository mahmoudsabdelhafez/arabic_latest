<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

        // الدلالات النحوية


        
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('syntactic_effects', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('applied_on'); // Field to specify what the effect applies to
            $table->string('result_case'); // Field for the resulting case
            $table->text('context_condition')->nullable(); // Context condition (optional)
            $table->text('priority_order')->nullable(); // Priority order with a default value
            $table->text('notes')->nullable(); // Additional notes (optional)
            $table->timestamps(); // Created_at & Updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('syntactic_effects');
    }
};
