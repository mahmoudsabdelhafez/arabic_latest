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
        Schema::table('prefixes', function (Blueprint $table) {
            $table->boolean('can_concatenate')->default(true); // default to true, meaning prefix can concatenate

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prefixes', function (Blueprint $table) {
            //
        });
    }
};
