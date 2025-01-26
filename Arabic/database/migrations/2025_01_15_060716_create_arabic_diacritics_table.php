<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        DB::table('arabic_diacritics')->truncate();

        Schema::create('arabic_diacritics', function (Blueprint $table) {
            $table->id();
            $table->char('diacritic', 1)->collation('utf8mb4_general_ci');
            $table->string('unicode_value', 10)->collation('utf8mb4_general_ci');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('arabic_diacritics');
    }
};
