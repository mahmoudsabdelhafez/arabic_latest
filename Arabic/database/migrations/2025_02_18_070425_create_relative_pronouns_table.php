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
    Schema::create('relative_pronouns', function (Blueprint $table) {
        $table->foreignId('connective_id')->primary()->constrained('connectives');
        $table->string('refers_to')->nullable();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('relative_pronouns');
}

};