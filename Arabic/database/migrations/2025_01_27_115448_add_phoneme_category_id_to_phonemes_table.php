<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phonemes', function (Blueprint $table) {
            $table->foreignId('phoneme_category_id') // Column to store the foreign key
                  ->constrained('phoneme_categories') // Table being referenced
                  ->onDelete('cascade'); // Action on delete
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phonemes', function (Blueprint $table) {
            $table->dropForeign(['phoneme_category_id']); // Drop the foreign key
            $table->dropColumn('phoneme_category_id'); // Drop the column
        });
    }
};
