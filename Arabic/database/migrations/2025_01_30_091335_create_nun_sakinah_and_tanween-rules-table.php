<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNunSakinahAndTanweenRulesTable extends Migration
{
    public function up()
    {
        Schema::create('nun_sakinah_and_tanween_rules', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('category_id')->constrained('tajweed_categories')->onDelete('cascade'); // Foreign key to tajweed_categories
            $table->string('ruling_name'); // Name of the ruling
            $table->text('ruling_description')->nullable(); // Description of the ruling
            $table->text('ruling_letters')->nullable(); // Letters involved in the ruling
            $table->text('pronunciation_method')->nullable(); // Pronunciation method
            $table->text('example')->nullable(); // Example for the ruling
            $table->text('note')->nullable(); // Additional note
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nun_sakinah_and_tanween_rules');
    }
}
