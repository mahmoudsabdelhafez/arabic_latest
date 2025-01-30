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
    Schema::table('phoneme_categories', function (Blueprint $table) {
        $table->string('arabic_name')->nullable();  // يمكنك تعديل نوع البيانات حسب احتياجك
    });
}

public function down()
{
    Schema::table('phoneme_categories', function (Blueprint $table) {
        $table->dropColumn('arabic_name');
    });
}

};
