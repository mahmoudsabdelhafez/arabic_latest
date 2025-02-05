<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('arabic_tool_letter', function (Blueprint $table) {
            $table->id();
            $table->foreignId('arabic_tool_id')->constrained()->onDelete('cascade');
                    $table->foreignId('arabic_letter_id')->constrained('arabic_letters')->onDelete('cascade');

            $table->string('effect')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('arabic_tool_letter');
    }
};
