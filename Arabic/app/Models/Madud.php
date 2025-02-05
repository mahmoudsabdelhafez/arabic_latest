<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Madud extends Model
{
    use HasFactory;


    protected $table = 'maduds';  // The name of the table

    // Specify the fillable fields
    protected $fillable = [
        'definition',
        'description',
        'mad_letters',
        'mad_types',
        'mad_additions',
    ];


}
