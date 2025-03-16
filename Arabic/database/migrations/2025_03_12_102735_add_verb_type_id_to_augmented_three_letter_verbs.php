<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('augmented_three_letter_verbs', function (Blueprint $table) {
            $table->foreignId('verb_type_id')
                  ->constrained('verb_types')
                  ->onDelete('cascade'); // Optional: Deletes related records when parent is deleted
        });
    }

    public function down(): void
    {
        Schema::table('augmented_three_letter_verbs', function (Blueprint $table) {
            $table->dropForeign(['verb_type_id']);
            $table->dropColumn('verb_type_id');
        });
    }
};
