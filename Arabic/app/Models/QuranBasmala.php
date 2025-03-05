<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuranBasmala extends Model
{
    use HasFactory;


    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'formula',
        'placement',
        'forms_of_bismillah',
    ];


}
