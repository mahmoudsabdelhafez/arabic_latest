<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('word_types', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_id')->nullable()->after('description');

            // Optional: If you want foreign key constraints
            $table->foreign('parent_id')->references('id')->on('word_types')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('word_types', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropColumn('parent_id');
        });
    }
};
