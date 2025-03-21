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
        Schema::create('quran_basmalas', function (Blueprint $table) {
            $table->id();
            $table->text('formula'); // Formula of Bismillah
            $table->text('placement'); // Placement of Bismillah
            $table->text('forms_of_bismillah'); // Forms of Bismillah
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quran_basmalas');
    }
};
