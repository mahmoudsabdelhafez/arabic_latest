<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'english_name', 'tool_id', 'grammatical_function', 'semantic_function', 'example', 'description'];

    public function tool()
    {
        return $this->belongsTo(Tool::class);
    }
}
