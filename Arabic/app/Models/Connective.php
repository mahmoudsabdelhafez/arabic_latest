<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connective extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'transliteration',
        'pronunciation',
        'meaning',
        'definition',
        'category_id',
        'syntactic_effect_id',
        'semantic_logical_effect_id',
        'morphological_form',
        'typical_nisbah',
        'primary_usage',
        'grammatical_function',
        'position',
        'connective_form',
        'is_classical',
        'notes',
        'status',
        'created_by',
        'updated_by',
    ];

    // Define Relationships
    public function category()
    {
        return $this->belongsTo(ConnectiveCategory::class, 'category_id');
    }

    public function syntacticEffect()
    {
        return $this->belongsTo(SyntacticEffect::class, 'syntactic_effect_id');
    }

    public function semanticLogicalEffect()
    {
        return $this->belongsTo(SemanticLogicalEffect::class, 'semantic_logical_effect_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
