<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RootType extends Model
{
    use HasFactory;

    protected $fillable = ['type_name', 'description', 'parent_id', 'table_name'];


    // Dynamic relation to correct table
    public function relatedTable()
    {
        if ($this->table_name === 'verb_types') {
            return $this->hasMany(VerbType::class, 'word_type_id');
        } elseif ($this->table_name === 'name_types') {
            return $this->hasMany(NameType::class, 'word_type_id');
        } elseif ($this->table_name === 'letter_types') {
            return $this->hasMany(LetterType::class, 'word_type_id');
        }
        return null;
    }

    
    
    public function tableTypes()
    {
        return $this->hasMany(TableType::class);
    }

}
