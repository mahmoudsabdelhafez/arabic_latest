<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArabicWordTypeExample extends Model
{
    use HasFactory;

    protected $fillable = [
        'word_type_id', 
        'example_text'
    ];

    public function wordType()
    {
        return $this->belongsTo(WordType::class);
    }
}
