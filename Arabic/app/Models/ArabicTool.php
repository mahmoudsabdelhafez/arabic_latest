<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArabicTool extends Model
{
    use HasFactory;

    protected $table = 'arabic_tools';

    protected $fillable = [
        'name',
    ];

    public $timestamps = true;

    public function arabicLetters()
    {
        return $this->belongsToMany(ArabicLetter::class, 'arabic_tool_letter', 'arabic_tool_id', 'arabic_letter_id')->withPivot('effect','note')
        ->withTimestamps();
    }
}
