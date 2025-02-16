<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableType extends Model
{
    use HasFactory;

    // Define the table name (optional, Laravel will infer it)
    protected $table = 'table_types';

    // Mass assignable attributes
    protected $fillable = ['word_type_id', 'table_name'];

    /**
     * Define the relationship with the WordType model
     */
    public function wordType()
    {
        return $this->belongsTo(WordType::class);
    }
}
