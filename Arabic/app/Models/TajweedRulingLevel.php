<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TajweedRulingLevel extends Model
{
    use HasFactory;

    protected $table = 'tajweed_ruling_levels';

    protected $fillable = [
        'level_name',
        'description',
    ];
    
}
