<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelativePronoun extends Model
{
    use HasFactory;

    protected $fillable = ['surface_form', 'gender', 'number', 'case', 'dialect_id', 'notes'];

    public function dialect()
    {
        return $this->belongsTo(Dialect::class);
    }
}
