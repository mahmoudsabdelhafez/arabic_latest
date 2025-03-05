<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContextualCondition extends Model
{
    use HasFactory;

    protected $table = 'connective_contextual_conditions';

    protected $fillable = [
        'linking_tool_id',
        'tool_id',
        'tool_type',
        'linguistic_condition',
        'syntactic_context',
        'semantic_context',
        'outcome_effect',
        'example_text',
        'syntactic_analysis',
        'semantic_analysis',
        'source_reference',
        'notes'
    ];

    public function linkingTool()
    {
        return $this->belongsTo(Linking_tool::class);
    }

    public function tool()
    {
        return $this->morphTo();
    }
}
