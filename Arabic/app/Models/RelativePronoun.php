<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelativePronoun extends Model
{
    use HasFactory;

    protected $table = 'relative_pronouns'; // Explicitly defining the table name


    protected $fillable = [
        'name',
        'number',
        'gender',
        'example',
        'grammatical_analysis',
        'is_deleted',
        'edit_by'
    ];

    /**
     * Relationship: The user who edited the relative pronoun.
     */
    public function editedBy()
    {
        return $this->belongsTo(User::class, 'edit_by');
    }
}
