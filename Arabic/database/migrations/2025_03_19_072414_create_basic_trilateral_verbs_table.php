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
            $table->boolean('is_deleted')->default(false); // Boolean to indicate if it is deleted
            $table->unsignedBigInteger('edit_by')->nullable(); // تم التعديل بواسطة
            $table->foreign('edit_by')->references('id')->on('users')->onDelete('cascade'); // ربط 
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
