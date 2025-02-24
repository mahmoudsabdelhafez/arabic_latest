<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // إنشاء جدول اللهجات
        Schema::create('dialects', function (Blueprint $table) {
            $table->id();
            $table->string('dialect_name')->unique();
            $table->timestamps();
        });

        // إنشاء جدول المجالات الدلالية
        Schema::create('semantic_domains', function (Blueprint $table) {
            $table->id();
            $table->string('domain_name')->unique();
            $table->timestamps();
        });

        // إنشاء جدول أنواع الكلمات الوظيفية
        Schema::create('name_types', function (Blueprint $table) {
            $table->id();
            $table->string('type_name')->unique(); // مثل: موصول، استفهام، شرط
            $table->timestamps();
        });

        // إنشاء جدول الكلمات الوظيفية
        Schema::create('functional_words', function (Blueprint $table) {
            $table->id();
            $table->string('surface_form'); // الشكل السطحي للكلمة
            $table->string('root')->nullable(); // الجذر اللغوي للكلمة
            $table->foreignId('domain_id')->nullable()->constrained('semantic_domains')->onDelete('set null');
            $table->boolean('is_relative')->default(false);
            $table->boolean('is_interrogative')->default(false);
            $table->boolean('is_conditional')->default(false);
            $table->boolean('is_fully_declinable')->default(false);
            $table->boolean('is_partially_declinable')->default(false);
            $table->foreignId('dialect_id')->nullable()->constrained('dialects')->onDelete('set null');
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        // إنشاء جدول الربط بين الكلمات الوظيفية وأنواعها (للتعامل مع كلمات متعددة التصنيفات)
        Schema::create('word_type_mapping', function (Blueprint $table) {
            $table->id();
            $table->foreignId('word_id')->constrained('functional_words')->onDelete('cascade');
            $table->foreignId('type_id')->constrained('name_types')->onDelete('cascade');
            $table->timestamps();
        });

        // إنشاء جدول الأسماء الموصولة
        Schema::create('relative_pronouns', function (Blueprint $table) {
            $table->id();
            $table->string('surface_form');
            $table->enum('gender', ['masc', 'fem'])->nullable();
            $table->enum('number', ['singular', 'dual', 'plural'])->nullable();
            $table->enum('case', ['nominative', 'accusative', 'genitive'])->nullable();
            $table->foreignId('dialect_id')->nullable()->constrained('dialects')->onDelete('set null');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('relative_pronouns');
        Schema::dropIfExists('word_type_mapping');
        Schema::dropIfExists('functional_words');
        Schema::dropIfExists('name_types');
        Schema::dropIfExists('semantic_domains');
        Schema::dropIfExists('dialects');
    }
};