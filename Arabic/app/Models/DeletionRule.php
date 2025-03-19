<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeletionRule extends Model
{
    use HasFactory;

    protected $table = 'deletion_rules'; // Explicitly defining the table name

    protected $fillable = [
        'case_type',
        'conditions',
        'examples',
        'explanation',
        'notes',
        'deletion_reason',
        'is_deleted',
        'edit_by'
    ];

    /**
     * Relationship: The user who edited the deletion rule.
     */
    public function editedBy()
    {
        return $this->belongsTo(User::class, 'edit_by');
    }
}
