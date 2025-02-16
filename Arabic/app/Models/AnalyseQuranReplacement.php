<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalyseQuranReplacement extends Model
{
    use HasFactory;

    protected $table = 'analyse_quran_replacements';

    protected $fillable = [
        'original',
        'replacement',
        'word_position',
        'next_string',
    ];


}
