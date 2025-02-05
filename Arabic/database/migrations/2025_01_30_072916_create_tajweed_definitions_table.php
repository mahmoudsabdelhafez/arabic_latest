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
        Schema::create('tajweed_definitions', function (Blueprint $table) {
            $table->id();
            $table->text('definition')->nullable(); // التعريف
            $table->text('evidence_from_quran')->nullable(); // الدليل من القران
            $table->text('linguistic_meaning')->nullable(); // المعنى اللغوي
            $table->text('terminological_meaning')->nullable(); // المعنى الاصطلاحي
            $table->text('ruling')->nullable(); // الحكم
            $table->text('virtue')->nullable(); // الفضل
            $table->text('purpose')->nullable(); // الغاية
            $table->text('method_of_learning_tajweed')->nullable(); // طريقة أخذ علم التجويد
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tajweed_definitions');
    }
};
