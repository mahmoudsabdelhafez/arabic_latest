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
        Schema::create('augmented_verb_derived_examples', function (Blueprint $table) {
            $table->id();
            $table->string('root')->comment('الجذر');
            $table->unsignedBigInteger('pattern_id')->nullable()->comment('الوزن'); // إضافة العمود قبل المفتاح الأجنبي
            $table->foreign('pattern_id')->references('id')->on('augmented_three_letter_verbs')->onDelete('set null');
            $table->string('example')->comment('المثال');
            $table->string('verbal_noun')->comment('المصدر الصريح');
            $table->string('mimic_noun')->nullable()->comment('المصدر الميمي');
            $table->string('industrial_noun')->nullable()->comment('المصدر الصناعي');
            $table->string('active_participle')->comment('اسم الفاعل');
            $table->string('passive_participle')->comment('اسم المفعول');
            $table->string('time_noun')->nullable()->comment('اسم الزمان');
            $table->string('place_noun')->nullable()->comment('اسم المكان');
            $table->string('instrument_noun')->nullable()->comment('اسم الآلة');
            $table->string('form_noun')->nullable()->comment('اسم الهيئة');
            $table->string('preference_noun')->nullable()->comment('اسم التفضيل');
            $table->string('verbal_noun2')->nullable()->comment('التمييز');
            $table->string('adverb')->nullable()->comment('الحال'); // Adding the "حال" column with a comment
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('augmented_verb_derived_examples');
    }
};
