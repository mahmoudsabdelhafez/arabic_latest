<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeekingRefuge extends Model
{
    use HasFactory;
    protected $table = 'seeking_refuges';

    protected $fillable = [
        'formula',
        'ruling',
        'cases',
        'note',
    ];
}
