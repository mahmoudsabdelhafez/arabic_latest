<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phoneme extends Model
{
    use HasFactory;

    protected $fillable = [
        'arabic_letter_id',
        'ipa',
        'type',
        'place_of_articulation',
        'manner_of_articulation',
        'voicing',
        'sound_effects',
        'notes',
    ];

    // Relationship with ArabicLetter
    public function arabicLetter()
    {
        return $this->belongsTo(ArabicLetter::class, 'arabic_letter_id');
    }

    public function category()
    {
        return $this->belongsTo(PhonemeCategory::class, 'phoneme_category_id');
    }

    
}