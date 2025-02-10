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
        Schema::create('language_contents', function (Blueprint $table) {
            $table->id();
            $table->string('section'); // For example: "اللغة العربية", "أقسام الكلمة", etc.
            $table->text('content');   // Content of that section
            $table->string('language')->default('arabic'); // Language type (could be useful for multilingual content)
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('language_contents');
    }
    
};
