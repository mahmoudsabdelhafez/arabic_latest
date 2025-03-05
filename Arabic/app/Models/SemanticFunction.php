<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemanticFunction extends Model
{
    use HasFactory;

    protected $table = 'semantic_functions';

    protected $fillable = [
        'phoneme_id',
        'letter',
        'meaning_transformation',
        'time_indication',
        'order_and_attention',
        'emphasis',
        'denial',
        'word_play',
        'eloquence_and_clarity',
        'emotional_impact',
        'examples',
    ];

    public function phoneme()
    {
        return $this->belongsTo(Phoneme::class);
    }
}
