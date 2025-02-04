<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArabicToolsTable extends Migration
{
    public function up()
    {
        Schema::create('arabic_tools', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Column for tool name
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('arabic_tools');
    }
}
