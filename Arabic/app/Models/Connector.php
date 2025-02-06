<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connector extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'english_name', 'tool_id', 'grammatical_function', 'semantic_function', 'example', 'description'];

    public function tool()
    {
        return $this->belongsTo(Linking_tool::class);
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
