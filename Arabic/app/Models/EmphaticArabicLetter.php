<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmphaticArabicLetter extends Model
{
    use HasFactory;

    // Define the table name (optional, Laravel will auto-detect this)
    protected $table = 'emphatic_arabic_letters';

    // Allow mass assignment for the letter, phonetic_representation, and is_emphatic fields
    protected $fillable = ['letter', 'phonetic_representation', 'is_emphatic'];
}
