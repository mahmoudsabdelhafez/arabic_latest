<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TajweedDefinition extends Model
{
    use HasFactory;

    protected $table = 'tajweed_definitions';

    protected $fillable = [
        'definition',
        'evidence_from_quran',
        'linguistic_meaning',
        'terminological_meaning',
        'ruling',
        'virtue',
        'purpose',
        'method_of_learning_tajweed',
    ];

    
}
