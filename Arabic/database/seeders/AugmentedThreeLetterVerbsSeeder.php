<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AugmentedThreeLetterVerbsSeeder extends Seeder
{
    public function run()
    {
        DB::table('augmented_three_letter_verbs')->insert([
            [
                'root_id' => 1,
                'word_type_id' => 2,
                'addition_type' => 'زيادة همزة في أوله',
                'pattern' => 'أَفْعَلَ',
                'pattern_name' => 'اسم تفضيل',
                'example' => 'أَكْرَمَ',
                'notes' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'root_id' => 1,
                'word_type_id' => 2,
                'addition_type' => 'تضعيف عين الفعل',
                'pattern' => 'فَعَّلَ',
                'pattern_name' => '',
                'example' => 'كَسَّرَ',
                'notes' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'root_id' => 1,
                'word_type_id' => 2,
                'addition_type' => 'زيادة ألف بعد فاء الفعل',
                'pattern' => 'فَاعَلَ',
                'pattern_name' => 'اسم فاعل',
                'example' => 'قَاتَلَ',
                'notes' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'root_id' => 1,
                'word_type_id' => 2,
                'addition_type' => 'زيادة التاء والألف',
                'pattern' => 'تَفَاعَلَ',
                'pattern_name' => '',
                'example' => 'تَعَاوَنَ',
                'notes' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'root_id' => 1,
                'word_type_id' => 2,
                'addition_type' => 'زيادة الهمزة والنون',
                'pattern' => 'اِنْفَعَلَ',
                'pattern_name' => '',
                'example' => 'اِنْطَلَقَ',
                'notes' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'root_id' => 1,
                'word_type_id' => 2,
                'addition_type' => 'زيادة الألف والتاء والسين',
                'pattern' => 'اِسْتَفْعَلَ',
                'pattern_name' => '',
                'example' => 'اِسْتَخْرَجَ',
                'notes' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
