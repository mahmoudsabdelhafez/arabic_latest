<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemanticLogicalEffect extends Model
{
    use HasFactory;

    // الدلالات المنطقية 

    protected $table = 'semantic_logical_effects';

    protected $fillable = [
        'typical_relation_1',
        'typical_relation_2',
        'semantic_roles',
        'conditions',
        'notes'
    ];


}
