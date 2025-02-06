<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linking_tool extends Model
{
    use HasFactory;

    protected $fillable = ['name','arabic_name'];

    public function connectors()
    {
        return $this->hasMany(Connector::class);
    }

    public function conditionals()
    {
        return $this->hasMany(Conditional::class);
    }

    public function details()
    {
        return $this->hasMany(Detail::class);
    }

    public function exceptions()
    {
        return $this->hasMany(Exception::class);
    }

    public function explanations()
    {
        return $this->hasMany(Explanation::class);
    }

    public function negatives()
    {
        return $this->hasMany(Negative::class);
    }

    public function prepositions()
    {
        return $this->hasMany(Preposition::class);
    }
}
