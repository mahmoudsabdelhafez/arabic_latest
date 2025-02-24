<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemanticDomain extends Model
{
    use HasFactory;

    protected $fillable = ['domain_name'];

    public function functionalWords()
    {
        return $this->hasMany(FunctionalWord::class);
    }
}
