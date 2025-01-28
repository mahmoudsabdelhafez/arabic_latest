<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhonemeCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];  // Allow mass assignment for the 'name' field

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function phonemes()
    {
        return $this->hasMany(Phoneme::class, 'phoneme_category_id');
    }

}
