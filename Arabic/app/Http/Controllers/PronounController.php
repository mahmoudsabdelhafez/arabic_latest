<?php

use App\Models\Pronoun;

// استعلام لاستعادة الضمير "أنا" مع السوابق المرتبطة حيث type = 'مضارع'
$pronoun = Pronoun::with(['sawabeqs' => function ($query) {
    $query->where('type', 'مضارع');
}])->where('name', 'أنا')->first();

// عرض النتائج
if ($pronoun) {
    foreach ($pronoun->sawabeqs as $sawabeq) {
        echo $sawabeq->name; // افترض أن لديك عمود name في جدول السوابق
    }
} else {
    echo "الضمير 'أنا' غير موجود.";
}