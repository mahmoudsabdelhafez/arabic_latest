<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhonemeRootEffect extends Model
{
    use HasFactory;

    protected $fillable = [
        'phoneme_id',
        'position_in_root',
        'root_examples',
        'effect_on_inflection',
        'morphological_changes',
        'illustrative_examples',
    ];

    public function phoneme() {
        return $this->belongsTo(Phoneme::class);
    }
}

