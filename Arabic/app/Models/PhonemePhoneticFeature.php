<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhonemePhoneticFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'phoneme_id',
        'phonetic_category',
        'voicing',
        'tenseness',
        'elevation',
        'idgham',
        'izhar',
        'ikhfa',
        'phonological_rules',
        'example_word',
        'rule_explanation',
        'related_dialect',
    ];

    public function phoneme() {
        return $this->belongsTo(Phoneme::class);
    }
}

