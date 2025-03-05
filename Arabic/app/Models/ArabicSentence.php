<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArabicSentence extends Model
{
    use HasFactory;

     // Fillable attributes (columns from your sequences table)
     protected $fillable = ['sequence'];

     
}
