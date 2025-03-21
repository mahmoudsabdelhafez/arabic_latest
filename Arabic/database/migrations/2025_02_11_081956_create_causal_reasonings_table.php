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
        Schema::create('causal_reasonings', function (Blueprint $table) {
            $table->id(); // Primary Key (Auto Increment)
            $table->string('name', 255); // الأداة
            $table->string('english_name', 255); // الاسم بالإنجليزي
            $table->foreignId('linking_tool_id')->constrained('linking_tools')->onDelete('cascade');
            $table->string('grammatical_function', 255); // الوظيفة النحوية
            $table->string('semantic_function', 255); // الوظيفة الدلالية
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
        Schema::dropIfExists('causal_reasonings');
    }
};
