<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Synchronization extends Model
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
}
