<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondaryGrammaticalHarakat extends Model
{
    use HasFactory;


    protected $table = 'secondary_grammatical_harakat';

    protected $fillable = [
        'haraka',
        'state',
        'function',
        'example_sentence',
        'created_at',
        'updated_at',
        'is_deleted',
        'edit_by',
    ];
}
