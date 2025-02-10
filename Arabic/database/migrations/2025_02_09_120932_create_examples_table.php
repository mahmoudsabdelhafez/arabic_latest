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
        Schema::create('examples', function (Blueprint $table) {
            $table->id();
            $table->foreignId('word_type_id')->constrained('word_types')->onDelete('cascade');
            $table->text('example_text');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('examples');
    }
    
};
