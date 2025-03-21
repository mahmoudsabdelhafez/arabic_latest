<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suffix extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'meaning_usage', 
        'examples_from_quran'
    ];

    public function rootWords()
    {
        return $this->belongsToMany(RootWord::class, 'root_word_suffixes')
                    ->withTimestamps();
    }

    public function pronouns()
    {
        return $this->belongsToMany(Pronoun_before::class, 'pronoun_suffix', 'suffix_id', 'pronoun_id');
    }
    
}
