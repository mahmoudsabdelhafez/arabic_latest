<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Arabic;

class PhonemeFunction extends Model
{
    use HasFactory;

    protected $fillable = [
        'phoneme_id',
        'harakat_id',
        'position',
        'grammatical_function',
        'morphological_effect',
        'semantic_effect',
        'examples',
    ];

    public function phoneme() {
        return $this->belongsTo(Phoneme::class);
    }

    public function harakat() {
        return $this->belongsTo(ArabicDiacritic::class);
    }
}

