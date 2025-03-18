<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHarakatFunctionDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('harakat_function_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('harakat_function_id')->nullable(); // تم التعديل بواسطة
            $table->foreign('harakat_function_id')->references('id')->on('harakat_functions')->onDelete('cascade'); // ربط بالفونيمات
            $table->string('function_type'); // For storing the types of the function
            $table->string('function'); // For storing the types of the function
            $table->text('description'); // For storing the description of the function
            $table->text('example'); // For storing the description of the function
            $table->unsignedBigInteger('edit_by')->nullable(); // تم التعديل بواسطة
            $table->foreign('edit_by')->references('id')->on('users')->onDelete('cascade'); // ربط 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('harakat_function_details');
    }
}
