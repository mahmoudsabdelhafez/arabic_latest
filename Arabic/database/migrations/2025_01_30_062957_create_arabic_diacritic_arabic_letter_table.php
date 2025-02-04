<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArabicDiacriticArabicLetterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arabic_diacritic_arabic_letter', function (Blueprint $table) {
            $table->id(); // مفتاح رئيسي للجدول
            $table->foreignId('arabic_diacritic_id')->constrained('arabic_diacritics')->onDelete('cascade');
            $table->foreignId('arabic_letter_id')->constrained('arabic_letters')->onDelete('cascade');
            $table->boolean('has_meaning')->default(false); // عمود 'has_meaning'
            $table->text('nots')->nullable(); // عمود 'nots'
            $table->boolean('is_preposition')->default(false); // عمود 'is_preposition'
            $table->timestamps(); // أوقات الإنشاء والتعديل
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arabic_diacritic_arabic_letter');
    }
}
