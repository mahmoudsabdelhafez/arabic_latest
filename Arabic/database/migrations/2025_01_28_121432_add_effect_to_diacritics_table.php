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
            $table->text('effect')->after('unicode_value')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('arabic_diacritics', function (Blueprint $table) {
            $table->dropColumn('effect');
        });
    }
};
