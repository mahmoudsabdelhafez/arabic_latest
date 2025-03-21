<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArabicLetter extends Model
{
    use HasFactory;

    protected $fillable = ['letter', 'unicode_value'];



   // Relationship for letter_1
   public function rulesAsLetter1()
   {
       return $this->belongsToMany(TajweedRule::class, 'tajweed_rules_letters', 'letter_1_id', 'tajweed_rule_id');
   }

   // Relationship for letter_2
   public function rulesAsLetter2()
   {
       return $this->belongsToMany(TajweedRule::class, 'tajweed_rules_letters', 'letter_2_id', 'tajweed_rule_id');
   }

   public function arabicDiacritics()
{
    return $this->belongsToMany(ArabicDiacritic::class, 'deleted_arabic_tools_leters_diacritics')
                ->withPivot('usage_meaning', 'effect', 'example');
}

   public function arabicTools()
   {
       return $this->belongsToMany(ArabicTool::class, 'deleted_arabic_tools_leters_diacritics')
                ->withPivot('usage_meaning', 'effect', 'example')
       ->withTimestamps();
   }
}
