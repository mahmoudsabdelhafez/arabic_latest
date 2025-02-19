<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhonemeMorpheme extends Model
{
    use HasFactory;

    protected $fillable = [
        'phoneme_id',
        'harakat_id',
        'structural_entity',
        'formative_entity',
        'morpheme_type',
        'example_word',
        'example_explanation',
    ];

    public function phoneme() {
        return $this->belongsTo(Phoneme::class);
    }

    public function harakat() {
        return $this->belongsTo(ArabicDiacritic::class);
    }

}
