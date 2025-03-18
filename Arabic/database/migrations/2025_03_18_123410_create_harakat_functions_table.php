<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHarakatFunctionsTable extends Migration
{
    public function up()
    {
        Schema::create('harakat_functions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('haraka_id')->nullable(); // تم التعديل بواسطة
            $table->foreign('haraka_id')->references('id')->on('harakats')->onDelete('cascade'); // ربط بالفونيمات
            $table->string('grammatical_function'); // For storing the morphological function
            $table->string('morphological_function'); // Assuming you meant another 'morphological_function'
            $table->boolean('is_deletes')->default(false); // Boolean to indicate if it is deleted
            $table->unsignedBigInteger('edit_by')->nullable(); // تم التعديل بواسطة
            $table->foreign('edit_by')->references('id')->on('users')->onDelete('cascade'); // ربط 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('harakat_functions');
    }
}
