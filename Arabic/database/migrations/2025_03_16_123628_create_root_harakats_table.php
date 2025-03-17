<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('root_harakats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('haraka_id')->constrained()->onDelete('cascade'); // مفتاح أجنبي مع قيود الحذف
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('root_harakats');
    }
};
