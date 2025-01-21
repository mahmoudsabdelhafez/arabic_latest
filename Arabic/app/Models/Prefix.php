<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prefix extends Model
{
    use HasFactory;

     // Define the fillable attributes
     protected $fillable = [
        'form', 
        'meaning_usage', 
        'examples_from_quran'
    ];

    public function rootWords()
    {
        return $this->belongsToMany(RootWord::class, 'root_word_prefixes')
                    ->withTimestamps();
    }

    
}
