<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrammaticalHarakatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grammatical_harakat', function (Blueprint $table) {
            $table->id();
            $table->enum('haraka', ['الضمة', 'الفتحة', 'الكسرة', 'السكون'])->comment('الحركة الإعرابية');
            $table->enum('position', ['رفع', 'نصب', 'جر', 'جزم'])->comment('الموقع الإعرابي');
            $table->string('function', 50)->comment('الوظيفة النحوية');
            $table->text('example_sentence')->comment('مثال توضيحي');
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
        Schema::dropIfExists('grammatical_harakat');
    }
}
