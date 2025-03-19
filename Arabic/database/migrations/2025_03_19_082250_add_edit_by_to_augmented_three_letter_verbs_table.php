<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('augmented_three_letter_verbs', function (Blueprint $table) {
            $table->boolean('is_deleted')->default(false); // Adding soft delete flag
            $table->unsignedBigInteger('edit_by')->nullable(); // Reference to user who edited
            $table->foreign('edit_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('augmented_three_letter_verbs', function (Blueprint $table) {
            $table->dropForeign(['edit_by']); // Drop foreign key first
            $table->dropColumn(['is_deleted', 'edit_by']); // Drop columns
        });
    }
};
