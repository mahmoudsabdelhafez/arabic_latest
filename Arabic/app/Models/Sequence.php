<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sequence extends Model
{
    use HasFactory;

     // Fillable attributes (columns from your sequences table)
     protected $fillable = ['sequence'];

     
}
