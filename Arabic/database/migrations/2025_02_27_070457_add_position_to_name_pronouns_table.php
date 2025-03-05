<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('name_pronouns', function (Blueprint $table) {
            $table->enum('position', ['start', 'middle', 'end'])->after('gender')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('name_pronouns', function (Blueprint $table) {
            $table->dropColumn('position');
        });
    }
};
