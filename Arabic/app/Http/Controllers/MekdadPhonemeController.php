<?php

namespace App\Http\Controllers;

use App\Models\PhonemeSyllabicChange;
use App\Models\PhonemeSubstitution;
use App\Models\PhonemeStructuralRole;
use App\Models\PhonemeSemanticFeature;
use App\Models\PhonemeRootEffect;
use App\Models\PhonemeReplacement;
use App\Models\PhonemePhoneticFeature;
use App\Models\PhonemeOrigin;
use App\Models\PhonemeNature;
use App\Models\PhonemeMorpheme;
use App\Models\PhonemeHarakat;
use App\Models\PhonemeGrammaticalRole;
use App\Models\PhonemeFunction;
use App\Models\PhonemeEmbedding;
use App\Models\PhonemeDeletion;
use App\Models\PhonemeContextualFeature;
use App\Models\PhonemeCharacteristic;
use App\Models\PhonemeActivity;

use Illuminate\Http\Request;    
class MekdadPhonemeController extends Controller
{  public function renderTable($tableName)
    {
        // Map table names to models
        $tables = [
            'phoneme-syllabic-changes' => PhonemeSyllabicChange::class,
            'phoneme-substitutions' => PhonemeSubstitution::class,
            'phoneme-structural-roles' => PhonemeStructuralRole::class,
            'phoneme-semantic-features' => PhonemeSemanticFeature::class,
            'phoneme-root-effects' => PhonemeRootEffect::class,
            'phoneme-replacements' => PhonemeReplacement::class,
            'phoneme-phonetic-features' => PhonemePhoneticFeature::class,
            'phoneme-origins' => PhonemeOrigin::class,
            'phoneme-natures' => PhonemeNature::class,
            'phoneme-morphemes' => PhonemeMorpheme::class,
            'phoneme-harakats' => PhonemeHarakat::class,
            'phoneme-grammatical-roles' => PhonemeGrammaticalRole::class,
            'phoneme-functions' => PhonemeFunction::class,
            'phoneme-embeddings' => PhonemeEmbedding::class,
            'phoneme-deletions' => PhonemeDeletion::class,
            'phoneme-contextual-features' => PhonemeContextualFeature::class,
            'phoneme-characteristics' => PhonemeCharacteristic::class,
            'phoneme-activities' => PhonemeActivity::class,
        ];

        // Check if the table exists in the map
        if (isset($tables[$tableName])) {
            $model = $tables[$tableName]; // Get the corresponding model
            $data = $model::all(); // Fetch all records from the model

            return view('mekdad_phonemes.phoneme_table', compact('data', 'tableName')); // Pass data and table name to the view
        }

        // If the table does not exist, return a 404 page
        abort(404);
    }}
