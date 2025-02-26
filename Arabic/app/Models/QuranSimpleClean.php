<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuranSimpleClean extends Model
{
    use HasFactory;

    protected $table = 'quran_simple_clean'; 

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
