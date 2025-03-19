<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInflectedAdverbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inflected_adverbs', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->enum('adverb_type', ['مبهمة', 'مختصة'])->comment('نوع الظرف');
            $table->string('adverb', 50)->comment('الظرف');
            $table->text('example_sentence')->comment('المثال');
            $table->text('syntactic_analysis')->comment('التحليل النحوي');
            $table->text('semantic_analysis')->comment('التحليل الدّلالي والبلاغي');
            $table->tinyInteger('is_deleted')->default(0); 
            $table->unsignedBigInteger('edit_by')->nullable();
            $table->foreign('edit_by')->references('id')->on('users')->onDelete('cascade'); 
            $table->timestamps();

            $table->engine = 'MyISAM';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inflected_adverbs');
    }
}
