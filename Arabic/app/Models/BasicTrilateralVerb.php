<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicTrilateralVerb extends Model
{
    use HasFactory;

    protected $table = 'basic_trilateral_verbs';

    // Define the fields that are mass assignable
    protected $fillable = [
        'pattern',
        'past_tense',
        'present_tense',
        'notes',
        'syntactic_analysis',
        'example_sentence',
        'is_deleted',
        'edit_by'
    ];

    public function editor()
    {
        return $this->belongsTo(User::class, 'edit_by');
    }
}
