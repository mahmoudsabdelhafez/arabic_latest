<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verb extends Model
{
    use HasFactory;

    protected $fillable = ['verb'];

    // Relationship with VerbAdjective model
    public function verbAdjectives()
    {
        return $this->belongsToMany(VerbAdjective::class, 'verb_verb_adjective', 'verb_id', 'verb_adjective_id');
    }
}
