<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SyntacticEffect extends Model
{
    use HasFactory;

    protected $table = 'syntactic_effects'; 
    // الدلالات النحوية

    protected $fillable = [
        'applied_on',
        'result_case',
        'context_condition',
        'priority_order',
        'notes'
    ];
}
