<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'path','phoneme_category_id'];

    public function phonemeCategory()
    {
        return $this->belongsTo(PhonemeCategory::class);
    }
}
