<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     *
     * Run the migrations.
     */

     protected $tables = [
        'conditionals', 'details', 'negatives', 'exceptions', 'prepositions',
        'explanations', 'synchronizations', 'comparisons_similes', 'conclusion_inferences',
        'sequencing_orderings', 'causal_reasonings', 'conjunctions', 'encouragement_urgings',
        'specifications'
    ];


    public function up(): void
    {
        foreach ($this->tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->enum('standalone', ['yes', 'no'])->default('no')->after('linking_tool_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach ($this->tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropColumn('standalone');
            });
        }
    }
};
