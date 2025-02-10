<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_name', 
        'description'
    ];

    public function examples()
    {
        return $this->hasMany(Example::class);
    }
}
