<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('nasikh_particles', function (Blueprint $table) {
            $table->id(); // مفتاح أساسي تلقائي
            $table->string('name'); // اسم الأداة
            $table->string('english_name'); // الاسم بالإنجليزية
            $table->text('meaning'); // المعنى
            $table->text('example'); // مثال
            $table->text('description'); // الوصف
            
            // المفاتيح الخارجية
            $table->foreignId('linking_tool_id')->constrained('linking_tools')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('syntactic_effects')->constrained('syntactic_effects_table')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('semantic_logical_effects')->constrained('semantic_logical_effects_table')->cascadeOnDelete()->cascadeOnUpdate();
            
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('nasikh_particles');
    }
};
