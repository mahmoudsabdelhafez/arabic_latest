<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('derived_words', function (Blueprint $table) {
            $table->id();
            $table->foreignId('root_id')->constrained('verb_conjugations')->onDelete('cascade');
            $table->string('type', 50);
            $table->string('pattern', 50);
            $table->string('example', 50);
            $table->unsignedBigInteger('edited_by')->nullable();
            $table->boolean('is_deleted')->default(0);
            $table->timestamps();

            $table->engine = 'MyISAM';
        });
    }

    public function down()
    {
        Schema::dropIfExists('derived_words');
    }
};
