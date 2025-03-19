<?php

use App\Http\Controllers\AnalyzingWeakeningController;
use App\Http\Controllers\BuiltInAdverbController;
use App\Http\Controllers\DemonstrativePronounController;
use App\Http\Controllers\DerivedWordController;
use App\Http\Controllers\GrammaticalHarakatController;
use App\Http\Controllers\InflectedAdverbController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SecondaryGrammaticalHarakatController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArabicDiacriticController;
use App\Http\Controllers\ArabicLetterController;
use App\Http\Controllers\ArabicPhoneticController;
use App\Http\Controllers\ArabicThreeLetterCombinationController;
use App\Http\Controllers\ArabicFourLetterCombinationController;
use App\Http\Controllers\ContextualConditionController;
use App\Http\Controllers\EmphaticArabicLetterController;
use App\Http\Controllers\GrammarController;
use App\Http\Controllers\PhonemeController;
use App\Http\Controllers\possiblewordscontroller;
use App\Http\Controllers\PrefixSuffixController;
use App\Http\Controllers\RootController;
use App\Http\Controllers\RootWordController;
use App\Http\Controllers\SuffixController;
use App\Http\Controllers\TajweedController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PhonemeCategoryController;

use App\Http\Controllers\RefugeBasmalaController;
use App\Http\Controllers\TajweedCategoryController;

use App\Http\Controllers\PronounController;
use App\Http\Controllers\DeepInfraController;
use App\Http\Controllers\LinkingToolControlller;
use App\Http\Controllers\QuranController;
use App\Http\Controllers\ClassificationController;

use App\Http\Controllers\SemanticLogicalEffectController;
use App\Http\Controllers\SyntacticEffectController;
use App\Http\Controllers\ToolsInformationController;
use App\Http\Controllers\ConnectiveCategoryController;
use App\Http\Controllers\WordTypeController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\GrammarRuleController;
use App\Http\Controllers\BeautyOfLanguageController;
use App\Http\Controllers\ArabicLanguageController;
use App\Http\Controllers\MekdadPhonemeController;
use App\Http\Controllers\SentenceController;
use App\Http\Controllers\TreeController;
use App\Http\Controllers\ArabicFeatureController;
use App\Http\Controllers\AugmentedThreeLetterVerbController;
use App\Http\Controllers\AugmentedVerbDerivedExampleController;
use App\Http\Controllers\ConnectiveController;
use App\Http\Controllers\DialectController;
use App\Http\Controllers\SemanticDomainController;
use App\Http\Controllers\NameTypeController;
use App\Http\Controllers\FunctionalWordController;
use App\Http\Controllers\NamePronounController;
use App\Http\Controllers\RelativePronounController;
use App\Http\Controllers\ToolNameController;
use App\Http\Controllers\VerbPhonemePositionController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\BuiltVerbController;

use App\Http\Controllers\BasicTrilateralVerbController;
use App\Http\Controllers\DeletionRuleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


use App\Http\Controllers\HarakatFunctionController;
use App\Http\Controllers\HarakatFunctionDetailController;

// Harakat Functions Routes
Route::resource('harakat-functions', HarakatFunctionController::class);
// Add these routes to your web.php file
Route::resource('augmented-three-letter-verbs', AugmentedThreeLetterVerbController::class);
// Add this to your routes/web.php file
Route::get('basic-trilateral-verbs', [BasicTrilateralVerbController::class, 'index'])
    ->name('basic-trilateral-verbs.index');

Route::get('basic-trilateral-verbs/{basicTrilateralVerb}', [BasicTrilateralVerbController::class, 'show'])
    ->name('basic-trilateral-verbs.show');

// Protected routes that require authentication
Route::middleware(['auth'])->group(function () {
    Route::get('basic-trilateral-verbs/create/new', [BasicTrilateralVerbController::class, 'create'])
        ->name('basic-trilateral-verbs.create');
    
    Route::post('basic-trilateral-verbs', [BasicTrilateralVerbController::class, 'store'])
        ->name('basic-trilateral-verbs.store');
    
    Route::get('basic-trilateral-verbs/{basicTrilateralVerb}/edit', [BasicTrilateralVerbController::class, 'edit'])
        ->name('basic-trilateral-verbs.edit');
    
    Route::put('basic-trilateral-verbs/{basicTrilateralVerb}', [BasicTrilateralVerbController::class, 'update'])
        ->name('basic-trilateral-verbs.update');
    
    Route::delete('basic-trilateral-verbs/{basicTrilateralVerb}', [BasicTrilateralVerbController::class, 'destroy'])
        ->name('basic-trilateral-verbs.destroy');
});
// Harakat Function Details Nested Routes
// Route::get('harakat-functions/{harakatFunction}/details', [HarakatFunctionDetailController::class, 'index'])
//     ->name('harakat-functions.details.index');


Route::get('harakat-functions/{harakatFunction}/details/{detail}', [HarakatFunctionDetailController::class, 'show'])
    ->name('harakat-functions.details.show');


Route::resource('name_types', NameTypeController::class);
Route::resource('functional_words', FunctionalWordController::class);
Route::resource('relative-pronouns', RelativePronounController::class);
// Deletion Rules Routes
Route::resource('deletion-rules', DeletionRuleController::class);
Route::resource('dialects', DialectController::class);
Route::resource('semantic_domains', SemanticDomainController::class);


// Route::resource('basic-trilateral-verbs', BasicTrilateralVerbController::class);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('harakat-functions/{harakatFunction}/details/create', [HarakatFunctionDetailController::class, 'create'])
    ->name('harakat-functions.details.create');

    Route::post('harakat-functions/{harakatFunction}/details', [HarakatFunctionDetailController::class, 'store'])
    ->name('harakat-functions.details.store');

    Route::put('harakat-functions/{harakatFunction}/details/{detail}', [HarakatFunctionDetailController::class, 'update'])
    ->name('harakat-functions.details.update');

    Route::delete('harakat-functions/{harakatFunction}/details/{detail}', [HarakatFunctionDetailController::class, 'destroy'])
    ->name('harakat-functions.details.destroy');
    
    Route::get('harakat-functions/{harakatFunction}/details/{detail}/edit', [HarakatFunctionDetailController::class, 'edit'])
    ->name('harakat-functions.details.edit');


    Route::resource('phonemecategories', PhonemeCategoryController::class);

    Route::get('/edit-rule/{id}', [TajweedController::class, 'edit'])->name('edit-rule');

    // Update the rule
    Route::put('/update-rule/{id}', [TajweedController::class, 'update'])->name('update-rule');
    // Delete the rule
    Route::get('/delete-rule/{id}', [TajweedController::class, 'destroy'])->name('delete-rule');
    Route::get('/upload', [PossibleWordsController::class, 'showUploadForm']);
    
    Route::resource('word-types', WordTypeController::class);
    Route::resource('examples', ExampleController::class);
    Route::resource('grammar-rules', GrammarRuleController::class);
    Route::resource('beauty-of-language', BeautyOfLanguageController::class);
    Route::resource('arabic-features', ArabicFeatureController::class);


    Route::get('/syntactic-effects/create', [SyntacticEffectController::class, 'create'])->name('syntactic-effects.create');
    Route::post('/syntactic-effects', [SyntacticEffectController::class, 'store'])->name('syntactic-effects.store');
    Route::put('/syntactic-effects/{id}', [SyntacticEffectController::class, 'update']);
    Route::delete('/syntactic-effects/{id}', [SyntacticEffectController::class, 'destroy']);

    Route::get('tool_information/create', [ToolsInformationController::class, 'create'])->name('tool_information.create');
    Route::post('tool_information/store', [ToolsInformationController::class, 'store'])->name('tool_information.store');
    Route::post('tool_information/update/{id}', [ToolsInformationController::class, 'update']);
    Route::delete('tool_information/destroy/{id}', [ToolsInformationController::class, 'destroy'])->name('tool_information.destroy');
    Route::put('tool_information/update/{id}', [ToolsInformationController::class, 'update'])->name('tool_information.update');
    // Route::resource('tool_information', ToolsInformationController::class);s
    Route::delete('/delete-rule/{id}/{linking_tool_id}', [PhonemeController::class, 'destroy'])->name('delete.rule');
    
    Route::get('contextual_conditions/create', [ContextualConditionController::class, 'create'])->name('contextual_conditions.create');
    Route::get('contextual_conditions/show-table/{toolName}', [ContextualConditionController::class, 'showTableRows']);
    Route::post('contextual_conditions/store', [ContextualConditionController::class, 'store'])->name('contextual_conditions.store');
    Route::post('contextual_conditions/destroy/{id}', [ContextualConditionController::class, 'destroy'])->name('contextual_conditions.destroy');
    Route::post('contextual_conditions/update/{id}', [ContextualConditionController::class, 'update'])->name('contextual_conditions.update');

    Route::post('/semantic-logical-effects', [SemanticLogicalEffectController::class, 'store'])->name('semantic-logical-effects.store');
    Route::get('/semantic-logical-effects/{id}/edit', [SemanticLogicalEffectController::class, 'edit'])->name('semantic-logical-effects.edit');
    Route::delete('/semantic-logical-effects/{id}', [SemanticLogicalEffectController::class, 'destroy'])->name('semantic-logical-effects.destroy');
    Route::POST('/semantic-logical-effects/{id}', [SemanticLogicalEffectController::class, 'update'])->name('semantic-logical-effects.update');
    
    Route::get('contextual_conditions/create', [ContextualConditionController::class, 'create'])->name('contextual_conditions.create');
    Route::get('contextual_conditions/show-table/{toolName}', [ContextualConditionController::class, 'showTableRows']);
    Route::post('contextual_conditions/store', [ContextualConditionController::class, 'store'])->name('contextual_conditions.store');
    Route::post('contextual_conditions/destroy/{id}', [ContextualConditionController::class, 'destroy'])->name('contextual_conditions.destroy');
    Route::post('contextual_conditions/update/{id}', [ContextualConditionController::class, 'update'])->name('contextual_conditions.update');

    Route::resource('/sentences', SentenceController::class); // إضافة جملة جديدة

    // Route::get('/connectives/{id}/edit', [ConnectiveController::class, 'update']);
    Route::put('/connectives/{connective}', [ConnectiveController::class, 'update'])->name('connectives.update');
    
    
    
});

require __DIR__.'/auth.php';
// Route::resource('connectives', ConnectiveController::class);


Route::resource('connective_categories', ConnectiveCategoryController::class);
Route::resource('connectives', ConnectiveController::class);
Route::resource('pronouns', NamePronounController::class);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ArabicLanguageController::class, 'index']);

Route::get('/arabic-letters', [ArabicLetterController::class, 'index']);

Route::get('/ini', [ArabicLetterController::class, 'ini']);

Route::get('/arabic-diacritics', [ArabicDiacriticController::class, 'index']);

Route::get('/arabic-phonetics', [ArabicPhoneticController::class, 'index']);

Route::get('/emphatic-arabic-letters', [EmphaticArabicLetterController::class, 'index']);



Route::get('/generate-3-letter-combinations', [ArabicThreeLetterCombinationController::class, 'generateCombinations']);
Route::get('/three-letter-combinations', [ArabicThreeLetterCombinationController::class, 'index']);


Route::get('/generate-4-letter-combinations', [ArabicFourLetterCombinationController::class, 'generateCombinations']);
Route::get('/four-letter-combinations', [ArabicFourLetterCombinationController::class, 'index']);


Route::get('/find-words', [possiblewordscontroller::class, 'filterWords']);

Route::post('/import', [PossibleWordsController::class, 'uploadExcel'])->name('upload');

Route::get('/grammar', [GrammarController::class, 'index']); // swabeq and lawaheq routes

Route::get('/prefixes-suffixes', [PrefixSuffixController::class, 'index']); // swabeq and lawaheq routes (updated)

Route::get('/phonemes', [PhonemeController::class, 'index']); // الصوتيات الجديدة كاملة
Route::get('/phonemes/place-of-articulation', [PhonemeController::class, 'getPlacesOfArticulation']); // to show the places of articulation
Route::get('/phonemes/show-letter-by-place/{place}', [PhonemeController::class, 'showByPlace'])->name('phonemes.showByPlace'); // Filtered view


// Add these routes to your routes/web.php file


Route::resource('verb-phoneme-positions', VerbPhonemePositionController::class);

Route::get('/phoneme-activities/{phoneme_id}', [VerbPhonemePositionController::class, 'getActivities']);

Route::get('/root-words', [RootWordController::class, 'index'])->name('root-words.index');

Route::get('/root-words-view2', [RootWordController::class, 'index2'])->name('root-words.index2'); // New index2

Route::get('/info', [RootWordController::class, 'info']);


Route::get('roots/create', [RootController::class, 'create']);
Route::post('roots/create', [RootController::class, 'store'])->name('roots.store');
Route::get('roots/import', [RootController::class, 'showForm']);
Route::post('roots/import', [RootController::class, 'import'])->name('roots.import');

Route::get('roots', [RootController::class, 'index'])->name('roots.index');
Route::get('/words', [RootController::class, 'indexWords']);



// Define the routes for the Laravel application
Route::get('/verb-suffix', [SuffixController::class, 'index']);
Route::post('/process-verb', [SuffixController::class, 'processVerb']);
Route::post('/apply-prefixes', [SuffixController::class, 'applyPrefixesToVerb'])->name('apply-prefixes');
Route::post('/apply-prefixes-suffixes', [SuffixController::class, 'applyPrefixesAndSuffixesToVerb'])->name('apply-prefixes-suffixes');

// Route for displaying Tajweed rules letters
Route::get('/tajweed/rules-letters', [TajweedController::class, 'showRulesLetters'])->name('tajweed.rules.letters');

// Route for displaying Tajweed rules diacritics
Route::get('/tajweed/rules-diacritics', [TajweedController::class, 'showRulesDiacritics'])->name('tajweed.rules.diacritics');

Route::get('/tajweeds', [TajweedController::class, 'index'])->name('tajweed.index'); // all tajweed rules


Route::get('/ayah', [TajweedController::class, 'ayah']);
Route::get('/check-tajweed', [TajweedController::class, 'checkTajweed']);

Route::get('add-rule', [TajweedController::class, 'create'])->name('add-rule');
Route::post('store-tajweed', [TajweedController::class, 'store'])->name('store-tajweed');



// Show the edit form for a specific rule


Route::get('/phonemes-menu', [PhonemeController::class, 'showMenu'])->name('phonemes-menu'); // show the menu of phonemes
Route::get('/phonemes-diacritics/{id}', [PhonemeController::class, 'phonemesDiacritics'])->name('phonemes-diacritics'); // show the menu of phonemes

Route::post('/update-phoneme-diacritic', [PhonemeController::class, 'updatePhonemeDiacritic'])->name('update.phoneme.diacritic');



Route::get('/pronouns2', [PronounController::class, 'show']);


Route::get('/show', [ImageController::class, 'index'])->name('images.show');
Route::get('/upload', [ImageController::class, 'upload'])->name('images.upload');
Route::post('/upload', [ImageController::class, 'store'])->name('upload.store');

Route::get('/phonemes/place/{place}', [PhonemeController::class, 'getPlaceLetters']);


Route::post('/ar-tools/store', [ArabicLetterController::class, 'store'])->name('ar-tools.store');

Route::get('/phonemes/{phoneme}/rules',  [PhonemeController::class, 'details'])->name('phoneme.rules.show');



// ========= all ahkam tajwedd ==============
Route::get('/tajweed/menu', [TajweedCategoryController::class, 'menu'])->name('tajweedcategories.menu');
Route::get('/tajweed-concept', [TajweedCategoryController::class, 'showConcept'])->name('tajweed.concept');

Route::get('/tajweedcategories', [TajweedCategoryController::class, 'index'])->name('tajweedcategories.index');
Route::get('/tajweedcategories/{id}', [TajweedCategoryController::class, 'show'])->name('tajweedcategories.show');

Route::get('/tajweed-rule/{id}', [TajweedCategoryController::class, 'showRule'])->name('tajweed.rule');

// Route::get('/tajweedcategory/rule/{id}', [TajweedCategoryController::class, 'ruleDetails'])->name('tajweedcategory.ruleDetails');

// Route::get('tajweed-categories/{id}', [TajweedCategoryController::class, 'show'])->name('tajweedcategory.show');
// Route::get('rule-details/{id}', [TajweedCategoryController::class, 'ruleDetails'])->name('tajweedcategory.ruleDetails');


Route::get('/refuge-basmala', [RefugeBasmalaController::class, 'index']);







Route::get('/check', [PhonemeController::class, 'check']);
Route::post('/check', [PhonemeController::class, 'checkStore'])->name('check.phoneme');



Route::post('/deepinfra-chat', [DeepInfraController::class, 'chatWithDeepInfra'])->name('deepinfra-chat');
// Route::post('/linkingtool/store', [LinkingToolControlller::class, 'store'])->name('linkingtool.store');

// Route::get('/linkingtool', [LinkingToolControlller::class, 'index']);
Route::get('/search', [QuranController::class, 'search']);
Route::get('/quran', [QuranController::class, 'show']);

// mahmoud ------------------------------------------
Route::get('/analyze-search', [QuranController::class, 'analyzeSearchResults']);
Route::get('/analysis/{query}', [QuranController::class, 'showAnalysisResults']); // New route

Route::get('/analyze-ayah-results/{ayaId}', [QuranController::class, 'analyzeAyahResults'])->name('analyzeAyahResults');


// mahmoud ------------------------------------------


Route::prefix('toolnames')->group(function () {
    Route::get('/', [ToolNameController::class, 'index'])->name('toolnames.index');
    Route::get('create', [ToolNameController::class, 'create'])->name('toolnames.create');
    Route::get('{id}', [ToolNameController::class, 'show'])->name('toolnames.show');
    Route::get('{id}/edit', [ToolNameController::class, 'edit'])->name('toolnames.edit');
    Route::post('/', [ToolNameController::class, 'store'])->name('toolnames.store');
    Route::put('{id}', [ToolNameController::class, 'update'])->name('toolnames.update');
    Route::delete('{id}', [ToolNameController::class, 'destroy'])->name('toolnames.destroy');
});


Route::resource('linkingtool', LinkingToolControlller::class);


Route::resource('classifications', ClassificationController::class);

// after 5/2/2025 ===============================================================



Route::get('/semantic-logical-effects/create', [SemanticLogicalEffectController::class, 'create'])->name('semantic-logical-effects.create');

// Route::get('/semantic-logical-effects/create', [SemanticLogicalEffectController::class, 'create'])->name('semantic-logical-effects.create');
// Route::post('/semantic-logical-effects', [SemanticLogicalEffectController::class, 'store'])->name('semantic-logical-effects.store');

Route::resource('linkingtool', LinkingToolControlller::class);

// Route::resource('contextual_conditions', ContextualConditionController::class);




Route::get('contextual_conditions/index', [ContextualConditionController::class, 'index'])->name('contextual_conditions.index');



Route::get('/classification-view', [PhonemeController::class, 'ruleDetails'])->name('classification.ruleDetails');



Route::get('/harf/{id}', [ArabicLanguageController::class, 'tools'])->name('harf.show');
// Route::get('/conditionals/{tool_id}/{id}', [ArabicLanguageController::class, 'show'])->name('conditionals.show');
Route::get('/conditionals/show', [ArabicLanguageController::class, 'show'])->name('conditionals.show');


Route::get('tool_information/show-table/{toolName}', [ToolsInformationController::class, 'showTableRows']);


Route::get('/tree', [TreeController::class, 'index']);
Route::get('/tree/branch/{parentId}', [TreeController::class, 'getBranchData']);

Route::get('/root/tree', [RootController::class, 'treeIndex']);
Route::get('/root/tree/{parentId}', [RootController::class, 'getBranchData']);



// =========================== Mekdad Tables ===========================================

Route::get('/{tableName}', [MekdadPhonemeController::class, 'renderTable'])->where('tableName', 'phoneme-syllabic-changes|phoneme-substitutions|phoneme-structural-roles|phoneme-semantic-features|phoneme-root-effects|phoneme-replacements|phoneme-phonetic-features|phoneme-origins|phoneme-natures|phoneme-morphemes|phoneme-harakats|phoneme-grammatical-roles|phoneme-functions|phoneme-embeddings|phoneme-deletions|phoneme-contextual-features|phoneme-characteristics|phoneme-activities');


// =========================== Mekdad Tables ===========================================
Route::get('/augmented/roots', [AugmentedVerbDerivedExampleController::class, 'augmented']);

Route::post('/analyze', [WordController::class, 'analyze'])->name('verb.analyze');

// Verb derivation route
Route::post('/derive', [WordController::class, 'derive'])->name('verb.derive');


Route::resource('augmented', AugmentedVerbDerivedExampleController::class);



Route::get('/get-phoneme-details-for-letter', [QuranController::class, 'getPhonemeDetailsForLetter']);


// Route to get the Arabic letter ID
Route::get('/get-arabic-letter-id', [QuranController::class, 'getArabicLetterId']);

// Route to get phoneme details by letter ID
Route::get('/get-phoneme-details', [QuranController::class, 'getPhonemeDetailsForLetter']);

Route::get('/word/{name}', [TreeController::class, 'wordDetails'])->name('word.details');
Route::get('/verb/{id}', [RootController::class, 'verbDetails'])->name('verb.details');


Route::get('/phonemes/{id}/edit', [PhonemeController::class, 'edit'])->name('phonemes.edit');
Route::post('/phonemes/{id}/update', [PhonemeController::class, 'update'])->name('phonemes.update');

// Route::get('/phonemes', [PhonemeController::class, 'index'])->name('phonemes.index');
Route::get('/phonemes/{id}', [PhonemeController::class, 'show'])->name('phonemes.show');

// Route built verbs 

Route::resource('built_verbs', BuiltVerbController::class);

// Route analyzing weakening

Route::resource('analyzing_weakening', AnalyzingWeakeningController::class);

// Route derived words
Route::resource('derived_words', DerivedWordController::class);

// Route demonstrative pronouns
Route::resource('demonstrative_pronouns', DemonstrativePronounController::class);

// Route built-in adverbs
Route::resource('built_in_adverbs', BuiltInAdverbController::class);

// Route inflected adverbs
Route::resource('inflected_adverbs', InflectedAdverbController::class);

// Route grammatical harakat
Route::resource('grammatical_harakat', GrammaticalHarakatController::class);

// Route secondary grammatical harakat
Route::resource('secondary_grammatical_harakat', SecondaryGrammaticalHarakatController::class);
