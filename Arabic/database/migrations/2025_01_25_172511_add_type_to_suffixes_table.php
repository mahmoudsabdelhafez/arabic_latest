<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToSuffixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suffixes', function (Blueprint $table) {
            $table->string('type')->nullable(); // إضافة عمود type من نوع string
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('suffixes', function (Blueprint $table) {
            $table->dropColumn('type'); // إزالة العمود type في حالة التراجع
        });
    }
}