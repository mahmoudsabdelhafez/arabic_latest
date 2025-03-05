<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::rename('beauty_of_languages', 'arabic_beauty_of_languages');
    }

    public function down(): void
    {
        Schema::rename('arabic_beauty_of_languages', 'beauty_of_languages');
    }
};

