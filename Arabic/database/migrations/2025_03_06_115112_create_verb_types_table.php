<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('verbs', function (Blueprint $table) {
            $table->id();
            $table->string('verb'); // الفعل
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('verb_types')->onDelete('cascade');
            $table->boolean('has_block')->default(false); // له كتلة
            $table->boolean('has_place')->default(false); // له مكان
            $table->boolean('has_tool_name')->default(false); // له اسم آلة
            $table->enum('perception', ['حسي', 'معنوي']); // حسي أو معنوي
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('verbs');
    }
};
