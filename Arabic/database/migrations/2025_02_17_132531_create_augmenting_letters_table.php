<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAugmentingLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('augmenting_letters', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->unsignedBigInteger('arabic_letter_id'); // Foreign key reference to arabic_letters table
            $table->string('example'); // The augmenting letter
            $table->timestamps(); // created_at and updated_at timestamps

            // Add foreign key constraint
            $table->foreign('arabic_letter_id')->references('id')->on('arabic_letters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('augmenting_letters');
    }
}
