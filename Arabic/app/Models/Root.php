<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Root extends Model
{
    use HasFactory;


    protected $fillable = ['root'];


    public function words()
    {
        // One root can have many words
        return $this->hasMany(Word::class);
    }

}
