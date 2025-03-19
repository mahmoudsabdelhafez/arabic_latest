<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('built_in_adverbs', function (Blueprint $table) {
            $table->id();
            $table->enum('adverb_type', ['ضم', 'فتح', 'سكون'])->comment('نوع الظرف');
            $table->string('adverb', 50)->comment('الظرف');
            $table->text('example_sentence')->comment('المثال');
            $table->text('syntactic_analysis')->comment('التحليل النحوي');
            $table->text('semantic_analysis')->comment('التحليل الدّلالي');
            $table->tinyInteger('is_deleted')->default(0); 
            $table->unsignedBigInteger('edit_by')->nullable();
            $table->foreign('edit_by')->references('id')->on('users')->onDelete('cascade'); 
            $table->timestamps();

            $table->engine = 'MyISAM';
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('built_in_adverbs');
    }
};
