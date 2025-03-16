<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Root extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roots';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'root',
        'type_id',
        'sensual_moral_type_id',
        'example',
        'notes',
    ];

    /**
     * Get the verb type associated with the root.
     */
    public function type()
    {
        return $this->belongsTo(VerbType::class, 'type_id');
    }

    /**
     * Get the sensual/moral type associated with the root.
     */
    // public function sensualMoralType()
    // {
    //     return $this->belongsTo(SensualMoralType::class, 'sensual_moral_type_id');
    // }
}
