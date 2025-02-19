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
    Schema::create('demonstrative_pronouns', function (Blueprint $table) {
        $table->foreignId('connective_id')->primary()->constrained('connectives');
        $table->string('demonstrates_proximity')->nullable();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('demonstrative_pronouns');
}

};
