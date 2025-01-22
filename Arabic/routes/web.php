<?php

use App\Http\Controllers\ArabicDiacriticController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArabicLetterController;
use App\Http\Controllers\ArabicPhoneticController;
use App\Http\Controllers\ArabicThreeLetterCombinationController;
use App\Http\Controllers\ArabicFourLetterCombinationController;
use App\Http\Controllers\EmphaticArabicLetterController;
use App\Http\Controllers\GrammarController;
use App\Http\Controllers\PhonemeController;
use App\Http\Controllers\possiblewordscontroller;
use App\Http\Controllers\PrefixSuffixController;
use App\Http\Controllers\RootController;
use App\Http\Controllers\RootWordController;

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

Route::get('/', function () {
    return view('welcome');
});

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










