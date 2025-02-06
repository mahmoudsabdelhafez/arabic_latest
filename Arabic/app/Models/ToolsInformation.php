<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolsInformation extends Model
{
    use HasFactory;


    protected $table = 'tools_informations'; // Make sure this matches the table in your database


    protected $fillable = [
        'linking_tool_id',
        'tool_id',
        'tool_name',
        'short_label',
        'classification_id',
        'morphological_form',
        'typical_nisbah',
        'primary_usage',
        'secondary_usages',
        'notes',
        'example_ayah',
        'example_explanation',
        'syntactic_analysis',
        'semantic_analysis',
    ];


    public function linkingTool()
    {
        return $this->belongsTo(Linking_tool::class, 'linking_tool_id');
    }

    /**
     * Relationship with Classification model
     */
    public function classification()
    {
        return $this->belongsTo(Classification::class, 'classification_id');
    }

    public function tool()
    {
        return $this->morphTo();
    }
}
