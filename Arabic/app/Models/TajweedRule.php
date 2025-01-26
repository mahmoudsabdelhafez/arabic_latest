<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TajweedRule extends Model
{
    use HasFactory;

    protected $fillable = [
        'rule_name',
        'category_id',
        'description',
        'applies_to_letters',
        'applies_to_diacritics',
        'examples',
        'priority',
    ];



    public function category()
    {
        return $this->belongsTo(TajweedCategory::class);
    }

    // Relationship for letter_1
    public function letter1()
    {
        return $this->belongsToMany(ArabicLetter::class, 'tajweed_rules_letters', 'tajweed_rule_id', 'letter_1_id');
    }

    // Relationship for letter_2
    public function letter2()
    {
        return $this->belongsToMany(ArabicLetter::class, 'tajweed_rules_letters', 'tajweed_rule_id', 'letter_2_id');
    }
    /**
     * Define a many-to-many relationship with the Diacritic model.
     */
    public function diacritics()
    {
        return $this->belongsToMany(ArabicDiacritic::class, 'tajweed_rules_diacritics', 'tajweed_rule_id', 'diacritic_id');
    }


}
