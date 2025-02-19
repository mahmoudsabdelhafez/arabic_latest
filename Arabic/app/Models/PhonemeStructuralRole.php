<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhonemeStructuralRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'phoneme_id',
        'harakat_id',
        'type',
        'writing_form',
        'pronunciation_rule',
        'morphological_effect',
        'examples',
    ];

    public function phoneme() {
        return $this->belongsTo(Phoneme::class);
    }

    public function harakat() {
        return $this->belongsTo(ArabicDiacritic::class);
    }
}

