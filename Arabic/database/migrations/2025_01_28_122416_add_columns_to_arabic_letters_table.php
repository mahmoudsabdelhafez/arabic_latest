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
        Schema::table('arabic_letters', function (Blueprint $table) {
            $table->string('windows_hex')->nullable();
            $table->integer('windows_decimal')->nullable();
            $table->integer('unicode_decimal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('arabic_letters', function (Blueprint $table) {
            $table->dropColumn(['windows_hex', 'windows_decimal', 'unicode_decimal']);

        });
    }
};
