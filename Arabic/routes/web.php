<?php

use App\Http\Controllers\ArabicDiacriticController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArabicLetterController;
use App\Http\Controllers\ArabicPhoneticController;
use App\Http\Controllers\ArabicThreeLetterCombinationController;
use App\Http\Controllers\ArabicFourLetterCombinationController;
use App\Http\Controllers\EmphaticArabicLetterController;
use App\Http\Controllers\GrammarController;
use App\Http\Controllers\possiblewordscontroller;


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





