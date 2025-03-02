<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parsing extends Model
{
    use HasFactory;
    // protected $table = 'parsing';
    protected $fillable = [
        'status',
        'rule',
        'example',
    ];
}