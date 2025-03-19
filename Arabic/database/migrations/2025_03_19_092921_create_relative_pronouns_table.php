<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelativePronounsTable extends Migration
{
    public function up()
    {
        Schema::create('relative_pronouns', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name', 50)->comment('الاسم الموصول');
            $table->enum('number', ['مفرد', 'مثنى', 'جمع'])->comment('تصنيف العدد');
            $table->enum('gender', ['مذكر', 'مؤنث', 'للجنسين'])->comment('الجنس');
            $table->text('example')->comment('مثال توضيحي');
            $table->text('grammatical_analysis')->comment('التحليل النحوي');

            // Adding new fields
            $table->boolean('is_deleted')->default(false)->comment('Soft delete indicator');
            $table->unsignedBigInteger('edit_by')->nullable()->comment('تم التعديل بواسطة');

            // Adding foreign key constraint
            $table->foreign('edit_by')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps(); // Adds created_at and updated_at fields
        });
    }

    public function down()
    {
        Schema::dropIfExists('relative_pronouns');
    }
}
