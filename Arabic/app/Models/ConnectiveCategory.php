<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConnectiveCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'arabic_name',
        'definition'
    ];

    /**
     * Get the connectives that belong to this category.
     */
    public function connectives()
    {
        return $this->hasMany(Connective::class, 'category_id');
}
}


