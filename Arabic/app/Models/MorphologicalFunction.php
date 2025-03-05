<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MorphologicalFunction extends Model
{
    use HasFactory;

    protected $table = 'morphological_functions';

    protected $fillable = [
        'phoneme_id',
        'spelling_effect',
        'shape_with_vowels',
        'shape_with_previous_letter',
        'spelling_rules',
        'difference_with_uthmani',
        'dialectal_influence',
        'meaning_impact',
        'examples',
    ];

    public function phoneme()
    {
        return $this->belongsTo(Phoneme::class);
    }
}
