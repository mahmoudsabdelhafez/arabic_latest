<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RootWord extends Model
{
    use HasFactory;

    protected $fillable = ['root'];


     // Many-to-many relationship with Prefix
     public function prefixes()
     {
         return $this->belongsToMany(Prefix::class, 'root_word_prefixes')
                     ->withTimestamps(); // Automatically handles created_at and updated_at timestamps
     }
 
     // Many-to-many relationship with Suffix
     public function suffixes()
     {
         return $this->belongsToMany(Suffix::class, 'root_word_suffixes')
                     ->withTimestamps();
     }

}
