<?php

use App\Http\Controllers\ArabicDiacriticController;
use Illuminate\Support\Facades\Route;
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

use App\Http\Controllers\WordTypeController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\GrammarRuleController;
use App\Http\Controllers\BeautyOfLanguageController;
use App\Http\Controllers\ArabicLanguageController;

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

Route::get('/upload', [PossibleWordsController::class, 'showUploadForm']);
Route::post('/import', [PossibleWordsController::class, 'uploadExcel'])->name('upload');

Route::get('/grammar', [GrammarController::class, 'index']); // swabeq and lawaheq routes

Route::get('/prefixes-suffixes', [PrefixSuffixController::class, 'index']); // swabeq and lawaheq routes (updated)

Route::get('/phonemes', [PhonemeController::class, 'index']); // الصوتيات الجديدة كاملة
Route::get('/phonemes/place-of-articulation', [PhonemeController::class, 'getPlacesOfArticulation']); // to show the places of articulation
Route::get('/phonemes/show-letter-by-place/{place}', [PhonemeController::class, 'showByPlace'])->name('phonemes.showByPlace'); // Filtered view




Route::get('/root-words', [RootWordController::class, 'index'])->name('root-words.index');
Route::post('/root-words/import', [RootWordController::class, 'import'])->name('root-words.import');

Route::get('/root-words-view2', [RootWordController::class, 'index2'])->name('root-words.index2'); // New index2

Route::post('/rootwords/attach-prefix-suffix', [RootWordController::class, 'attachPrefixesAndSuffixes'])->name('rootwords.attachPrefixSuffix');

Route::get('/info', [RootWordController::class, 'info']);


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
Route::get('/edit-rule/{id}', [TajweedController::class, 'edit'])->name('edit-rule');

// Update the rule
Route::put('/update-rule/{id}', [TajweedController::class, 'update'])->name('update-rule');

// Delete the rule
Route::get('/delete-rule/{id}', [TajweedController::class, 'destroy'])->name('delete-rule');

Route::get('/phonemes-menu', [PhonemeController::class, 'showMenu'])->name('phonemes-menu'); // show the menu of phonemes
Route::get('/phonemes-diacritics/{id}', [PhonemeController::class, 'phonemesDiacritics'])->name('phonemes-diacritics'); // show the menu of phonemes

Route::post('/update-phoneme-diacritic', [PhonemeController::class, 'updatePhonemeDiacritic'])->name('update.phoneme.diacritic');



Route::get('/pronouns', [PronounController::class, 'show']);


Route::get('/show', [ImageController::class, 'index'])->name('images.show');
Route::get('/upload', [ImageController::class, 'upload'])->name('images.upload');
Route::post('/upload', [ImageController::class, 'store'])->name('upload.store');

Route::get('/phonemes/place/{place}', [PhonemeController::class, 'getPlaceLetters']);

Route::resource('phonemecategories', PhonemeCategoryController::class);

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




Route::resource('linkingtool', LinkingToolControlller::class);


Route::resource('classifications', ClassificationController::class);

// after 5/2/2025 ===============================================================



Route::get('/syntactic-effects/create', [SyntacticEffectController::class, 'create'])->name('syntactic-effects.create');
Route::post('/syntactic-effects', [SyntacticEffectController::class, 'store'])->name('syntactic-effects.store');

Route::get('/semantic-logical-effects/create', [SemanticLogicalEffectController::class, 'create'])->name('semantic-logical-effects.create');
Route::post('/semantic-logical-effects', [SemanticLogicalEffectController::class, 'store'])->name('semantic-logical-effects.store');

Route::resource('linkingtool', LinkingToolControlller::class);

// Route::resource('contextual_conditions', ContextualConditionController::class);



Route::get('contextual_conditions/create', [ContextualConditionController::class, 'create'])->name('contextual_conditions.create');
Route::get('contextual_conditions/show-table/{toolName}', [ContextualConditionController::class, 'showTableRows']);
Route::get('contextual_conditions/index', [ContextualConditionController::class, 'index'])->name('contextual_conditions.index');
Route::post('contextual_conditions/store', [ContextualConditionController::class, 'store'])->name('contextual_conditions.store');
Route::post('contextual_conditions/destroy/{id}', [ContextualConditionController::class, 'destroy'])->name('contextual_conditions.destroy');
Route::post('contextual_conditions/update/{id}', [ContextualConditionController::class, 'update'])->name('contextual_conditions.update');




Route::get('/classification-view', [PhonemeController::class, 'ruleDetails'])->name('classification.ruleDetails');

Route::get('tool_information/create', [ToolsInformationController::class, 'create'])->name('tool_information.create');
Route::get('tool_information/show-table/{toolName}', [ToolsInformationController::class, 'showTableRows']);
Route::post('tool_information/store', [ToolsInformationController::class, 'store'])->name('tool_information.store');
Route::post('tool_information/update/{id}', [ToolsInformationController::class, 'update']);
Route::delete('tool_information/destroy/{id}', [ToolsInformationController::class, 'destroy'])->name('tool_information.destroy');
Route::put('tool_information/update/{id}', [ToolsInformationController::class, 'update'])->name('tool_information.update');
// Route::resource('tool_information', ToolsInformationController::class);s
Route::delete('/delete-rule/{id}/{linking_tool_id}', [PhonemeController::class, 'destroy'])->name('delete.rule');


Route::resource('word-types', WordTypeController::class);
Route::resource('examples', ExampleController::class);
Route::resource('grammar-rules', GrammarRuleController::class);
Route::resource('beauty-of-language', BeautyOfLanguageController::class);

Route::get('/harf/{id}', [ArabicLanguageController::class, 'tools'])->name('harf.show');
// Route::get('/conditionals/{tool_id}/{id}', [ArabicLanguageController::class, 'show'])->name('conditionals.show');
Route::get('/conditionals/show', [ArabicLanguageController::class, 'show'])->name('conditionals.show');
