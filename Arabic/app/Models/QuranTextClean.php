<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuranTextClean extends Model
{
    use HasFactory;

    protected $table = 'quran_text_clean'; 

    protected $primaryKey = 'index'; 

    public $timestamps = false;

    protected $fillable = [
        'index',
        'sura_name',
        'sura',
        'aya',
        'text',
    ];

   
}
