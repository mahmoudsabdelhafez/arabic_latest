<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArabicLetterAdjective extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'arabic_letter_id'];

    public function category()
    {
        return $this->belongsTo(NunSakinahAndTanween::class);
    }

    public function arabicLetter()
    {
        return $this->belongsTo(ArabicLetter::class);
    }
}
