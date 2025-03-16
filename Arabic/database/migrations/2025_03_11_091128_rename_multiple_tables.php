<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Drop foreign key first
        Schema::table('augmented_three_letter_verbs', function (Blueprint $table) {
            $table->dropForeign(['root_id']);
        });
        Schema::table('derived_words', function (Blueprint $table) {
            $table->dropForeign(['root_id']);
        });
        Schema::table('augmented_verbs', function (Blueprint $table) {
            $table->dropForeign(['root_id']);
        });

        //roots
        Schema::rename('roots', 'verb_conjugations');

        // Re-add foreign key with updated reference
        Schema::table('augmented_three_letter_verbs', function (Blueprint $table) {
            $table->foreign('root_id')->references('id')->on('verb_conjugations')->onDelete('cascade');
        });
        Schema::table('derived_words', function (Blueprint $table) {
            $table->foreign('root_id')->references('id')->on('verb_conjugations')->onDelete('cascade');
        });
        Schema::table('augmented_verbs', function (Blueprint $table) {
            $table->foreign('root_id')->references('id')->on('verb_conjugations')->onDelete('cascade');
        });
    
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('augmented_three_letter_verbs', function (Blueprint $table) {
            $table->dropForeign(['root_id']);
        });
        Schema::table('derived_words', function (Blueprint $table) {
            $table->dropForeign(['root_id']);
        });
        Schema::table('augmented_verbs', function (Blueprint $table) {
            $table->dropForeign(['root_id']);
        });

        Schema::rename('verb_conjugations', 'roots');

        Schema::table('augmented_three_letter_verbs', function (Blueprint $table) {
            $table->foreign('root_id')->references('id')->on('roots')->onDelete('cascade');
        });
        Schema::table('derived_words', function (Blueprint $table) {
            $table->foreign('root_id')->references('id')->on('roots')->onDelete('cascade');
        });
        Schema::table('augmented_verbs', function (Blueprint $table) {
            $table->foreign('root_id')->references('id')->on('roots')->onDelete('cascade');
        });
    }
};
