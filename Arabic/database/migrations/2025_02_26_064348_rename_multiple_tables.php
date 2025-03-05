<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::rename('classifications', 'connective_classifications');
        Schema::rename('beauty_of_languages', 'arabic_beauty_of_languages');
        Schema::rename('basmalas', 'quran_basmalas');
        Schema::rename('contextual_conditions', 'connective_contextual_conditions');
        Schema::rename('dialects', 'arabic_dialects');
        Schema::rename('emphatic_arabic_letters', 'tajweed_emphatic_arabic_letters');
        Schema::rename('examples', 'arabic_word_type_examples');
        Schema::rename('grammar_rules', 'arabic_grammar_rules');
        Schema::rename('harakats', 'arabic_harakats');
        Schema::rename('nun_sakinah_and_tanween_rules', 'tajweed_nun_sakinah_and_tanween_rules');
        Schema::rename('quran_text', 'quran_uthmani_min');
        Schema::rename('quran_all', 'quran_simple_plain');
        Schema::rename('quran_text_clean', 'quran_simple_clean');
        Schema::rename('sentences', 'arabic_sentences');
        Schema::rename('sentences_parts', 'arabic_sentences_parts');
    }

    public function down() {
        Schema::rename('connective_classifications', 'classifications');
        Schema::rename('arabic_beauty_of_languages', 'beauty_of_languages');
        Schema::rename('quran_basmalas', 'basmalas');
        Schema::rename('connective_contextual_conditions', 'contextual_conditions');
        Schema::rename('arabic_dialects', 'dialects');
        Schema::rename('tajweed_emphatic_arabic_letters', 'emphatic_arabic_letters');
        Schema::rename('arabic_word_type_examples', 'examples');
        Schema::rename('arabic_grammar_rules', 'grammar_rules');
        Schema::rename('arabic_harakats', 'harakats');
        Schema::rename('tajweed_nun_sakinah_and_tanween_rules', 'nun_sakinah_and_tanween_rules');
        Schema::rename('quran_uthmani_min', 'quran_text');
        Schema::rename('quran_simple_plain', 'quran_all');
        Schema::rename('quran_simple_clean', 'quran_text_clean');
        Schema::rename('arabic_sentences', 'sentences');
        Schema::rename('arabic_sentences_parts', 'sentences_parts');
    }
};
