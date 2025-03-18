<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('saltomoniha_phonetic_functions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('phoneme_id'); // معرف الفونيم
            $table->foreign('phoneme_id')->references('id')->on('phonemes')->onDelete('cascade'); // ربط بالفونيمات
            $table->string('pronunciation_method'); // طريقة النطق
            $table->text('pronunciation_facilitation'); // تسهيل نطق الحرف
            $table->text('substitution'); // الإبدال
            $table->text('weakening'); // الإعلال
            $table->text('metathesis'); // الإقلاب
            $table->text('deletion'); // الحذف
            $table->text('dialects'); // الحرف في اللهجات
            $table->text('tajweed_rules'); // الحرف في علم التجويد وفي نطق القرآن الكريم
            $table->boolean('is_deleted')->default(false); // هل هو محذوف؟
            $table->unsignedBigInteger('edit_by')->nullable(); // تم التعديل بواسطة
            $table->foreign('edit_by')->references('id')->on('users')->onDelete('cascade'); // ربط بالفونيمات

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('saltomoniha_phonetic_functions');
    }
};