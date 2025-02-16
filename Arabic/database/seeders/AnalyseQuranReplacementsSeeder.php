<?php

namespace Database\Seeders;

use App\Models\AnalyseQuranReplacement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnalyseQuranReplacementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['original' => 'ْ', 'replacement' => '','next_string' => '', 'word_position' => 'any'], // ازالة السكون
            ['original' => 'ٰ', 'replacement' => 'ا','next_string' => '', 'word_position' => 'any'], // استبدال الالف الخنجرية بألف عادية
            ['original' => 'ىَ', 'replacement' => 'ا','next_string' => '', 'word_position' => 'any'], // استبدال الالف المقصورى التي فوقها الف خنجرية بألف عادية
            ['original' => 'ا', 'replacement' => 'ءَ','next_string' => 'ل', 'word_position' => 'first'], // استبدال الالف المتبوعة ب لام في بداية الجملة بهمزة نبرة
            ['original' => 'ا', 'replacement' => '','next_string' => 'ْل', 'word_position' => 'middle'], // حذف الالف المتبوعة بلام ساكنة في منتصف الجملة وابقاء اللام
            ['original' => 'ا', 'replacement' => '','next_string' => 'ل', 'word_position' => 'middle'], // حذف الالف المتبوعة بلام ساكنة في منتصف الجملة وابقاء اللام

            
           
        ];

        AnalyseQuranReplacement::insert($data);
    }
}
