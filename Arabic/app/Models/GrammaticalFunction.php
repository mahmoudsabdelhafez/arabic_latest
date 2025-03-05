<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrammaticalFunction extends Model
{
    use HasFactory;

    protected $table = 'grammatical_functions';

    protected $fillable = [
        'phoneme_id',
        'category',
        'example',
        'notes',
        'description',
    ];

    public function phoneme()
    {
        return $this->belongsTo(Phoneme::class);
    }
}
