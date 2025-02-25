<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolName extends Model
{
    use HasFactory;

    // Specify the table name (optional if the table name follows Laravel's naming convention)
    protected $table = 'tool_names';

    // Define the fillable columns (these are the fields that can be mass-assigned)
    protected $fillable = [
        'name',
        'connective_category_id',
        'arabic_table_id',
    ];

    // Define the relationships if needed (uncomment if applicable)
    public function connective()
    {
        return $this->belongsTo(Connective::class);
    }

    public function arabicTable()
    {
        return $this->belongsTo(ArabicTable::class);
    }
}
