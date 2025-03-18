<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HarakatFunctionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'harakat_function_id',
        'function_type',
        'function',
        'description',
        'example',
        'edit_by'
    ];

    // علاقة بـ HarakatFunction
    public function harakatFunction()
    {
        return $this->belongsTo(HarakatFunction::class);
    }

    // علاقة بالمستخدم الذي عدّل السجل
    public function editor()
    {
        return $this->belongsTo(User::class, 'edit_by');
    }
}
