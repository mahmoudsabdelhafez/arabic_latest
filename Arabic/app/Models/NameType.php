<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NameType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'arabic_name', 'description', 'word_type_id'];

    public function wordType()
    {
        return $this->belongsTo(WordType::class, 'word_type_id');
    }
}

class LetterType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'arabic_name', 'description', 'word_type_id'];

    public function wordType()
    {
        return $this->belongsTo(WordType::class, 'word_type_id');
    }
}
