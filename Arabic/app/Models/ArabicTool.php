<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArabicTool extends Model
{
    use HasFactory;

    protected $table = 'arabic_tools';

    protected $fillable = [
        'name',
    ];

    public $timestamps = true;

    public function arabicLetters()
    {
        return $this->belongsToMany(ArabicLetter::class, 'arabic_tools_leters_diacritics')
                    ->withPivot('usage_meaning', 'effect', 'example');
    }

    public function arabicDiacritics()
    {
        return $this->belongsToMany(ArabicDiacritic::class, 'arabic_tools_leters_diacritics')
                    ->withPivot('usage_meaning', 'effect', 'example');
    }
}