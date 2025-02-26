<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArabicGrammarRule extends Model
{
    use HasFactory;

    protected $fillable = [
        'rule_name',
        'description'
    ];
}
