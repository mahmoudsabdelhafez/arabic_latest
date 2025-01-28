<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id(); // المفتاح الأساسي
            $table->string('name'); // اسم الصورة أو العنوان
            $table->string('path'); // مسار تخزين الصورة
            $table->foreignId('phoneme_category_id')->constrained('phoneme_categories')->onDelete('cascade'); // إضافة خانة للربط مع phoneme_categories
            $table->text('description')->nullable(); // وصف الصورة (اختياري)
            $table->timestamps(); // حقول created_at و updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
};
