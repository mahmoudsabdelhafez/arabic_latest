<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AugmentedThreeLetterVerb extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'root_id', 'word_type_id', 'addition_type', 'pattern', 'pattern_name', 'example', 'notes','verb_type_id'
    ];

    public function root()
    {
        return $this->belongsTo(VerbConjugation::class, 'root_id');
    }

    public function wordType()
    {
        return $this->belongsTo(WordType::class, 'word_type_id');
    }

    public function phonemePositions()
    {
        return $this->hasMany(VerbPhonemePosition::class);
    }

    public function verbType()
    {
        return $this->belongsTo(VerbType::class, 'verb_type_id');
    }
}
