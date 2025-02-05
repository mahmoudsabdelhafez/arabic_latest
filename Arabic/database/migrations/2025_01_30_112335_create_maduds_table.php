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
        Schema::create('maduds', function (Blueprint $table) {
            $table->id();
            $table->text('definition')->nullable(); // تعريف
            $table->text('description')->nullable(); // وصف
            $table->text('mad_letters')->nullable(); // حروف المد
            $table->text('mad_types')->nullable(); // اقسام المد
            $table->text('mad_additions')->nullable(); // لواحق المد
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maduds');
    }
};
