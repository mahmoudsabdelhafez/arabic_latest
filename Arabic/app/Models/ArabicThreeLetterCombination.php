<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArabicThreeLetterCombination extends Model
{
    use HasFactory;

    // Define the table name (optional if Laravel auto-detects it)
    protected $table = 'arabic_three_letter_combinations';

    // Specify the fields that are mass assignable
    protected $fillable = ['combination'];
}
