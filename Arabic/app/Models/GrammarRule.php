<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrammarRule extends Model
{
    use HasFactory;

    protected $fillable = [
        'rule_name',
        'description'
    ];
}
