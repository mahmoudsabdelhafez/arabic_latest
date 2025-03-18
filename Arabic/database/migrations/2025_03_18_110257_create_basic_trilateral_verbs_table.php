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
        Schema::create('basic_trilateral_verbs', function (Blueprint $table) {
            $table->id();
            $table->string('pattern');
            $table->string('past_tense');
            $table->string('present_tense');
            $table->text('notes')->nullable();
            $table->text('syntactic_analysis')->nullable();
            $table->string('example_sentence');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basic_trilateral_verbs');
    }
};
