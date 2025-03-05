<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamePronoun extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'name_pronouns';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'definition',
        'type',
        'person',
        'number',
        'gender',
        'position',
        'parsing_id',
        'syntactic_effects_id',
        'semantic_logical_effects_id',
        'attached_type_id',
        'estimated_for_hidden',
    ];

    /**
     * Get the parsing record associated with the pronoun.
     */
    public function parsing()
    {
        return $this->belongsTo(Parsing::class);
    }

    /**
     * Get the syntactic effects record associated with the pronoun.
     */
    public function syntacticEffects()
    {
        return $this->belongsTo(SyntacticEffect::class, 'syntactic_effects_id');
    }

    /**
     * Get the semantic and logical effects record associated with the pronoun.
     */
    public function semanticLogicalEffects()
    {
        return $this->belongsTo(SemanticLogicalEffect::class, 'semantic_logical_effects_id');
    }

    /**
     * Get the attached type record associated with the pronoun.
     */
    public function attachedType()
    {
        return $this->belongsTo(AttachedType::class);
    }
}