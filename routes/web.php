<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Language;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TerminalController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\PorteEmbarquementController;
use app\Http\Controllers;
use App\Http\Controllers\LanguageController;


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

// Route::get('/', [AccueilController::class, 'index'])->name('accueil');

//Route::get('page/{numero_page}', [PageController::class, 'index'])->name('page_par_numero');
//
// Route::get('classe/{classe}/toto', [ClasseController::class, 'toto'])->name('classe.toto');
//Route::resource('classe', ClasseController::class);
//Route::resource('matiere', MatiereController::class);
//Route::resource('professeur', ProfesseurController::class);

//Route::get('/dashboard', function () {
//   return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
//Route::get('setlocale/{locale}', 'LocaleController@setLocale')->name('setlocale');
Route::resource('terminal', TerminalController::class);
Route::resource('porte-embarquement', PorteEmbarquementController::class);
Route::get('/', function () {
    return view('liste');
});


//Route::get('/', [TerminalController::class, 'index']);
Route::resource('/hall', HallController::class);
Route::get('/portes-embarquement/create', 'PorteEmbarquementController@create')->name('portes-embarquement.create');
Route::get('/portes-embarquement/{porte_embarquement}/edit', 'PorteEmbarquementController@edit')->name('portes-embarquement.edit');
Route::delete('/portes-embarquement/{porte_embarquement}', 'PorteEmbarquementController@destroy')->name('portes-embarquement.destroy');
Route::post('/portes-embarquement', 'PorteEmbarquementController@store')->name('portes-embarquement.store');
Route::post('/portes-embarquement/create', 'PorteEmbarquementController@create')->name('portes-embarquement.create');

Route::get('/setlocale/{locale}', function ($locale) {
    // Votre logique pour changer la locale
})->name('setlocale');

Route::get('/accueil', [AccueilController::class, 'index'])->name('accueil.index');

  Route::get('/profile', [PorteEmbarquementController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [PorteEmbarquementController::class, 'update'])->name('profile.update');
  Route::delete('/pro<file', [PorteEmbarquementController::class, 'destroy'])->name('profile.destroy');
  Route::get('/porte-embarquement/{porteEmbarquement}/edit', 'PorteEmbarquementController@edit')->name('porte-embarquement.edit');
  Route::get('/porte-embarquement/{porteEmbarquement}', 'PorteEmbarquementController@show');

  Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("locale/{lange}",[Language::class,'setLang']);
Route::get('/change-language/{locale}', 'LanguageController@changeLanguage')->name('change-language');
Route::get('/change-language/{locale}', [LanguageController::class, 'changeLanguage'])->name('change-language');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/porte-embarquement', [PorteEmbarquementController::class, 'action'])->name('porte-embarquement.index');

Route::middleware(['auth'])->group(function () {
    // Les routes protégées par authentification
    Route::get('/terminal', [TerminalController::class, 'index'])->name('terminal.index');
    Route::get('/porte-embarquement', [PorteEmbarquementController::class, 'action'])->name('porte-embarquement.index');
    Route::get('/hall', [HallController::class, 'index'])->name('hall.index');
});
Route::put('/porte-embarquement/{porte_embarquement}', 'PorteEmbarquementController@update')->name('porte-embarquement.update');
Route::put('/terminal/{terminal}', 'TerminalController@update')->name('terminal.update');

Route::get('/terminal/create', [TerminalController::class, 'create'])->name('terminal.create');
Route::post('/terminal', [TerminalController::class, 'store'])->name('terminal.store');



Route::get('/terminal', [TerminalController::class, 'index'])->name('terminal.index');
Route::get('/terminal/create', [TerminalController::class, 'create'])->name('terminal.create');
Route::post('/terminal', [TerminalController::class, 'store'])->name('terminal.store');
Route::get('/terminal/{terminal}', [TerminalController::class, 'show'])->name('terminal.show');
Route::get('/terminal/{terminal}/edit', [TerminalController::class, 'edit'])->name('terminal.edit');
Route::put('/terminal/{terminal}', [TerminalController::class, 'update'])->name('terminal.update');
Route::delete('/terminal/{terminal}', [TerminalController::class, 'destroy'])->name('terminal.destroy');
Route::get('/porte-embarquement', [PorteEmbarquementController::class, 'index'])->name('porte-embarquement.index');
Route::get('/porte-embarquement/create', [PorteEmbarquementController::class, 'create'])->name('porte-embarquement.create');
Route::post('/porte-embarquement', [PorteEmbarquementController::class, 'store'])->name('porte-embarquement.store');
Route::get('/porte-embarquement/{porte_embarquement}', [PorteEmbarquementController::class, 'show']);
Route::get('/porte-embarquement/{porte_embarquement}/edit', [PorteEmbarquementController::class, 'edit'])->name('porte-embarquement.edit');
Route::put('/porte-embarquement/{porte_embarquement}', [PorteEmbarquementController::class, 'update'])->name('porte-embarquement.update');
Route::delete('/porte-embarquement/{porte_embarquement}', [PorteEmbarquementController::class, 'destroy'])->name('porte-embarquement.destroy');
Route::get('/porte-embarquement', 'PorteEmbarquementController@index')->name('porte-embarquement.index')->middleware('auth');

Route::get('/porte-embarquement', [PorteEmbarquementController::class, 'index'])->name('porte-embarquement.index');
Route::get('/porte-embarquement/create', [PorteEmbarquementController::class, 'create'])->name('porte-embarquement.create');
Route::post('/porte-embarquement', [PorteEmbarquementController::class, 'store'])->name('porte-embarquement.store');
