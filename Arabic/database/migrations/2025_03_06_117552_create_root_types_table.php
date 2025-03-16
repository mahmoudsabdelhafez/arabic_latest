<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('root_types', function (Blueprint $table) {
            $table->id();
            $table->string('type_name')->unique(); // Name of the type
            $table->text('description')->nullable(); // Description of the type
            $table->unsignedBigInteger('parent_id')->nullable(); // Parent type (self-referencing)
            $table->string('table_name'); // Name of related table
            $table->timestamps();

            // Foreign key for hierarchical structure (optional)
            $table->foreign('parent_id')->references('id')->on('root_types')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('root_types');
    }
};
