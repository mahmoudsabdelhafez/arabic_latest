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
        Schema::create('subjunctive_particles', function (Blueprint $table) {
            $table->id(); // Primary Key (Auto Increment)
            $table->string('name', 255); // الأداة
            $table->string('english_name', 255); // الاسم بالإنجليزي
            $table->foreignId('linking_tool_id')->constrained('linking_tools')->onDelete('cascade');
            $table->foreignId('syntactic_effects')->constrained()->onDelete('cascade');
            $table->foreignId('semantic_logical_effects')->constrained()->onDelete('cascade'); 
            $table->text('example'); // مثال
            $table->text('description'); // وصف
            $table->timestamps(); // Created at & Updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjunctive_particles');
    }
};
