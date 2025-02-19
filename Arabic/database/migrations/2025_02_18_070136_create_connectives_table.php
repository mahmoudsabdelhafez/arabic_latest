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
    Schema::create('connectives', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('transliteration')->nullable();
        $table->string('pronunciation')->nullable();
        $table->text('meaning');
        $table->text('definition')->nullable(); 
        $table->foreignId('category_id')->constrained('connective_categories');
        $table->foreignId('syntactic_effect_id')->constrained('syntactic_effects');
        $table->foreignId('semantic_logical_effect_id')->constrained('semantic_logical_effects');
        $table->string('morphological_form')->nullable();
        $table->string('typical_nisbah')->nullable();
        $table->string('primary_usage')->nullable();
        $table->string('grammatical_function')->nullable();
        $table->enum('position', ['start', 'middle', 'end']);
        $table->enum('connective_form', ['standalone', 'connected', 'hybrid']);
        $table->boolean('is_classical')->default(false);
        $table->text('notes')->nullable();
        $table->string('status')->default('draft');
        $table->timestamps();
        $table->foreignId('created_by')->nullable()->constrained('users'); // Uncomment if you have Users table
        $table->foreignId('updated_by')->nullable()->constrained('users'); // Uncomment if you have Users table
    });
}

public function down()
{
    Schema::dropIfExists('connectives');
}

};
