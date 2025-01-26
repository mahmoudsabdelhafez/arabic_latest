<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tajweed extends Model
{
    use HasFactory;

    protected $fillable = [
        'rule_name',
        'description',
        'example_ayah',
        'expression',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(TajweedCategory::class, 'category_id');
    }
}
