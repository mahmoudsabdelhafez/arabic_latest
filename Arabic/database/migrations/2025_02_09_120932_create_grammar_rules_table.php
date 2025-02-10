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
        Schema::create('grammar_rules', function (Blueprint $table) {
            $table->id();
            $table->string('rule_name');
            $table->text('description');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('grammar_rules');
    }
    
};
