<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class VerbVerbAdjective extends Pivot
{
    use HasFactory;

    // If you want to add extra fields to the pivot table, you can define them here.
    protected $fillable = ['verb_id', 'verb_adjective_id'];
}
