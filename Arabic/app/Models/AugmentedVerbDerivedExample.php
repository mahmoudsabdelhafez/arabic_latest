<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AugmentedVerbDerivedExample extends Model
{
    use HasFactory;

    protected $fillable = [
        'root',
        'pattern_id',
        'example',
        'verbal_noun',
        'mimic_noun',
        'industrial_noun',
        'active_participle',
        'passive_participle',
        'time_noun',
        'place_noun',
        'instrument_noun',
        'form_noun',
        'preference_noun',
        'verbal_noun2',
        'adverb',
    ];

    public function pattern()
    {
        return $this->belongsTo(AugmentedThreeLetterVerb::class, 'pattern_id');
    }
}
