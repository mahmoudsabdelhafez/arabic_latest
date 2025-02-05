<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('arabic_letters', function (Blueprint $table) {
            DB::statement('ALTER TABLE arabic_letters CHANGE unicode_value unicode_hex VARCHAR(255);');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('arabic_letters', function (Blueprint $table) {
            DB::statement('ALTER TABLE arabic_letters CHANGE unicode_hex unicode_value VARCHAR(255);');

        });
    }
};
