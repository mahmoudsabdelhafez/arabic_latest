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
            ['name' => 'أَنَا', 'type' => 'detached', 'position' => 'start', 'person' => 'first', 'number' => 'single', 'gender' => 'both', 'parsing_id' => 5, 'definition' => 'أنا، تستخدم للمتكلم المفرد، سواء كان مذكرًا أو مؤنثًا.'],
            ['name' => 'نَحْنُ', 'type' => 'detached', 'position' => 'start', 'person' => 'first', 'number' => 'plural', 'gender' => 'both', 'parsing_id' => 1, 'definition' => 'نحن، تستخدم للمتكلمين الجمع، سواء كانوا مذكرين أو مؤنثين.'],
            ['name' => 'يِ', 'type' => 'attached', 'position' => 'end', 'person' => 'first', 'number' => 'single', 'gender' => 'both', 'parsing_id' => 3, 'definition' => 'ضمير متصل للمتكلم المفرد، سواء كان مذكرًا أو مؤنثًا.'],
            ['name' => 'نَا', 'type' => 'attached', 'position' => 'end', 'person' => 'first', 'number' => 'plural', 'gender' => 'both', 'parsing_id' => 3, 'definition' => 'ضمير متصل للمتكلم الجمع، سواء كان مذكرًا أو مؤنثًا.'],
            ['name' => '(مُسْتَتِرٌ تَقْدِيرُهُ أَنَا)', 'type' => 'hidden', 'position' => 'middle', 'person' => 'first', 'number' => 'single', 'gender' => 'both', 'parsing_id' => 5, 'definition' => 'ضمير مستتر تقديره "أنا" في سياق الجملة.'],
            ['name' => '(مُسْتَتِرٌ تَقْدِيرُهُ نَحْنُ)', 'type' => 'hidden', 'position' => 'middle', 'person' => 'first', 'number' => 'plural', 'gender' => 'both', 'parsing_id' => 5, 'definition' => 'ضمير مستتر تقديره "نحن" في سياق الجملة.'],
            
            // Second-person pronouns
            ['name' => 'أَنْتَ', 'type' => 'detached', 'position' => 'start', 'person' => 'second', 'number' => 'single', 'gender' => 'm', 'parsing_id' => 5, 'definition' => 'أنت، تستخدم للمخاطب المفرد المذكر.'],
            ['name' => 'أَنْتِ', 'type' => 'detached', 'position' => 'start', 'person' => 'second', 'number' => 'single', 'gender' => 'f', 'parsing_id' => 5, 'definition' => 'أنتِ، تستخدم للمخاطب المفرد المؤنث.'],
            ['name' => 'أَنْتُمَا', 'type' => 'detached', 'position' => 'start', 'person' => 'second', 'number' => 'dual', 'gender' => 'both', 'parsing_id' => 5, 'definition' => 'أنتما، تستخدم للمخاطب المثنى (مذكرًا أو مؤنثًا).'],
            ['name' => 'أَنْتُمْ', 'type' => 'detached', 'position' => 'start', 'person' => 'second', 'number' => 'plural', 'gender' => 'm', 'parsing_id' => 5, 'definition' => 'أنتم، تستخدم للمخاطب الجمع المذكر.'],
            ['name' => 'أَنْتُنَّ', 'type' => 'detached', 'position' => 'start', 'person' => 'second', 'number' => 'plural', 'gender' => 'f', 'parsing_id' => 5, 'definition' => 'أنتن، تستخدم للمخاطب الجمع المؤنث.'],
            ['name' => 'كَ', 'type' => 'attached', 'position' => 'end', 'person' => 'second', 'number' => 'single', 'gender' => 'm', 'parsing_id' => 3, 'definition' => 'ضمير متصل للمخاطب المفرد المذكر.'],
            ['name' => 'كِ', 'type' => 'attached', 'position' => 'end', 'person' => 'second', 'number' => 'single', 'gender' => 'f', 'parsing_id' => 3, 'definition' => 'ضمير متصل للمخاطب المفرد المؤنث.'],
            ['name' => 'كُمَا', 'type' => 'attached', 'position' => 'end', 'person' => 'second', 'number' => 'dual', 'gender' => 'both', 'parsing_id' => 3, 'definition' => 'ضمير متصل للمخاطب المثنى (مذكرًا أو مؤنثًا).'],
            ['name' => 'كُمْ', 'type' => 'attached', 'position' => 'end', 'person' => 'second', 'number' => 'plural', 'gender' => 'm', 'parsing_id' => 3, 'definition' => 'ضمير متصل للمخاطب الجمع المذكر.'],
            ['name' => 'كُنَّ', 'type' => 'attached', 'position' => 'end', 'person' => 'second', 'number' => 'plural', 'gender' => 'f', 'parsing_id' => 3, 'definition' => 'ضمير متصل للمخاطب الجمع المؤنث.'],
            
            // Third-person pronouns
            ['name' => 'هُوَ', 'type' => 'detached', 'position' => 'start', 'person' => 'third', 'number' => 'single', 'gender' => 'm', 'parsing_id' => 5, 'definition' => 'هو، يستخدم للمفرد المذكر.'],
            ['name' => 'هِيَ', 'type' => 'detached', 'position' => 'start', 'person' => 'third', 'number' => 'single', 'gender' => 'f', 'parsing_id' => 5, 'definition' => 'هي، تستخدم للمفرد المؤنث.'],
            ['name' => 'هُمَا', 'type' => 'detached', 'position' => 'start', 'person' => 'third', 'number' => 'dual', 'gender' => 'both', 'parsing_id' => 5, 'definition' => 'هما، يستخدم للمثنى (مذكرًا أو مؤنثًا).'],
            ['name' => 'هُمْ', 'type' => 'detached', 'position' => 'start', 'person' => 'third', 'number' => 'plural', 'gender' => 'm', 'parsing_id' => 5, 'definition' => 'هم، يستخدم للجمع المذكر.'],
            ['name' => 'هُنَّ', 'type' => 'detached', 'position' => 'start', 'person' => 'third', 'number' => 'plural', 'gender' => 'f', 'parsing_id' => 5, 'definition' => 'هن، يستخدم للجمع المؤنث.'],
            ['name' => 'هُ', 'type' => 'attached', 'position' => 'end', 'person' => 'third', 'number' => 'single', 'gender' => 'm', 'parsing_id' => 3, 'definition' => 'ضمير متصل للمفرد المذكر.'],
            ['name' => 'هَا', 'type' => 'attached', 'position' => 'end', 'person' => 'third', 'number' => 'single', 'gender' => 'f', 'parsing_id' => 3, 'definition' => 'ضمير متصل للمفرد المؤنث.'],
            ['name' => 'هُمَا', 'type' => 'attached', 'position' => 'end', 'person' => 'third', 'number' => 'dual', 'gender' => 'both', 'parsing_id' => 3, 'definition' => 'ضمير متصل للمثنى (مذكرًا أو مؤنثًا).'],
            ['name' => 'هُمْ', 'type' => 'attached', 'position' => 'end', 'person' => 'third', 'number' => 'plural', 'gender' => 'm', 'parsing_id' => 3, 'definition' => 'ضمير متصل للجمع المذكر.'],
            ['name' => 'هُنَّ', 'type' => 'attached', 'position' => 'end', 'person' => 'third', 'number' => 'plural', 'gender' => 'f', 'parsing_id' => 3, 'definition' => 'ضمير متصل للجمع المؤنث.'],
            ['name' => '(مُسْتَتِرٌ تَقْدِيرُهُ هُوَ)', 'type' => 'hidden', 'position' => 'middle', 'person' => 'third', 'number' => 'single', 'gender' => 'm', 'parsing_id' => 5, 'definition' => 'ضمير مستتر تقديره "هو" في سياق الجملة.'],
            ['name' => '(مُسْتَتِرٌ تَقْدِيرُهُ هِيَ)', 'type' => 'hidden', 'position' => 'middle', 'person' => 'third', 'number' => 'single', 'gender' => 'f', 'parsing_id' => 5, 'definition' => 'ضمير مستتر تقديره "هي" في سياق الجملة.']
        ]);
    }
}
