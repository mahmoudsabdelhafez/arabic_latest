<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuiltInAdverb extends Model
{
    use HasFactory;

    protected $table = 'built_in_adverbs';

    protected $fillable = [
        'adverb_type',
        'adverb',
        'example_sentence',
        'syntactic_analysis',
        'semantic_analysis',
        'created_at',
        'updated_at',
        'is_deleted',
        'edit_by',
    ];
}
