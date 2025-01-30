<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TajweedCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];


    public function rules()
    {
        return $this->hasMany(TajweedRule::class);
    }


    public function tajweeds()
    {
        return $this->hasMany(Tajweed::class, 'category_id');
    }


    public function rulings()
{
    return $this->hasMany(NunSakinahAndTanween::class);
}


}
