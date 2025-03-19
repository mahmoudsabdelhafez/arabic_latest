<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrammaticalHarakat extends Model
{
    use HasFactory;

    protected $table = 'grammatical_harakat';

    protected $fillable = [
        'haraka',
        'position',
        'function',
        'example_sentence',
        'created_at',
        'updated_at',
        'is_deleted',
        'edit_by',
    ];
}
