<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArabicTable extends Model
{
    use HasFactory;

    // Specify the table name (optional if the table name follows Laravel's naming convention)
    protected $table = 'arabic_tables';

    // Define the fillable columns (these are the fields that can be mass-assigned)
    protected $fillable = [
        'word_type_id',
        'name',
        'arabic_name',
    ];

    // Define the relationship with the WordType model (assuming a "WordType" model exists)
    public function wordType()
    {
        return $this->belongsTo(WordType::class);
    }
}
