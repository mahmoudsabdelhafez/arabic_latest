<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('name_pronouns', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم الضمير
            $table->enum('type', ['attached', 'detached', 'hidden']); // نوع الضمير من حيث الاتصال والانفصال
            $table->enum('person', ['first', 'second', 'third']); // الشخص
            $table->enum('number', ['single', 'dual', 'plural']); // العدد
            $table->enum('gender', ['m', 'f', 'both']); // الجنس
            $table->unsignedBigInteger('parsing_id')->nullable(); // العلاقة بجدول الإعراب
            $table->unsignedBigInteger('syntactic_effects_id')->nullable();
            $table->unsignedBigInteger('semantic_logical_effects_id')->nullable();
            $table->unsignedBigInteger('attached_type_id')->nullable();
            $table->string('estimated_for_hidden')->nullable(); // التقدير للمستتر
            $table->timestamps();
        });

        Schema::create('attached_types', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['noun', 'verb', 'particle']); // نوع التعلق (اسم، فعل، حرف)
            $table->timestamps();
        });

        Schema::create('parsing', function (Blueprint $table) {
            $table->id();
            $table->string('status'); // الحالة الإعرابية
            $table->text('rule'); // القاعدة النحوية
            $table->text('example'); // مثال توضيحي
            $table->timestamps();
        });

        // إضافة العلاقات بين الجداول
        Schema::table('name_pronouns', function (Blueprint $table) {
            $table->foreign('syntactic_effects_id')->references('id')->on('syntactic_effects')->onDelete('set null');
            $table->foreign('semantic_logical_effects_id')->references('id')->on('semantic_logical_effects')->onDelete('set null');
            $table->foreign('attached_type_id')->references('id')->on('attached_types')->onDelete('set null');
            $table->foreign('parsing_id')->references('id')->on('parsing')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('name_pronouns');
        Schema::dropIfExists('syntactic_effects');
        Schema::dropIfExists('semantic_logical_effects');
        Schema::dropIfExists('attached_types');
        Schema::dropIfExists('parsing');
    }
};