<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyConnectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('connectors', function (Blueprint $table) {
            // Remove columns
            $table->dropColumn('grammatical_function');
            $table->dropColumn('semantic_function');

            // Add foreign key columns
            $table->foreignId('syntactic_effects')->constrained()->onDelete('cascade');
            $table->foreignId('semantic_logical_effects')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('connectors', function (Blueprint $table) {
            // Re-add the removed columns
            $table->string('grammatical_function', 255); // الوظيفة النحوية
            $table->string('semantic_function', 255); // الوظيفة الدلالية

            // Remove foreign key columns
            $table->dropForeign(['syntactic_effects']);
            $table->dropColumn('syntactic_effects');
            $table->dropForeign(['semantic_logical_effects']);
            $table->dropColumn('semantic_logical_effects');
        });
    }
}
