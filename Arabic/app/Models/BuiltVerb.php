<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuiltVerb extends Model
{
    use HasFactory;

    protected $fillable = ['tense', 'type', 'description', 'example'];
}
