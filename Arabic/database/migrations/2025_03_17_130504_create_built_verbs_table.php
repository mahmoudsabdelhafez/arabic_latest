<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('built_verbs', function (Blueprint $table) {
            $table->id();
            $table->string('tense'); // الفعل الماضي، الفعل المضارع، الفعل الأمر، etc.
            $table->string('type'); // مبني على السكون، مبني على الضم، مبني على الفتح، etc.
            $table->text('description'); // إذا اتصل به تاء الفاعل، نا الفاعلين, etc.
            $table->text('example'); // كتبْتُ، كتبْنَا, etc.
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('built_verbs');
    }
};
