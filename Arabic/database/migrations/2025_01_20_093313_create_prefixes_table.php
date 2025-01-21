<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
        {
            Schema::create('prefixes', function (Blueprint $table) {
                $table->id();
                $table->string('formula')->unique(); // صيغة
                $table->string('usage_meaning'); // المعنى_الاستخدام
                $table->text('examples_from_quran'); // الأمثلة_من_القرآن_الكريم
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prefixes');
    }
};
