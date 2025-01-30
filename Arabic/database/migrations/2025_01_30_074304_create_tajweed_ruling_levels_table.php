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
        Schema::create('tajweed_ruling_levels', function (Blueprint $table) {
            $table->id();
            $table->string('level_name', 255); // اسم المرتبة
            $table->text('description')->nullable(); // شرح
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tajweed_ruling_levels');
    }
};
