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
        Schema::table('arabic_diacritics', function (Blueprint $table) {
            // Add new columns for 'name' and 'description'
            $table->string('name')->after('unicode_value');
            $table->text('description')->after('name');

          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('arabic_diacritics', function (Blueprint $table) {
            // Rollback changes: Remove 'name' and 'description' columns
            $table->dropColumn(['name', 'description']);

            // Optional: Re-add the 'created_at' and 'updated_at' columns if they were dropped
            $table->timestamps();
        });
    }
};
