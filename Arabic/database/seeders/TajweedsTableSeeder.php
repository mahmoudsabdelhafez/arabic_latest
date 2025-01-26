<?php

namespace Database\Seeders;

use App\Models\Tajweed;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TajweedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tajweed::insert([
            [
                'rule_name' => 'الإدغام بغنة: النون ساكنة مع الياء',
                'description' => 'إدخال النون الساكنة في حرف الياء ليصبح حرفًا مشددًا مع غنة واضحة',
                'example_ayah' => 'فَمَنْ يَعْمَلْ مِثْقَالَ ذَرَّةٍ خَيْرًا يَرَهُ ',
                'expression' => 'ن ي',
                'category_id' => 1, // أحكام الإدغام
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            [
                'rule_name' => 'الإدغام بغنة: النون ساكنة مع النون',
                'description' => 'إدخال النون الساكنة في حرف النون ليصبح حرفًا مشددًا مع غنة واضحة',
                'example_ayah' => 'وَمَا بِكُم مِّن نِّعْمَةٍ فَمِنَ اللَّهِ ۖ ثُمَّ إِذَا مَسَّكُمُ الضُّرُّ فَإِلَيْهِ تَجْأَرُونَ',
                'expression' => 'ن ن',
                'category_id' => 1, // أحكام الإدغام
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            [
                'rule_name' => 'الإدغام بغنة: النون ساكنة مع الميم',
                'description' => 'إدخال النون الساكنة في حرف الميم ليصبح حرفًا مشددًا مع غنة واضحة',
                'example_ayah' => ' وَآتُوهُم مِّن مَّالِ اللَّهِ الَّذِي آتَاكُمْ',
                'expression' => 'ن م',
                'category_id' => 1, // أحكام الإدغام
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            [
                'rule_name' => 'الإدغام بغنة: نون ساكنة مع الواو',
                'description' => 'إدخال النون الساكنة في حرف الواو ليصبح حرفًا مشددًا مع غنة واضحة',
                'example_ayah' => 'وَمَا لَهُم مِّن دُونِهِ مِن وَالٍ',
                'expression' => 'ن و',
                'category_id' => 1, // أحكام الإدغام
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            [
                'rule_name' => 'الإدغام بغير غنة: نون ساكنة مع اللام',
                'description' => 'إدخال النون الساكنة في حرف اللام ليصبح حرفًا مشددًا بدون غنة',
                'example_ayah' => 'قَيِّمًا لِّيُنذِرَ بَأْسًا شَدِيدًا مِّن لَّدُنْهُ',
                'expression' => 'ن ل',
                'category_id' => 1, // أحكام الإدغام
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            [
                'rule_name' => 'الإدغام بغير غنة: نون ساكنة مع الراء',
                'description' => 'إدخال النون الساكنة في حرف الراء ليصبح حرفًا مشددًا بدون غنة',
                'example_ayah' => 'أُولَٰئِكَ عَلَيْهِمْ صَلَوَاتٌ مِّن رَّبِّهِمْ وَرَحْمَةٌ ۖ وَأُولَٰئِكَ هُمُ الْمُهْتَدُونَ',
                'expression' => 'ن ر',
                'category_id' => 1, // أحكام الإدغام
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // ============================================================================

            [
                'rule_name' => 'الإدغام بغنة: تنوين الضم  مع الياء',
                'description' => 'إدخال التنوين في حرف الياء مع غنة ليصبح حرفًا مشددًا',
                'example_ayah' => 'برقٌ يجعلون',
                'expression' => 'ٌ ي',
                'category_id' => 1, // أحكام الإدغام
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rule_name' => 'الإدغام بغنة: تنوين الكسر مع النون',
                'description' => 'إدخال التنوين في حرف النون مع غنة ليصبح حرفًا مشددًا',
                'example_ayah' => "وُجُوهٌ يَوْمَئِذٍ نَّاعِمَةٌ",
                'expression' => 'ٍ ن',
                'category_id' => 1, // أحكام الإدغام
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rule_name' => 'الإدغام بغنة: تنوين الفتح  مع الميم',
                'description' => 'إدخال التنوين في حرف الميم مع غنة ليصبح حرفًا مشددًا',
                'example_ayah' => ' وَيَطُوفُ عَلَيْهِمْ وِلْدَانٌ مُّخَلَّدُونَ إِذَا رَأَيْتَهُمْ حَسِبْتَهُمْ لُؤْلُؤًا مَّنثُورًا ',
                'expression' => 'ً م',
                'category_id' => 1, // أحكام الإدغام
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rule_name' => 'الإدغام بغنة: تنوين الضم  مع الواو',
                'description' => 'إدخال التنوين في حرف الواو مع غنة ليصبح حرفًا مشددًا',
                'example_ayah' => 'وَلِكُلٍّ وِجْهَةٌ هُوَ مُوَلِّيهَا',
                'expression' => 'ٌ و',
                'category_id' => 1, // أحكام الإدغام
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ============================================================


          
            [
                'rule_name' => 'الإدغام  بغير غنة تنوين الضم مع اللام',
                'description' => 'إدخال التنوين في اللام بدون غنة ليصبح الحرفان حرفًا واحدًا مشددًا',
                'example_ayah' => 'فَسَلَامٌ لَّكَ مِنْ أَصْحَابِ الْيَمِينِ',
                'expression' => 'ٌ ل',
                'category_id' => 1, // Replace with actual category ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rule_name' => 'الإدغام  بغير غنة تنوين الضم مع الراء',
                'description' => 'إدخال التنوين في الراء بدون غنة ليصبح الحرفان حرفًا واحدًا مشددًا',
                'example_ayah' => 'إِنَّ اللَّهَ غَفُورٌ رَّحِيمٌ',
                'expression' => 'ٌ ر',
                'category_id' => 1, // Replace with actual category ID
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ===========================================================نهاية النون السكانة والتنوين
            [
                'rule_name' => 'الادغام الشفوي',
                'description' => ' تدغم الميم الساكنة إذا أتى بعدها حرف واحد وهو الميم
بحيث تصيران ميماً مُشدَّدة تلفظ بإطباق الشفتين مع تطويل الغنة أكمل ما تكون،',
                'example_ayah' => 'الَّذِي أَطْعَمَهُم مِّن جُوعٍ وَآمَنَهُم مِّنْ خَوْفٍ',
                'expression' => 'م م',
                'category_id' => 2, // Replace with actual category ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rule_name' => 'الإخفاء الشفوي',
                'description' => 'تخفى الميم الساكنة إذا أتى بعدها حرف واحد وهو الباء
وتلفظ باطباق الشفتين بدون مجافاة ولا كز مع تطويل الغنة (كما ذكرنا في اخفاء الميم المنقلبة عن النون الساكنة في حكم إقلاب النون الساكنة) ،',
                'example_ayah' => 'نَّحْنُ نَقُصُّ عَلَيْكَ نَبَأَهُم بِالْحَقِّ',
                'expression' => 'م ب',
                'category_id' => 2, // Replace with actual category ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
          //============================================================ نهاية الميم الساكنة
          [
            'rule_name' => 'ادغام المتماثلين التاء مع التاء',
            'description' => 'إدخال التاء الساكنة في التاء المتحركة لتصبح حرفًا واحدًا مشددًا',
            'example_ayah' => 'رَبِحَت تِّـجَارَتُهُمْ',
            'expression' => 'ت ت',
            'category_id' => 3, // Replace with actual category ID
            'created_at' => now(),
            'updated_at' => now(),
        ],
          [
            'rule_name' => 'ادغام المتماثلين الدال مع الدال',
            'description' => 'إدخال الدال الساكنة في الدال المتحركة لتصبح حرفًا واحدًا مشددًا',
            'example_ayah' => 'وَقَـد دَّخَلُواْ',
            'expression' => 'د د',
            'category_id' => 3, // Replace with actual category ID
            'created_at' => now(),
            'updated_at' => now(),
        ],
          [
            'rule_name' => 'ادغام المتماثلين الذال مع الذال',
            'description' => 'إدخال الذال الساكنة في الذال المتحركة لتصبح حرفًا واحدًا مشددًا',
            'example_ayah' => 'إِذ ذَّهَبَ',
            'expression' => 'ذ ذ',
            'category_id' => 3, // Replace with actual category ID
            'created_at' => now(),
            'updated_at' => now(),
        ],
          [
            'rule_name' => 'ادغام المتماثلين الكاف مع الكاف',
            'description' => 'إدخال الكاف الساكنة في الكاف المتحركة لتصبح حرفًا واحدًا مشددًا',
            'example_ayah' => 'يُدْرِككُّمُ ',
            'expression' => 'كك',
            'category_id' => 3, // Replace with actual category ID
            'created_at' => now(),
            'updated_at' => now(),
        ],
          [
            'rule_name' => 'ادغام المتماثلين اللام مع اللام',
            'description' => 'إدخال اللام الساكنة في اللام المتحركة لتصبح حرفًا واحدًا مشددًا',
            'example_ayah' => 'قُـل لاَّ',
            'expression' => 'ل ل',
            'category_id' => 3, // Replace with actual category ID
            'created_at' => now(),
            'updated_at' => now(),
        ],
          [
            'rule_name' => 'ادغام المتماثلين الفاء مع الفاء',
            'description' => 'إدخال الفاء الساكنة في الفاء المتحركة لتصبح حرفًا واحدًا مشددًا',
            'example_ayah' => 'فَلاَ يُسْرِف فِّــي',
            'expression' => 'ف ف',
            'category_id' => 3, // Replace with actual category ID
            'created_at' => now(),
            'updated_at' => now(),
        ],
          [
            'rule_name' => 'ادغام المتماثلين الباء مع الباء',
            'description' => 'إدخال الباء الساكنة في الباء المتحركة لتصبح حرفًا واحدًا مشددًا',
            'example_ayah' => 'اذْهَب بِّـكِتَابِي',
            'expression' => 'ب ب',
            'category_id' => 3, // Replace with actual category ID
            'created_at' => now(),
            'updated_at' => now(),
        ],
          [
            'rule_name' => 'ادغام المتماثلين الميم مع الميم',
            'description' => 'إدخال الماء الساكنة في الماء المتحركة لتصبح حرفًا واحدًا مشددًا',
            'example_ayah' => 'جَاءتْكُـم مَّـوْعِظَةٌ',
            'expression' => 'م م',
            'category_id' => 3, // Replace with actual category ID
            'created_at' => now(),
            'updated_at' => now(),
        ],
          [
            'rule_name' => 'ادغام المتماثلين النون مع النون',
            'description' => 'إدخال النون الساكنة في النون المتحركة لتصبح حرفًا واحدًا مشددًا',
            'example_ayah' => 'لَـن نَّـصْبِرَ',
            'expression' => 'ن ن',
            'category_id' => 3, // Replace with actual category ID
            'created_at' => now(),
            'updated_at' => now(),
        ],
          [
            'rule_name' => 'ادغام المتقاربين اللام الساكنة مع الراء',
            'description' => 'إدخال اللام الساكنة في الراء المتحركة لتصبح حرفًا واحدًا مشددًا',
            'example_ayah' => 'وَقُـل رَّبِّ',
            'expression' => 'لْ ر',
            'category_id' => 3, // Replace with actual category ID
            'created_at' => now(),
            'updated_at' => now(),
        ],
          [
            'rule_name' => 'ادغام المتقاربين القاف الساكنة مع الكاف',
            'description' => 'إدخال القاف الساكنة في الكاف المتحركة لتصبح حرفًا واحدًا مشددًا',
            'example_ayah' => 'أَلَمْ نَخْـلُـقكُّـم',
            'expression' => 'قْك',
            'category_id' => 3, // Replace with actual category ID
            'created_at' => now(),
            'updated_at' => now(),
        ],
          [
            'rule_name' => 'ادغام المتجانسين تاء التأنيث الساكنة مع الطاء',
            'description' => 'إدخال التاء الساكنة في الطاء المتحركة لتصبح حرفًا واحدًا مشددًا',
            'example_ayah' => 'وَدَّت طَّـآئِفَةٌ',
            'expression' => 'ت ط',
            'category_id' => 3, // Replace with actual category ID
            'created_at' => now(),
            'updated_at' => now(),
        ],
          [
            'rule_name' => 'ادغام المتجانسين الطاء الساكنة مع التاء',
            'description' => 'إدخال الطاء الساكنة في التاء المتحركة لتصبح حرفًا واحدًا مشددًا',
            'example_ayah' => 'لَئِن بَسَطتَ',
            'expression' => 'طت',
            'category_id' => 3, // Replace with actual category ID
            'created_at' => now(),
            'updated_at' => now(),
        ],
          [
            'rule_name' => 'ادغام المتجانسين تاء التأنيث الساكنة مع الدال',
            'description' => 'إدخال التاء الساكنة في الدال المتحركة لتصبح حرفًا واحدًا مشددًا',
            'example_ayah' => 'فَلَمَّا أَثْقَلَت دَّعَوَا اللّهَ رَبَّهُمَا',
            'expression' => 'ت د',
            'category_id' => 3, // Replace with actual category ID
            'created_at' => now(),
            'updated_at' => now(),
        ],
          [
            'rule_name' => 'ادغام المتجانسين الدال الساكنة في التاء',
            'description' => 'إدخال الدال الساكنة في التاء المتحركة لتصبح حرفًا واحدًا مشددًا',
            'example_ayah' => 'قَد تَّـبَيَّنَ',
            'expression' => 'د ت',
            'category_id' => 3, // Replace with actual category ID
            'created_at' => now(),
            'updated_at' => now(),
        ],
          [
            'rule_name' => 'ادغام المتجانسين  الذال الساكنة في الظاء',
            'description' => 'إدخال الذال الساكنة في الظاء المتحركة لتصبح حرفًا واحدًا مشددًا',
            'example_ayah' => 'إِذ ظَّلَمُواْ',
            'expression' => 'ذ ظ',
            'category_id' => 3, // Replace with actual category ID
            'created_at' => now(),
            'updated_at' => now(),
        ],
          

          // ========================================================== نهاية احكام الادغام
            [
                'rule_name' => 'تفخيم الراء المفتوحة',
                'description' => 'إصدار الصوت القوي والمشدّد عند نطق الراء المفتوحة, مما يعزز تفخيم الحرف',
                'example_ayah' => 'أَلَمْ تَرَ كَيْفَ فَعَلَ رَبُّكَ بِأَصْحَابِ الْفِيلِ',
                'expression' => 'رَ',
                'category_id' => 4, // Replace with actual category ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rule_name' => 'تفخيم الراء المضمومة',
                'description' => 'إصدار الصوت القوي والمشدّد عند نطق الراء الضمومة, مما يعزز تفخيم الحرف',
                'example_ayah' => "كُلَّمَا رُزِقُواْ مِنْهَا مِن ثَمَرَةٍ",
                'expression' => 'رُ',
                'category_id' => 4, // Replace with actual category ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rule_name' => 'تفخيم الراء الساكنة بعد فتح',
                'description' => 'صدار الصوت القوي والمشدّد عند نطق الراء الساكنة بعد حركة الفتح',
                'example_ayah' => "فَالْفَارِقَاتِ فَرْقاً",
                'expression' => 'ر َ',
                'category_id' => 4, // Replace with actual category ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rule_name' => 'تفخيم الراء الساكنة بعد ضم',
                'description' => 'صدار الصوت القوي والمشدّد عند نطق الراء الساكنة بعد حركة الضم',
                'example_ayah' => 'وَالْمُرْسَلَاتِ عُرْفاً',
                'expression' => 'ر ُ',
                'category_id' => 4, // Replace with actual category ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rule_name' => 'ترقيق الراء المكسورة',
                'description' => 'إصدار الصوت اللين والرخو عند نطق الراء المكسورة',
                'example_ayah' => "إِيلَافِهِمْ رِحْلَةَ الشِّتَاء وَالصَّيْفِ",
                'expression' => 'رِ',
                'category_id' => 4, // Replace with actual category ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rule_name' => 'ترقيق الراء الساكنة التي قبلها كسر',
                'description' => 'إصدار الصوت اللين للراء الساكنة عندما تأتي بعد حرف مكسور',
                'example_ayah' => "فِرْعَوْنَ وَثَمُودَ",
                'expression' => 'رْ ِ',
                'category_id' => 4, // Replace with actual category ID
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // =============================نهاية التفخيم والترقيق
        ]);
    }
}
