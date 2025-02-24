<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordTypeMapping extends Model
{
    use HasFactory;

    protected $table = 'word_type_mapping';

    protected $fillable = ['word_id', 'type_id'];

    public function word()
    {
        return $this->belongsTo(FunctionalWord::class, 'word_id');
    }

    public function type()
    {
        return $this->belongsTo(NameType::class, 'type_id');
    }
}
