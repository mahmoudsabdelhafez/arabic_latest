<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerbAdjective extends Model
{
    use HasFactory;

    protected $fillable = ['arabic_name', 'description', 'example', 'notes'];

    // Relationship with Verb model
    public function verbs()
    {
        return $this->belongsToMany(Verb::class, 'verb_verb_adjective', 'verb_adjective_id', 'verb_id');
    }
}
