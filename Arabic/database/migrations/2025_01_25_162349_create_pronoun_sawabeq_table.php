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
        Schema::create('pronoun_sawabeq', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pronoun_id'); // مفتاح خارجي لجدول الضمائر
            $table->unsignedBigInteger('sawabeq_id'); // مفتاح خارجي لجدول السوابق
            $table->timestamps();

            // تعريف المفاتيح الخارجية
            $table->foreign('pronoun_id')->references('id')->on('pronouns')->onDelete('cascade');
            $table->foreign('sawabeq_id')->references('id')->on('sawabeqs')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pronoun_sawabeq');
    }
};
