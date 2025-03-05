<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sawabeq extends Model
{
    use HasFactory;

    // العلاقة مع جدول الضمائر
    public function pronouns()
    {
        return $this->belongsToMany(Pronoun_before::class, 'pronoun_sawabeq', 'sawabeq_id', 'pronoun_id');
    }
}