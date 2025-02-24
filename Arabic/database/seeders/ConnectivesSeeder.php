<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ConnectivesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'Conjunctions' => [
                ['arabic_form' => ',', 'transliteration' => 'and', 'pronunciation' => '(wa)', 'meaning' => 'جاء محمد و علي (Ja\'a Muhammad wa Ali) - Muhammad and Ali came', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
                ['arabic_form' => 't', 'transliteration' => 'then, so, therefore', 'pronunciation' => '(fa)', 'meaning' => 'دخل فجلس (Dakhala fa-jalasa) - He entered, then sat down', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
                ['arabic_form' => 'ثم', 'transliteration' => 'then, after that', 'pronunciation' => '(thumma)', 'meaning' => 'أكلت ثم نمت (Akalt thumma nimt) - I ate, then I slept', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
                ['arabic_form' => 'أو', 'transliteration' => 'or', 'pronunciation' => '(aw)', 'meaning' => 'تريد تفاحاً أو برتقالاً؟ (Turid tuffahan aw burtuqalan?) - Do you want an apple or an orange?', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
                ['arabic_form' => 'أم', 'transliteration' => 'or (interrogative)', 'pronunciation' => '(am)', 'meaning' => 'أأنت فعلت هذا أم أخوك؟ (A\'anta fa\'alt hadha am akhuk?) - Did you do this or your brother?', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
                ['arabic_form' => 'لكن', 'transliteration' => 'but, however', 'pronunciation' => '(lakin)', 'meaning' => 'الجو جميل لكنه بارد (Al-jaw jamil lakinahu barid) - The weather is beautiful, but it\'s cold', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
                ['arabic_form' => 'بل', 'transliteration' => 'but, rather', 'pronunciation' => '(bal)', 'meaning' => 'ما قلت الحق بل كذبت (Ma qult al-haqq bal kadhabt) - You didn\'t tell the truth, but rather lied', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
                ['arabic_form' => 'حتى', 'transliteration' => 'until, even, so that', 'pronunciation' => '(hatta)', 'meaning' => 'سرت حتى وصلت (Sirt hatta wasalt) - I traveled until I arrived', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
            ],
            'Prepositions' => [
                ['arabic_form' => 'من', 'transliteration' => 'from', 'pronunciation' => '(min)', 'meaning' => 'الكتاب من المكتبة (Al-kitab min al-maktaba) - The book is from the library', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
                ['arabic_form' => 'إلى', 'transliteration' => 'to', 'pronunciation' => '(ila)', 'meaning' => 'ذهبت إلى المدرسة (Dhahabtu ila al-madrasa) - I went to school', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
                ['arabic_form' => 'عن', 'transliteration' => 'about, from', 'pronunciation' => '(an)', 'meaning' => 'سألت عن الموضوع (Sa\'alt an al-mawdu) - I asked about the topic', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
            ],
            'ConditionalParticles' => [
                ['arabic_form' => 'إنْ', 'transliteration' => 'if', 'pronunciation' => '(in)', 'meaning' => 'إن تدرس تنجح (In tadrus tanjah) - If you study, you will succeed', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
                ['arabic_form' => 'إذا', 'transliteration' => 'if, when', 'pronunciation' => '(idha)', 'meaning' => 'إذا جاء الشتاء برد (Idha ja\'a al-shita\'a barad) - When winter comes, it gets cold', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
            ],
            'CausalParticles' => [
                ['arabic_form' => 'لأن', 'transliteration' => 'because', 'pronunciation' => '(li\'anna)', 'meaning' => 'أحبك لأنك مخلص (Uhibbuka li\'annaka mukhlis) - I love you because you are sincere', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
                ['arabic_form' => 'بسبب', 'transliteration' => 'because of', 'pronunciation' => '(bisabab)', 'meaning' => 'نجحت بسبب اجتهادي (Najaht bisabab ijtihadi) - I succeeded because of my hard work', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
            ],
            'ExceptiveParticles' => [
                ['arabic_form' => 'إلا', 'transliteration' => 'except', 'pronunciation' => '(illa)', 'meaning' => 'كل الطلاب حضروا إلا علياً (Kull al-tullab hadaru illa `Aliyyan) - All the students attended except Ali', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
                ['arabic_form' => 'غير', 'transliteration' => 'except, other than', 'pronunciation' => '(ghayr)', 'meaning' => 'كل شيء جائز غير الظلم (Kull shay\' ja\'iz ghayr al-zulm) - Everything is permissible except injustice', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
            ],
            'RelativePronouns' => [
                ['arabic_form' => 'الذي', 'transliteration' => 'who, which (masculine singular)', 'pronunciation' => '(alladhi)', 'meaning' => 'الرجل الذي رأيته (Al-rajul alladhi ra\'aytuhu) - The man whom I saw', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
                ['arabic_form' => 'التي', 'transliteration' => 'who, which (feminine singular)', 'pronunciation' => '(allati)', 'meaning' => 'المرأة التي كلمتها (Al-mar\'a allati kallamtuha) - The woman whom I spoke to', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
            ],
            'DemonstrativePronouns' => [
                ['arabic_form' => 'هذا', 'transliteration' => 'this (masculine singular)', 'pronunciation' => '(hadha)', 'meaning' => 'هذا كتاب (Hadha kitab) - This is a book', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
                ['arabic_form' => 'هذه', 'transliteration' => 'this (feminine singular)', 'pronunciation' => '(hadhihi)', 'meaning' => 'هذه سيارة (Hadhihi sayyara) - This is a car', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
            ],
            'Pronouns' => [
                ['arabic_form' => 'هو', 'transliteration' => 'he', 'pronunciation' => '(huwa)', 'meaning' => 'هو طالب (Huwa talib) - He is a student', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
                ['arabic_form' => 'هي', 'transliteration' => 'she', 'pronunciation' => '(hiya)', 'meaning' => 'هي معلمة (Hiya mu\'allima) - She is a teacher', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
            ],
            'ParticlesOfExplanation' => [
                ['arabic_form' => 'أي', 'transliteration' => 'meaning, that is to say', 'pronunciation' => '(ay)', 'meaning' => 'قلتُ أيْ أنني متعب (Qultu ay anni mut`ab) - I said, meaning that I am tired', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
                ['arabic_form' => 'بمعنى', 'transliteration' => 'meaning, in other words', 'pronunciation' => '(bima`na)', 'meaning' => 'هذا بمعنى آخر (Hadha bima`na akhar) - This means in other words', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
            ],
            'ParticlesOfResult' => [
                ['arabic_form' => 'فـ', 'transliteration' => 'fa-', 'pronunciation' => '(fa-)', 'meaning' => 'درستُ فنجحتُ (Darastu fa-najahtu) - I studied, so I succeeded', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
                ['arabic_form' => 'إذن', 'transliteration' => 'idhan', 'pronunciation' => '(idhan)', 'meaning' => 'أنت متعب إذن استرح (Anta mut`ab idhan istarih) - You are tired, therefore rest', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft']
            ],
            'ParticlesOfPurposeReason' => [
                ['arabic_form' => 'كي', 'transliteration' => 'kay', 'pronunciation' => '(kay)', 'meaning' => 'أدرس كي أنجح (Adrus kay anjah) - I study in order to succeed', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
                ['arabic_form' => 'لكي', 'transliteration' => 'liki', 'pronunciation' => '(liki)', 'meaning' => 'أدرس لكي أنجح (Adrus liki anjah) - I study in order to succeed', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft']
            ],
            'AdverbsOfTimePlace' => [
                ['arabic_form' => 'اليوم', 'transliteration' => 'al-yawm', 'pronunciation' => '(al-yawm)', 'meaning' => 'اليوم الجو جميل (Al-yawm al-jaw jamil) - Today the weather is beautiful', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
                ['arabic_form' => 'هنا', 'transliteration' => 'huna', 'pronunciation' => '(huna)', 'meaning' => 'أنا هنا (Ana huna) - I am here', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft']
            ],
            'InterrogativeParticles' => [
                ['arabic_form' => 'أ', 'transliteration' => 'a', 'pronunciation' => '(a)', 'meaning' => 'أذهبتَ إلى السوق؟ (A dhahabta ila al-suq?) - Did you go to the market?', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
                ['arabic_form' => 'هل', 'transliteration' => 'hal', 'pronunciation' => '(hal)', 'meaning' => 'هل أنت بخير؟ (Hal anta bi-khayr?) - Are you well?', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft']
            ],
            'VocativeParticle' => [
                ['arabic_form' => 'يا', 'transliteration' => 'ya', 'pronunciation' => '(ya)', 'meaning' => 'يا محمد! (Ya Muhammad!) - O Muhammad!', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft']
            ],
            'WordsOfAddition' => [
                ['arabic_form' => 'أيضاً', 'transliteration' => 'aydan', 'pronunciation' => '(aydan)', 'meaning' => 'أنا أيضاً متعب (Ana aydan mut`ab) - I am also tired', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft'],
                ['arabic_form' => 'كذلك', 'transliteration' => 'kadhalika', 'pronunciation' => '(kadhalika)', 'meaning' => 'هو كذلك (Huwa kadhalika) - He is likewise', 'grammatical_function' => null,  'is_classical' => false, 'notes' => null, 'status' => 'draft']
            ],
            'WordsOfContrast' => [
                ['arabic_form' => 'على الرغم من', 'transliteration' => 'ala al-raghm', 'pronunciation' => '(ala al-raghm)', 'meaning' => 'على الرغم من التعب، أكمل العمل (Ala al-raghm min al-ta`ab, akmala al-amal) - Despite the fatigue, he completed the work', 'grammatical_function' => null, 'connective_form' => 'hyprid', 'is_classical' => false, 'notes' => null, 'status' => 'draft']
            ]
            
        ];

        $categoryNames = array_keys($data);

        foreach ($categoryNames as $categoryName) {
            // Fetch category id or create a new category if not found
            $category = DB::table('connective_categories')->where('name', $categoryName)->first();
            if (!$category) {
                $categoryId = DB::table('connective_categories')->insertGetId([
                    'name' => $categoryName,
                    'arabic_name' => $categoryName,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            } else {
                $categoryId = $category->id;
            }

            foreach ($data[$categoryName] as $connective) {
                DB::table('connectives')->insert([
                    'name' => $connective['arabic_form'],
                    'transliteration' => $connective['transliteration'],
                    'pronunciation' => $connective['pronunciation'],
                    'meaning' => $connective['meaning'],
                    'syntactic_effect_id' =>1,
                    'semantic_logical_effect_id' =>1,
                    'category_id' => $categoryId,
                    'grammatical_function' => $connective['grammatical_function'],
                    // 'connective_form' => $connective['connective_form'],
                    'is_classical' => $connective['is_classical'],
                    'notes' => $connective['notes'],
                    'status' => $connective['status'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    
                ]);
            }
}
}
}