<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerbPhonemePosition extends Model
{
    use HasFactory;

    protected $table = 'verb_phoneme_positions';

    protected $fillable = [
        'augmented_three_letter_verb_id',
        'phoneme_activity_id',
        'position',
    ];

    /**
     * Relationship with VerbConjugation
     */
    public function augmentedThreeLetterVerb()
    {
        return $this->belongsTo(AugmentedThreeLetterVerb::class);
    }

    /**
     * Relationship with PhonemeActivity
     */
    public function phonemeActivity()
    {
        return $this->belongsTo(PhonemeActivity::class);
    }
}
