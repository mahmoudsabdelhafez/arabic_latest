<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    protected $fillable = ['word', 'unvowelword', 'nonormstem', 'root_id'];


    public function root()
    {
        // Each word belongs to one root
        return $this->belongsTo(Root::class);
    }

    
}
