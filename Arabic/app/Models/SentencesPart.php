<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SentencesPart extends Model
{
    use HasFactory;

    protected $fillable = [
        'sentence_id',
        'name',
        'description',
    ];

    /**
     * العلاقة مع جملة (Sentence).
     */
    public function sentence()
    {
        return $this->belongsTo(Sentence::class, 'sentence_id');
    }
}
