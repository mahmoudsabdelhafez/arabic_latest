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
        Schema::create('usage_examples', function (Blueprint $table) {
            $table->id();
            $table->foreignId('connective_id')->constrained('connectives');
            $table->text('example_sentence');
            $table->text('translation')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('usage_examples');
    }
    
};
