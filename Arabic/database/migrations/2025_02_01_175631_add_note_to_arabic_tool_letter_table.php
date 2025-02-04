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
        Schema::table('arabic_tool_letter', function (Blueprint $table) {
            $table->text('note')->nullable()->after('effect'); // إضافة عمود الملاحظات بعد عمود effect
        });
    }
    
    public function down()
    {
        Schema::table('arabic_tool_letter', function (Blueprint $table) {
            $table->dropColumn('note');
        });
    }
    
};
