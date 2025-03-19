<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('demonstrative_pronouns', function (Blueprint $table) {
            $table->id(); 
            $table->string('name', 50)->comment('اسم الإشارة');
            $table->string('example', 255)->comment('الأمثلة');
            $table->string('gender', 20)->comment('الجنس');
            $table->string('number_classification', 50)->comment('تصنيف العدد');
            $table->string('distance', 20)->comment('القرب / البعد');
            $table->string('grammatical_status', 20)->comment('(معرب/مبني)');
            $table->text('semantic_analysis')->comment('التحليل الدلالي');
            $table->text('contextual_analysis')->comment('التحليل السياقي');
            $table->tinyInteger('is_deleted')->default(0); 
            $table->unsignedBigInteger('edit_by')->nullable();
            $table->foreign('edit_by')->references('id')->on('users')->onDelete('cascade'); 
            $table->timestamps();

            $table->engine = 'MyISAM';
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('demonstrative_pronouns');
    }
};
