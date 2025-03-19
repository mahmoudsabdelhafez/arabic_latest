<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemonstrativePronoun extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'example',
        'gender',
        'number_classification',
        'distance',
        'grammatical_status',
        'semantic_analysis',
        'contextual_analysis',
        'created_at',
        'updated_at',
        'is_deleted',
        'edit_by',
    ];
}
