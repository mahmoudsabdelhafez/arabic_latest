<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{
    use HasFactory;

    protected $fillable = [
        'language_content_id',
        'name',
        'description',
    ];

    /**
     * العلاقة مع `LanguageContent`
     */
    public function languageContent()
    {
        return $this->belongsTo(LanguageContent::class, 'language_content_id');
    }

    /**
     * العلاقة مع `SentencePart`
     */
    public function sentenceParts()
    {
        return $this->hasMany(SentencesPart::class, 'sentence_id');
    }
}
