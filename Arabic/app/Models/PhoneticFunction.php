<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneticFunction extends Model
{
    use HasFactory;

    protected $table = 'phonetic_functions';

    protected $fillable = [
        'phoneme_id',
        'category',
        'description',
        'examples',
        'notes',
    ];

    public function phoneme()
    {
        return $this->belongsTo(Phoneme::class);
    }
}
