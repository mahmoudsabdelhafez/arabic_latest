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
    Schema::table('phonemes', function (Blueprint $table) {
        $table->string('articulation_arabic_name')->nullable();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('phonemes', function (Blueprint $table) {
            $table->dropColumn('articulation_arabic_name');
        });
    }
    
};
