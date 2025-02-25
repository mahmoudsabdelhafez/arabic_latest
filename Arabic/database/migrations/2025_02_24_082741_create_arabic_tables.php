<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('arabic_tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('word_type_id');
            $table->string('name');
            $table->string('arabic_name');
            $table->timestamps();

            $table->foreign('word_type_id')->references('id')->on('word_types')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('arabic_tables');
    }
};
