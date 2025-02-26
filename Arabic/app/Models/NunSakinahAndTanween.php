<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NunSakinahAndTanween extends Model
{
    use HasFactory;

    protected $table = 'tajweed_nun_sakinah_and_tanween_rules';

    // Define the fillable attributes
    protected $fillable = [
        'category_id',
        'ruling_name',
        'ruling_description',
        'ruling_letters',
        'pronunciation_method',
        'example',
        'note',
    ];


     // Define the relationship to the TajweedCategory model
     public function category()
     {
         return $this->belongsTo(TajweedCategory::class, 'category_id');
     }
}
