<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrthographicAnalysis extends Model
{
    use HasFactory;

    protected $table = 'orthographic_analyses';

    protected $fillable = [
        'phoneme_id',
        'category',
        'description',
        'example',
        'notes',
    ];

    public function phoneme()
    {
        return $this->belongsTo(Phoneme::class);
    }
}
