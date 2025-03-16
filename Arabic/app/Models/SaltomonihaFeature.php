<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaltomonihaFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'phoneme_id',
        'letter',
        'الحرف',
        'feature_type',
        'نوع الوظيفة اللغوية',
        'effect',
        'التأثير اللغوي',
        'example',
        'أمثلة',
        'notes',
        'ملاحظات',
        'attachment_type',
        'نوع الاتصال بالفعل أو الاسم',
        'grammatical_f'
    ];

    public function phoneme()
    {
        return $this->belongsTo(Phoneme::class);
    }
}
