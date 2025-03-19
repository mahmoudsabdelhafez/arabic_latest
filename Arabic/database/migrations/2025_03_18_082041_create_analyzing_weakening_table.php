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
        Schema::create('analyzing_weakening', function (Blueprint $table) {
            $table->id();
            $table->string('weakening_type');
            $table->text('condition');
            $table->text('original_word');
            $table->text('change_happened');
            $table->text('reason');
            $table->text('notes')->nullable();
            $table->tinyInteger('is_deleted')->default(0); // 0 for not deleted, 1 for deleted
            $table->unsignedBigInteger('edit_by')->nullable(); // تم التعديل بواسطة
            $table->foreign('edit_by')->references('id')->on('users')->onDelete('cascade'); // ربط بالفونيمات
            $table->timestamps();

            $table->engine = 'MyISAM';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analyzing_weakening');
    }
};
