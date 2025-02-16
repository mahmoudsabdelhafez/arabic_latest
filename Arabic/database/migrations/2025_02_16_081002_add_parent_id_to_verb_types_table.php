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
        Schema::table('verb_types', function (Blueprint $table) {
            $table->boolean('is_parent')->default(false)->after('description'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('verb_types', function (Blueprint $table) {
            $table->dropColumn('is_parent');
        });
    }
};
