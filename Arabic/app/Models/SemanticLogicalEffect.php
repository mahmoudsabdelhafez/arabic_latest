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
        'typical_relation',
        'nisbah_type',
        'semantic_roles',
        'conditions',
        'notes'
    ];


}
