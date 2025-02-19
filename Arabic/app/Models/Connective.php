<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connective extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'transliteration',
        'pronunciation',
        'meaning',
        'definition',
        'category_id',
        'grammatical_function',
        'position',
        'connective_form',
        'is_classical',
        'notes',
        'status',
        'created_by',
        'updated_by'
    ];

    /**
     * Get the category associated with the connective.
     */
    public function category()
    {
        return $this->belongsTo(ConnectiveCategory::class);
    }

    /**
     * Get the user who created the connective.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated the connective.
     */
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
}
}