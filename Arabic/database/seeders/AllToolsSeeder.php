<?php

namespace Database\Seeders;

use App\Models\AllTool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllToolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Conditional Tools
         AllTool::create([
            'linking_tool_id' => 2,
            'name' => 'إذا',
            'english_name' => 'if/when',
            'standalone' => false,
            'example' => 'إذا درست، نجحت. (If you study, you will succeed.)',
            'description' => null,
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 2,
            'name' => 'إن',
            'english_name' => 'if',
            'standalone' => false,
            'example' => 'إن تجتهد، تنجح. (If you work hard, you will succeed.)',
            'description' => null,
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 2,
            'name' => 'متى',
            'english_name' => 'when',
            'standalone' => false,
            'example' => 'متى تزرع، تحصد. (When you plant, you will harvest.)',
            'description' => null,
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 2,
            'name' => 'لو',
            'english_name' => 'if only',
            'standalone' => false,
            'example' => 'If only you had studied, you wouldn’t have failed...',
            'description' => null,
            
            
        ]);

 // Detail Tools
 AllTool::create([
    'linking_tool_id' => 3,
    'name' => 'أكثر من',
    'english_name' => 'More than',
    'standalone' => false,
    'example' => 'إما أن تدرس، وإما أن تعمل. (Either you study or you work.)',
    'description' => null,
    
    
]);

AllTool::create([
    'linking_tool_id' => 3,
    'name' => 'أقل من',
    'english_name' => 'Less than',
    'standalone' => false,
    'example' => 'إما أن تذهب، وإما أن تبقى. (Either you go, or you stay.)',
    'description' => null,
    
    
]);

// Negative Tools
AllTool::create([
    'linking_tool_id' => 4,
    'name' => 'لا',
    'english_name' => 'No',
    'standalone' => false,
    'example' => 'أنا لا أدرس (I do not study.)',
    'description' => 'Used for negation in a sentence.',
    
    
]);

AllTool::create([
    'linking_tool_id' => 4,
    'name' => 'ليس',
    'english_name' => 'is not',
    'standalone' => false,
    'example' => 'الجو ليس جميلاً (The weather is not nice.)',
    'description' => 'Used with the subject and predicate for negation.',
    
    
]);

AllTool::create([
    'linking_tool_id' => 4,
    'name' => 'ما',
    'english_name' => 'not',
    'standalone' => false,
    'example' => 'ما قرأت الكتاب (I did not read the book.)',
    'description' => 'Used for negation in past or future.',
    
    
]);

// Exception Tools
AllTool::create([
    'linking_tool_id' => 5,
    'name' => 'غير',
    'english_name' => 'Other than',
    'standalone' => false,
    'example' => 'لا يوجد غير الحق (There is nothing other than the truth.)',
    'description' => 'Used to indicate something different from another.',
    
    
]);

AllTool::create([
    'linking_tool_id' => 5,
    'name' => 'إلا',
    'english_name' => 'Except',
    'standalone' => false,
    'example' => 'لم يحضر أحدٌ إلا محمد (No one attended except Mohammed.)',
    'description' => 'Used for excluding someone or something from a group.',
    
    
]);

AllTool::create([
    'linking_tool_id' => 5,
    'name' => 'ما عدا',
    'english_name' => 'Except for',
    'standalone' => false,
    'example' => 'كلهم حضروا ما عدا أحمد (They all attended except Ahmed.)',
    'description' => 'Used to exclude something or someone from a group.',
    
    
]);

        // Prepositions (linking_tool_id = 6)
        AllTool::create([
            'linking_tool_id' => 6,
            'name' => 'في',
            'english_name' => 'Fi',
            'standalone' => true,
            'example' => 'الكتاب في الحقيبة. (The book is in the bag.)',
            'description' => null,
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 6,
            'name' => 'على',
            'english_name' => 'Ala',
            'standalone' => true,
            'example' => 'الطائر على الشجرة. (The bird is on the tree.)',
            'description' => null,
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 6,
            'name' => 'ب',
            'english_name' => 'Min',
            'standalone' => false,
            'example' => 'أنا من الأردن. (I am from Jordan.)',
            'description' => null,
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 6,
            'name' => 'إلى',
            'english_name' => 'Ila',
            'standalone' => true,
            'example' => 'سافرت إلى مصر. (I traveled to Egypt.)',
            'description' => null,
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 6,
            'name' => 'بِ',
            'english_name' => 'be',
            'standalone' => false,
            'example' => 'aa (example)',
            'description' => null,
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 6,
            'name' => 'كَ',
            'english_name' => 'سس',
            'standalone' => false,
            'example' => 'ق (example)',
            'description' => null,
            
            
        ]);

        // Explanations (linking_tool_id = 7)
        AllTool::create([
            'linking_tool_id' => 7,
            'name' => 'لأن',
            'english_name' => 'Li\'an',
            'standalone' => false,
            'example' => 'نجحت لأنني درست جيدًا. (I succeeded because I studied well.)',
            'description' => null,
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 7,
            'name' => 'بسبب',
            'english_name' => 'Bisabab',
            'standalone' => false,
            'example' => 'تأخرت بسبب الزحام. (I was late because of the traffic.)',
            'description' => null,
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 7,
            'name' => 'إذ',
            'english_name' => 'Ith',
            'standalone' => false,
            'example' => 'وصلت إذ كان المطر ينهمر. (I arrived as the rain was pouring down.)',
            'description' => null,
            
            
        ]);

        // Linking tool with id = 10
        AllTool::create([
            'linking_tool_id' => 10,
            'name' => 'معًا',
            'english_name' => 'together',
            'standalone' => false,
            'example' => 'نحن نعمل معًا في المشروع (We are working together on the project)',
            'description' => 'أداة تستخدم للتعبير عن العمل المشترك أو التزامن في...',
            
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 10,
            'name' => 'في نفس الوقت',
            'english_name' => 'at the same time',
            'standalone' => false,
            'example' => 'كانوا يدرسون في نفس الوقت (They were studying at the same time)',
            'description' => 'عبارة تستخدم للتعبير عن حدوث الأحداث في نفس الوقت',
            
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 10,
            'name' => 'في ذات اللحظة',
            'english_name' => 'at that moment',
            'standalone' => false,
            'example' => 'في ذات اللحظة كان الهاتف يرن (At that moment, the phone was ringing)',
            'description' => 'عبارة تستخدم للإشارة إلى حدوث شيء في لحظة معينة',
            
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 10,
            'name' => 'بالتوازي',
            'english_name' => 'in parallel',
            'standalone' => false,
            'example' => 'عملنا على المشروع بالتوازي مع الأبحاث (We worked on the project in parallel with the research)',
            'description' => 'عبارة تستخدم لتوضيح حدوث الأشياء بشكل متزامن أو بنفس الوقت',
            
            
            
        ]);

        // Linking tool with id = 11
        AllTool::create([
            'linking_tool_id' => 11,
            'name' => 'ك',
            'english_name' => 'k',
            'standalone' => false,
            
            
            'example' => 'كان الرجل شجاعًا كالأسد في المعركة (The man was as brave as a lion in battle)',
            'description' => 'تشبيه الرجل بالأسد للدلالة على الشجاعة',
           
        ]);

        AllTool::create([
            'linking_tool_id' => 11,
            'name' => 'ل',
            'english_name' => 'ل',
            'standalone' => false,
           
            'example' => 'NULL',
            'description' => 'NULL',
       
        ]);

        // Linking tool with id = 12
        AllTool::create([
            'linking_tool_id' => 12,
            'name' => 'إذن',
            'english_name' => 'Therefore',
            'standalone' => false,
            'example' => 'أدرس بجد، إذن سأحصل على درجة جيدة (I study hard, therefore I will get a good grade)',
            'description' => 'أداة استنتاجية تستخدم للتعبير عن النتيجة أو الاستنتاج',
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 12,
            'name' => 'إذن، إذاً',
            'english_name' => 'Thus',
            'standalone' => false,
            'example' => 'الشمس مشرقة، إذاً سيكون الجو دافئًا (The sun is shining, thus it will be warm)',
            'description' => 'أداة استنتاجية تستخدم للإشارة إلى النتيجة المتوقعة بناءً على الحالة الحالية',
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 12,
            'name' => 'لذلك',
            'english_name' => 'For that reason',
            'standalone' => false,
            'example' => 'سأغادر الآن، لذلك يجب أن تأخذ مفتاح السيارة (I will leave now, for that reason, you should take the car key)',
            'description' => 'أداة استنتاجية تستخدم للإشارة إلى سبب أو نتيجة بناءً على حالة سابقة',
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 12,
            'name' => 'إلى هنا',
            'english_name' => 'Thus far',
            'standalone' => false,
            'example' => 'قرأت الكتاب بأكمله، إلى هنا يمكنني القول أنه جيد (I have read the entire book, thus far I can say it is good)',
            'description' => 'أداة استنتاجية تستخدم للإشارة إلى انتهاء مرحلة أو الوصول إلى نقطة معينة',
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 13,
            'name' => 'أولاً',
            'english_name' => 'First',
            'standalone' => false,
            'example' => 'أولاً، يجب أن نجهز الأدوات.',
            'description' => 'أداة ترتيبية تشير إلى البداية أو الخطوة الأولى في العملية.',
            
            
        ]);







        AllTool::create([
            'linking_tool_id' => 14,
            'name' => 'لأن',
            'english_name' => 'Because',
            'standalone' => false,
            'example' => 'ذهبت إلى الطبيب لأنني كنت مريضًا.',
            'description' => 'تُستخدم لبيان السبب في الجملة.',
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 14,
            'name' => 'بسبب',
            'english_name' => 'Due to',
            'standalone' => false,
            'example' => 'تأخر القطار بسبب العاصفة.',
            'description' => 'تستخدم لبيان السبب وتأتي بعد الاسم.',
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 14,
            'name' => 'لذلك',
            'english_name' => 'Therefore',
            'standalone' => false,
            'example' => 'كان الجو ممطرًا، لذلك لم نخرج من المنزل.',
            'description' => 'تُستخدم لبيان النتيجة بناءً على سبب معين.',
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 14,
            'name' => 'إذن',
            'english_name' => 'Then',
            'standalone' => false,
            'example' => 'إذا كنت تريد النجاح، إذن عليك الاجتهاد.',
            'description' => 'تُستخدم للاستنتاج بناءً على شرط أو سبب.',
            
            
        ]);



        AllTool::create([
            'linking_tool_id' => 15,
            'name' => 'و',
            'english_name' => 'And',
            'standalone' => false,
            'example' => 'ذهبت إلى السوق واشتريت الفاكهة.',
            'description' => 'حرف عطف يستخدم للربط بين الكلمات أو الجمل بدون تمييز.',
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 15,
            'name' => 'أو',
            'english_name' => 'Or',
            'standalone' => false,
            'example' => 'يمكنك شرب الشاي أو القهوة.',
            'description' => 'يستخدم لتقديم أحد الخيارين أو أكثر.',
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 15,
            'name' => 'لكن',
            'english_name' => 'But',
            'standalone' => false,
            'example' => 'أردت الخروج لكن الجو كان ممطرًا.',
            'description' => 'يستخدم لإظهار التناقض بين الجملتين.',
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 15,
            'name' => 'بل',
            'english_name' => 'Rather',
            'standalone' => false,
            'example' => 'ما قاله ليس صحيحًا، بل خاطئ تمامًا.',
            'description' => 'يستخدم لإبطال المعنى الأول وتقديم بديل.',
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 15,
            'name' => 'ثم',
            'english_name' => 'Later',
            'standalone' => false,
            'example' => 'ذهبت إلى المدرسة ثم عدت إلى المنزل.',
            'description' => 'يستخدم لبيان الترتيب الزمني بين الأحداث.',
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 15,
            'name' => 'ف',
            'english_name' => 'Then',
            'standalone' => false,
            'example' => 'درست فنجحت.',
            'description' => 'يستخدم لبيان التعقيب السريع أو التفسير.',
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 17,
            'name' => 'إلا',
            'english_name' => 'Except',
            'standalone' => false,
            'example' => 'هذا مثال لاستخدام الأداة.',
            'description' => 'هذا وصف للأداة المستخدمة.',
            
            
        ]);

        AllTool::create([
            'linking_tool_id' => 17,
            'name' => 'سوى',
            'english_name' => 'Except for',
            'standalone' => false,
            'example' => 'هنا مثال آخر لاستخدام الأداة.',
            'description' => 'وصف آخر للأداة.',
            
            
        ]);



    }
}
