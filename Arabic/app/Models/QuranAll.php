<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuranAll extends Model
{
    use HasFactory;

    protected $table = 'quran_all'; // Define the table name

    protected $fillable = ['index','sura', 'sura_name', 'aya', 'text']; // Mass assignable fields
}
