<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phoneme extends Model
{
    use HasFactory;
    
    protected $table = 'new_phonemes';

    protected $fillable = [
        'arabic_letter_id',
        'ipa',
        'type',
        'place_of_articulation',
        'manner_of_articulation',
        'voicing',
        'sound_effects',
        'notes',
    ];

    // Relationship with ArabicLetter
    public function arabicLetter()
    {
        return $this->belongsTo(ArabicLetter::class, 'arabic_letter_id');
    }

    public function category()
    {
        return $this->belongsTo(PhonemeCategory::class, 'phoneme_category_id');
    }

    public function phonemeCharacteristic() {
        return $this->hasMany(PhonemeCharacteristic::class);
    }
    public function phonemeContextualFeature() {
        return $this->hasMany(PhonemeContextualFeature::class);
    }
    public function phonemeGrammaticalRole() {
        return $this->hasMany(PhonemeGrammaticalRole::class);
    }
    public function phonemeHarakat() {
        return $this->hasMany(PhonemeHarakat::class);
    }
    public function phonemeRootEffect() {
        return $this->hasMany(PhonemeRootEffect::class);
    }
    public function phonemeSemanticFeature() {
        return $this->hasMany(PhonemeSemanticFeature::class);
    }
    public function phonemeStructuralRole() {
        return $this->hasMany(PhonemeStructuralRole::class);
    }
    public function phonemeOrigin() {
        return $this->hasMany(PhonemeOrigin::class);
    }
    public function phonemeActivity() {
        return $this->hasMany(PhonemeActivity::class);
    }
    public function phonemeEmbedding() {
        return $this->hasMany(PhonemeEmbedding::class);
    }
    public function phonemeFunction() {
        return $this->hasMany(PhonemeFunction::class);
    }
    public function phonemeMorpheme() {
        return $this->hasMany(PhonemeMorpheme::class);
    }
    public function phonemePhoneticFeature() {
        return $this->hasMany(PhonemePhoneticFeature::class);
    }
    public function grammaticalFunction() {
        return $this->hasMany(GrammaticalFunction::class);
    }
    public function morphologicalFunction() {
        return $this->hasMany(MorphologicalFunction::class);
    }
    public function orthographicAnalysis() {
        return $this->hasMany(OrthographicAnalysis::class);
    }
    public function phoneticFunction() {
        return $this->hasMany(PhoneticFunction::class);
    }
    public function semanticFunction() {
        return $this->hasMany(SemanticFunction::class);
    }
    
}