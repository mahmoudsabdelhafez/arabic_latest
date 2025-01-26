<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePronounSuffixTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pronoun_suffix', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pronoun_id'); // مفتاح خارجي لجدول الضمائر
            $table->unsignedBigInteger('suffix_id'); // مفتاح خارجي لجدول اللواحق
            $table->timestamps();

            // تعريف المفاتيح الخارجية
            $table->foreign('pronoun_id')->references('id')->on('pronouns')->onDelete('cascade');
            $table->foreign('suffix_id')->references('id')->on('suffixes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pronoun_suffix');
    }
}