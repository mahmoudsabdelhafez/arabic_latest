<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArabicBeautyOfLanguage extends Model
{
    use HasFactory;

    protected $fillable = [
        'aspect_name',
        'description'
    ];
}
