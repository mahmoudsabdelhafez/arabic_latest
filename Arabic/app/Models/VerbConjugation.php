<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerbConjugation extends Model
{
    use HasFactory;


    protected $fillable = ['root'];


    public function words()
    {
        // One root can have many words
        return $this->hasMany(Word::class);
    }

    public function phonemePositions()
    {
        return $this->hasMany(VerbPhonemePosition::class);
    }
}
