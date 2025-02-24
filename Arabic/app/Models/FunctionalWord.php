<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FunctionalWord extends Model
{
    use HasFactory;

    protected $fillable = [
        'surface_form', 'root', 'domain_id', 'is_relative', 'is_interrogative',
        'is_conditional', 'is_fully_declinable', 'is_partially_declinable', 
        'dialect_id', 'notes'
    ];

    public function dialect()
    {
        return $this->belongsTo(Dialect::class);
    }

    public function domain()
    {
        return $this->belongsTo(SemanticDomain::class);
    }

    public function types()
    {
        return $this->belongsToMany(NameType::class, 'word_type_mapping', 'word_id', 'type_id');
    }
}
