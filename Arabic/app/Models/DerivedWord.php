<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DerivedWord extends Model
{
    use HasFactory;

    protected $table = 'derived_words';

    protected $fillable = [
        'root_id',
        'type',
        'pattern',
        'example',
        'created_at',
        'updated_at',
        'is_deleted',
        'edited_by',
    ];

    public function verbConjugation()
    {
        return $this->belongsTo(VerbConjugation::class, 'root_id');
    }
}
