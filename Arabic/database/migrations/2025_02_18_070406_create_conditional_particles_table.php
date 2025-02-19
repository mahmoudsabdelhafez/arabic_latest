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
        Schema::create('conditional_particles', function (Blueprint $table) {
            $table->foreignId('connective_id')->primary()->constrained('connectives');
            $table->string('conditional_type')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('conditional_particles');
    }
    
};
