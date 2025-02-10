<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamplesSeeder extends Seeder
{
    public function run()
    {
        DB::table('examples')->insert([
            ['word_type_id' => 1, 'example_text' => 'محمد، علي، فاطمة (أشخاص)'],
            ['word_type_id' => 1, 'example_text' => 'مكة، القاهرة، المدرسة (أماكن)'],
            ['word_type_id' => 1, 'example_text' => 'كتاب، شجرة، هاتف (أشياء)'],
            ['word_type_id' => 1, 'example_text' => 'جميل، سريع، طويل (صفات)'],
            ['word_type_id' => 2, 'example_text' => 'درسَ، كتبَ، قرأَ (أفعال ماضية)'],
            ['word_type_id' => 2, 'example_text' => 'يدرسُ، يكتبُ، يقرأُ (أفعال مضارعة)'],
            ['word_type_id' => 2, 'example_text' => 'اكتبْ، اقرأْ، اجلسْ (أفعال أمر)'],
            ['word_type_id' => 3, 'example_text' => 'من، إلى، على، في، عن، ب، ك، ل (حروف جر)'],
            ['word_type_id' => 3, 'example_text' => 'و، ف، ثم، أو، بل (حروف عطف)']
        ]);
    }
}

