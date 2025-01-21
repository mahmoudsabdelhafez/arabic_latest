<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->string('word');
            $table->string('unvowelword');
            $table->string('nonormstem');
            $table->unsignedBigInteger('root_id');  // Foreign key to link to the roots table
            $table->timestamps();

            // Adding the foreign key constraint
            $table->foreign('root_id')->references('id')->on('roots')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('words');
    }
};
