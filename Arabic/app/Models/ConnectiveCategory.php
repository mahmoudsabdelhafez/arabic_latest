<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConnectiveCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'arabic_name',
        'definition',
    ];

    public function connectives()
    {
        return $this->hasMany(Connective::class, 'category_id');
    }
}
