<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    use HasFactory;
    protected $table = 'connective_classifications';

    protected $fillable = [
        'name',
        'subtype',
        'linking_tool_id',
        'subtool_name',
        'example_sentence',
        'description',
        'typical_nisbah',
        'logical_effect',
        'semantic_effect',
    ];

    public function linkingTool()
    {
        return $this->belongsTo(Linking_tool::class);
    }
}
