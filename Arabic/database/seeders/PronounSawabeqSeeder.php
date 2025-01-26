<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pronoun;
use App\Models\Sawabeq;

class PronounSawabeqSeeder extends Seeder
{
    public function run()
    {
        // الحصول على ضمير معين
        $pronoun = Pronoun::find(1);

        // الحصول على سابقة معينة
        $sawabeq = Sawabeq::find(1);

        // إضافة العلاقة بين الضمير والسابقة
        $pronoun->sawabeqs()->attach($sawabeq->id);
    }
}