<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordThreeLetterTest extends Model
{
    use HasFactory;

    protected $table = 'word_three_letter_with_conditions_adjectives'; // Define the table name
    protected $fillable = ['word'];
}
