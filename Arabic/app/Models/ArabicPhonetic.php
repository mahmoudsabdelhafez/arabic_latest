<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArabicPhonetic extends Model
{
    use HasFactory;

    // Define the table name (optional, Laravel will auto-detect this)
    protected $table = 'arabic_phonetics';

    // Allow mass assignment for the arabic_letter and phonetic_representation fields
    protected $fillable = ['arabic_letter', 'phonetic_representation'];
}
