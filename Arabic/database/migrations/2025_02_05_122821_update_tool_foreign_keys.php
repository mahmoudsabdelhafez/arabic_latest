<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('details', function (Blueprint $table) {
            $table->dropForeign(['tool_id']); // Drop old foreign key
            $table->renameColumn('tool_id', 'linking_tool_id'); // Rename column
        });

        Schema::table('details', function (Blueprint $table) {
            $table->foreign('linking_tool_id')->references('id')->on('linking_tools')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('details', function (Blueprint $table) {
            $table->dropForeign(['linking_tool_id']);
            $table->renameColumn('linking_tool_id', 'tool_id');
        });

        Schema::table('details', function (Blueprint $table) {
            $table->foreign('tool_id')->references('id')->on('tools')->onDelete('cascade');
        });
    }
};