<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NamePronounsSeeder extends Seeder

{
    public function run()
    {
        DB::table('parsing')->insert([
            ['status' => 'مرفوع', 'rule' => 'يكون الاسم مرفوعًا إذا كان فاعلًا أو مبتدأً.', 'example' => 'الطالبُ مجتهدٌ.'],
            ['status' => 'منصوب', 'rule' => 'يكون الاسم منصوبًا إذا كان مفعولًا به أو حالًا.', 'example' => 'رأيتُ الطالبَ مجتهدًا.'],
            ['status' => 'مجرور', 'rule' => 'يكون الاسم مجرورًا إذا سبق بحرف جر أو أضيف إليه.', 'example' => 'ذهبت إلى المدرسةِ.'],
            ['status' => 'مجزوم', 'rule' => 'يكون الفعل مجزومًا إذا كان جوابًا لشرط جازم أو أداة نفي.', 'example' => 'لم يذهبْ إلى المدرسة.'],
            ['status' => 'مبني', 'rule' => 'وقد تأتي في محلّ نصب بعد حروف خاصّة (إنّ + ضمير منفصل = إنَّ أنت …الخ)؛ لكنّها تظلّ مبنيّة.', 'example' => 'إنَّ أنتَ كريمٌ.']
        ]);
        
        DB::table('name_pronouns')->insert([
          // First-person pronouns
            ['name' => 'أَنَا', 'type' => 'detached', 'person' => 'first', 'number' => 'single', 'gender' => 'both', 'parsing_id' => 5],
            ['name' => 'نَحْنُ', 'type' => 'detached', 'person' => 'first', 'number' => 'plural', 'gender' => 'both', 'parsing_id' => 1],
            ['name' => 'يِ', 'type' => 'attached', 'person' => 'first', 'number' => 'single', 'gender' => 'both', 'parsing_id' => 3],
            ['name' => 'نَا', 'type' => 'attached', 'person' => 'first', 'number' => 'plural', 'gender' => 'both', 'parsing_id' => 3],
            ['name' => '(مُسْتَتِرٌ تَقْدِيرُهُ أَنَا)', 'type' => 'hidden', 'person' => 'first', 'number' => 'single', 'gender' => 'both', 'parsing_id' => 5],
            ['name' => '(مُسْتَتِرٌ تَقْدِيرُهُ نَحْنُ)', 'type' => 'hidden', 'person' => 'first', 'number' => 'plural', 'gender' => 'both', 'parsing_id' => 5],
        
            // Second-person pronouns
            ['name' => 'أَنْتَ', 'type' => 'detached', 'person' => 'second', 'number' => 'single', 'gender' => 'm', 'parsing_id' => 5],
            ['name' => 'أَنْتِ', 'type' => 'detached', 'person' => 'second', 'number' => 'single', 'gender' => 'f', 'parsing_id' => 5],
            ['name' => 'أَنْتُمَا', 'type' => 'detached', 'person' => 'second', 'number' => 'dual', 'gender' => 'both', 'parsing_id' => 5],
            ['name' => 'أَنْتُمْ', 'type' => 'detached', 'person' => 'second', 'number' => 'plural', 'gender' => 'm', 'parsing_id' => 5],
            ['name' => 'أَنْتُنَّ', 'type' => 'detached', 'person' => 'second', 'number' => 'plural', 'gender' => 'f', 'parsing_id' => 5],
            ['name' => 'كَ', 'type' => 'attached', 'person' => 'second', 'number' => 'single', 'gender' => 'm', 'parsing_id' => 3],
            ['name' => 'كِ', 'type' => 'attached', 'person' => 'second', 'number' => 'single', 'gender' => 'f', 'parsing_id' => 3],
            ['name' => 'كُمَا', 'type' => 'attached', 'person' => 'second', 'number' => 'dual', 'gender' => 'both', 'parsing_id' => 3],
            ['name' => 'كُمْ', 'type' => 'attached', 'person' => 'second', 'number' => 'plural', 'gender' => 'm', 'parsing_id' => 3],
            ['name' => 'كُنَّ', 'type' => 'attached', 'person' => 'second', 'number' => 'plural', 'gender' => 'f', 'parsing_id' => 3],
        
            // Third-person pronouns
            ['name' => 'هُوَ', 'type' => 'detached', 'person' => 'third', 'number' => 'single', 'gender' => 'm', 'parsing_id' => 5],
            ['name' => 'هِيَ', 'type' => 'detached', 'person' => 'third', 'number' => 'single', 'gender' => 'f', 'parsing_id' => 5],
            ['name' => 'هُمَا', 'type' => 'detached', 'person' => 'third', 'number' => 'dual', 'gender' => 'both', 'parsing_id' => 5],
            ['name' => 'هُمْ', 'type' => 'detached', 'person' => 'third', 'number' => 'plural', 'gender' => 'm', 'parsing_id' => 5],
            ['name' => 'هُنَّ', 'type' => 'detached', 'person' => 'third', 'number' => 'plural', 'gender' => 'f', 'parsing_id' => 5],
            ['name' => 'هُ', 'type' => 'attached', 'person' => 'third', 'number' => 'single', 'gender' => 'm', 'parsing_id' => 3],
            ['name' => 'هَا', 'type' => 'attached', 'person' => 'third', 'number' => 'single', 'gender' => 'f', 'parsing_id' => 3],
            ['name' => 'هُمَا', 'type' => 'attached', 'person' => 'third', 'number' => 'dual', 'gender' => 'both', 'parsing_id' => 3],
            ['name' => 'هُمْ', 'type' => 'attached', 'person' => 'third', 'number' => 'plural', 'gender' => 'm', 'parsing_id' => 3],
            ['name' => 'هُنَّ', 'type' => 'attached', 'person' => 'third', 'number' => 'plural', 'gender' => 'f', 'parsing_id' => 3],
            ['name' => '(مُسْتَتِرٌ تَقْدِيرُهُ هُوَ)', 'type' => 'hidden', 'person' => 'third', 'number' => 'single', 'gender' => 'm', 'parsing_id' => 5],
            ['name' => '(مُسْتَتِرٌ تَقْدِيرُهُ هِيَ)', 'type' => 'hidden', 'person' => 'third', 'number' => 'single', 'gender' => 'f', 'parsing_id' => 5]
        ]);
        
    }
}
