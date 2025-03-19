<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNonStandardDeletionTable extends Migration
{
    public function up()
    {
        Schema::create('non_standard_deletion', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('phenomenon')->comment('الظاهرة اللغوية');
            $table->string('deletion_type')->comment('نوع الحذف');
            $table->text('linguistic_reason')->comment('السبب اللغوي');
            $table->text('example')->comment('مثال توضيحي');
            $table->text('structure_effect')->comment('تأثير الحذف على التركيب');
            $table->string('degree_of_standardization')->comment('درجة المعيارية');
            $table->text('deletion_reason')->comment('سبب الحذف');
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
        Schema::dropIfExists('non_standard_deletion');
    }
}
