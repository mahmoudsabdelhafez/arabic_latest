<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suffix extends Model
{
    use HasFactory;

    protected $fillable = [
        'form', 
        'meaning_usage', 
        'examples_from_quran'
    ];

    public function rootWords()
    {
        return $this->belongsToMany(RootWord::class, 'root_word_suffixes')
                    ->withTimestamps();
    }
    
}
