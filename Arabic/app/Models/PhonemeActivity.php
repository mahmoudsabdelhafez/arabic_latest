<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhonemeActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'phoneme_id',
        'type',
        'is_active',
        'grammatical_effect',
        'examples',
    ];

    public function phoneme() {
        return $this->belongsTo(Phoneme::class);
    }

}

