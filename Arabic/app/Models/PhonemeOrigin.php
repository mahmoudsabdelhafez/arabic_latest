<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhonemeOrigin extends Model
{
    use HasFactory;

    protected $fillable = [
        'phoneme_id',
        'function',
        'effect_on_word',
        'examples',
        'explanation',
    ];

    public function phoneme() {
        return $this->belongsTo(Phoneme::class);
    }

}

