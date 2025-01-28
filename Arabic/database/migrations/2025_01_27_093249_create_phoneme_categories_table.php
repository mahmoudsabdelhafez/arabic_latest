<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhonemeCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('phoneme_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // To store the category name like 'Cavity', 'Throat', etc.
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('phoneme_categories');
    }
}
