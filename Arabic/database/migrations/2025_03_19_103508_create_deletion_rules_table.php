<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeletionRulesTable extends Migration
{
    public function up()
    {
        Schema::create('deletion_rules', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('case_type')->comment('نوع الحالة');
            $table->text('conditions')->comment('الشروط');
            $table->text('examples')->comment('أمثلة');
            $table->text('explanation')->comment('التوضيح');
            $table->text('notes')->nullable()->comment('ملاحظات');
            $table->text('deletion_reason')->comment('سبب الحذف');

            // Adding new fields
            $table->boolean('is_deleted')->default(false)->comment('مؤشر الحذف الناعم');
            $table->unsignedBigInteger('edit_by')->nullable()->comment('تم التعديل بواسطة');

            // Adding foreign key constraint
            $table->foreign('edit_by')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps(); // Adds created_at and updated_at fields
        });
    }

    public function down()
    {
        Schema::dropIfExists('deletion_rules');
    }
}
