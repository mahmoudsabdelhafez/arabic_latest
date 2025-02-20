<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhonemeContextualFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'phoneme_id',
        'harakat_id',
        'position',
        'contextual_effect',
        'phonetic_change',
        'semantic_change',
        'examples',
    ];

    public function phoneme() {
        return $this->belongsTo(Phoneme::class);
    }

    public function harakat() {
        return $this->belongsTo(ArabicDiacritic::class);
    }
}

