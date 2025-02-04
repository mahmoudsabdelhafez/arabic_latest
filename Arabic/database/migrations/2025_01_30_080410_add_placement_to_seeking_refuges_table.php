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
        Schema::table('seeking_refuges', function (Blueprint $table) {
            $table->string('placement', 255)->nullable()->after('cases'); // Adding the new column

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seeking_refuges', function (Blueprint $table) {
            $table->dropColumn('placement');

        });
    }
};
