<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonStandardDeletion extends Model
{
    use HasFactory;

    protected $table = 'non_standard_deletion'; // Explicitly defining the table name

    protected $fillable = [
        'phenomenon',
        'deletion_type',
        'linguistic_reason',
        'example',
        'structure_effect',
        'degree_of_standardization',
        'deletion_reason',
        'is_deleted',
        'edit_by'
    ];

    /**
     * Relationship: The user who edited the record.
     */
    public function editedBy()
    {
        return $this->belongsTo(User::class, 'edit_by');
    }
}
