<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArabicDiacritic extends Model
{
    use HasFactory;

      // Define the table name (optional, Laravel will auto-detect this)
      protected $table = 'arabic_diacritics';

      // Allow mass assignment for the diacritic and unicode_value fields
      protected $fillable = ['diacritic', 'unicode_value'];


      public function tajweedRules()
      {
          return $this->belongsToMany(TajweedRule::class, 'tajweed_rules_diacritics', 'diacritic_id', 'tajweed_rule_id')
                      ->withTimestamps();
      }

      public function arabicLetters()
      {
          return $this->belongsToMany(ArabicLetter::class)
                      ->withPivot('has_meaning', 'nots','is_preposition','used')
                      ->withTimestamps();
      }

      

      
}