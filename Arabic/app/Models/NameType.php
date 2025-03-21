<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NameType extends Model
{
    use HasFactory;

    protected $fillable = ['type_name'];

    public function functionalWords()
    {
        return $this->belongsToMany(FunctionalWord::class, 'word_type_mapping', 'type_id', 'word_id');
    }
}
