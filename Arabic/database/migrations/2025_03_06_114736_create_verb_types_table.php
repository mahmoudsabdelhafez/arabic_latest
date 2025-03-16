<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('verb_types', function (Blueprint $table) {
            $table->id();
            $table->string('arabic_name')->unique(); // النوع (لازم أو متعدي)
            $table->text('description')->nullable(); // الوصف
            $table->string('example')->nullable(); // مثال
            $table->text('notes')->nullable(); // ملاحظات
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('verb_types');
    }
};
