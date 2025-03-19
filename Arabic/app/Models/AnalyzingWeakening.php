<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalyzingWeakening extends Model
{
    use HasFactory;
    protected $table = 'analyzing_weakening';
    protected $fillable = [
        'weakening_type',
        'condition',
        'original_word',
        'change_happened',
        'reason',
        'notes',
        'is_deleted',
        'edit_by', 
    ];
}

