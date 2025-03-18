<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HarakatFunction extends Model
{
    use HasFactory;

    protected $fillable = [
        'haraka_id',
        'grammatical_function',
        'morphological_function',
        'is_deletes',
        'edit_by'
    ];

    // علاقة بـ Harakat
    public function haraka()
    {
        return $this->belongsTo(Harakat::class);
    }

    // علاقة بـ HarakatFunctionDetail
    public function details()
    {
        return $this->hasMany(HarakatFunctionDetail::class);
    }

    // علاقة بالمستخدم الذي عدّل السجل
    public function editor()
    {
        return $this->belongsTo(User::class, 'edit_by');
    }
}
