<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dialect extends Model
{
    use HasFactory;

    protected $fillable = ['dialect_name'];

    public function functionalWords()
    {
        return $this->hasMany(FunctionalWord::class);
    }

    public function relativePronouns()
    {
        return $this->hasMany(RelativePronoun::class);
    }
}
