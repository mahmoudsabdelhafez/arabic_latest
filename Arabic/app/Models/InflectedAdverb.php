<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InflectedAdverb extends Model
{
    use HasFactory;

    // Define the table name if it's not the plural form of the model name
    protected $table = 'inflected_adverbs';


    // Define the fillable attributes to allow mass assignment
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
