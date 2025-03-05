<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sawabeq;
use App\Models\Suffix;

class Pronoun_before extends Model
{
    use HasFactory;
    protected $table = 'pronouns'; // Define the table name

    // protected $fillable = ['pronoun'];

    // العلاقة مع جدول السوابق
    public function sawabeqs()
    {
        return $this->belongsToMany(Sawabeq::class, 'pronoun_sawabeq', 'pronoun_id', 'sawabeq_id');
    }
  
    // العلاقة مع جدول اللواحق
    public function suffixes()
    {
        return $this->belongsToMany(Suffix::class, 'pronoun_suffix', 'pronoun_id', 'suffix_id');
    }
}