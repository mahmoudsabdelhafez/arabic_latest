<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecondaryGrammaticalHarakatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secondary_grammatical_harakat', function (Blueprint $table) {
            $table->id();
            $table->enum('haraka', ['الواو', 'الألف', 'الياء'])->comment('الحركة الإعرابية الفرعية');
            $table->enum('state', ['رفع', 'نصب', 'جر'])->comment('الحالة الإعرابية');
            $table->string('function', 100)->comment('الوظيفة النحوية');
            $table->text('example_sentence')->comment('مثال توضيحي');
            $table->tinyInteger('is_deleted')->default(0); 
            $table->unsignedBigInteger('edit_by')->nullable();
            $table->foreign('edit_by')->references('id')->on('users')->onDelete('cascade'); 

            $table->engine = 'MyISAM';
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('secondary_grammatical_harakat');
    }
}
