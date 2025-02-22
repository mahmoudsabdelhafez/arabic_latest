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
        Schema::table('quran_text', function (Blueprint $table) {
            $table->text('text_without_harakat')->nullable()->after('text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quran_text', function (Blueprint $table) {
            $table->dropColumn('text_without_harakat');

        });
    }
};
