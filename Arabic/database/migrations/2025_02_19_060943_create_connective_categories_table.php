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
    Schema::create('connective_categories', function (Blueprint $table) {
        $table->id();
        $table->string('name')->unique();
        $table->string('arabic_name')->unique();
        $table->text('definition')->nullable(); // Column for the definition (can be null)
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('connective_categories');
}

};
