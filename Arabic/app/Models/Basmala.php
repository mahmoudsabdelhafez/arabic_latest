<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basmala extends Model
{
    use HasFactory;

    protected $table = 'basmalas';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'formula',
        'placement',
        'forms_of_bismillah',
    ];


}
