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
    Schema::table('arabic_diacritic_arabic_letter', function (Blueprint $table) {
        $table->boolean('Used')->default(false); // أو أي نوع آخر حسب الحاجة
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('arabic_diacritic_arabic_letter', function (Blueprint $table) {
        $table->dropColumn('Used');
    });
}

};
