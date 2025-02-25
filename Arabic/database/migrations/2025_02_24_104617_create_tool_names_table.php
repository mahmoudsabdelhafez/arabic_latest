<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('tool_names', function (Blueprint $table) {
        $table->id();  // Auto-incrementing primary key
        $table->string('name');  // Column for tool name
        $table->enum('connective_form', ['standalone', 'connected', 'hybrid']);
        $table->unsignedBigInteger('connective_id')->nullable();  // Nullable foreign key column
        $table->unsignedBigInteger('arabic_table_id')->nullable();  // Nullable foreign key column
        $table->timestamps();  // Created_at and updated_at columns
        
        // Correct foreign key constraints:
        $table->foreign('connective_id')->references('id')->on('connectives')->onDelete('set null');
        $table->foreign('arabic_table_id')->references('id')->on('arabic_tables')->onDelete('set null');
    });
}

    // INSERT INTO tool_names (name, connective_category_id, created_at, updated_at)
    // SELECT name, category_id, NOW(), NOW()
    // FROM connectives;

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tool_names');
    }
}
