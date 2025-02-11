<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CausalReasoning extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'english_name', 'tool_id', 'syntactic_effects', 'semantic_logical_effects', 'example', 'description'];
    public function tool()
    {
        return $this->belongsTo(Linking_tool::class);
    }


    public function contextualConditions()
    {
        return $this->morphMany(ContextualCondition::class, 'tool');
    }

    public function toolsInformations()
    {
        return $this->morphMany(ToolsInformation::class, 'tool');
    }

    public function syntacticEffect()
    {
        return $this->belongsTo(SyntacticEffect::class, 'syntactic_effects');
    }

    public function semanticLogicalEffect()
    {
        return $this->belongsTo(SemanticLogicalEffect::class, 'semantic_logical_effects');
    }
}
