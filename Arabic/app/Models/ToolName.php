<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ToolName extends Model
{
    use HasFactory;

    // Specify the table name (optional if the table name follows Laravel's naming convention)
    protected $table = 'tool_names';

    // Define the fillable columns (these are the fields that can be mass-assigned)
    protected $fillable = [
        'name',
        'connective_id',
        'connective_form',
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

    public function getAdditionalDataAttribute()
    {
        if ($this->connective_id === null && $this->arabic_table_id !== null) {
            $tableName = ArabicTable::where('id', $this->arabic_table_id)->value('table_name');
            return $tableName ? DB::table($tableName)->get() : [];
        }
        return [];
    }
}
