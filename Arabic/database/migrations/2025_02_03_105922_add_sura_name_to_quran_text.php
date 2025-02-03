<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('quran_text', function (Blueprint $table) {
        $table->string('sura_name')->nullable();  // You can add other constraints if needed
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quran_text', function (Blueprint $table) {
            //
        });
    }
};
