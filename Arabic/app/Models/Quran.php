<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quran extends Model
{
    use HasFactory;

    protected $table = 'quran_uthmani_min'; // Define the table name

    protected $fillable = ['index','sura', 'sura_name', 'aya', 'text']; // Mass assignable fields
}
