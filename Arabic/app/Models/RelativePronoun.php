<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelativePronoun extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'example', 'gender', 'number_classification', 'distance', 'grammatical_status', 'semantic_analysis','contextual_analysis'];

    // public function dialect()
    // {
    //     return $this->belongsTo(Dialect::class);
    // }
}
