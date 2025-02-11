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
        Schema::table('pronouns', function (Blueprint $table) {
            Schema::table('pronouns', function (Blueprint $table) {
                $table->renameColumn('pronoun', 'name');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pronouns', function (Blueprint $table) {
            Schema::table('pronouns', function (Blueprint $table) {
                $table->renameColumn('name', 'pronoun');
            });
        });
    }
};
