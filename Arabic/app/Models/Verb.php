<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verb extends Model
{
    use HasFactory;

    protected $fillable = [
        'verb',
        'type_id',
        'has_block',
        'has_place',
        'has_tool_name',
        'perception'
    ];

    /**
     * العلاقة مع نوع الفعل (VerbType)
     */
    public function type()
    {
        return $this->belongsTo(VerbType::class, 'type_id');
    }
}
