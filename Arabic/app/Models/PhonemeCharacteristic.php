<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhonemeCharacteristic extends Model
{
    use HasFactory;

    protected $fillable = [
        'phoneme_id',
        'position',
        'place_of_articulation',
        'manner_of_articulation',
        'voiced',
        'emphasis',
        'duration',
        'pitch',
        'consonant_or_vowel',
    ];

    public function phoneme() {
        return $this->belongsTo(Phoneme::class);
    }
}

