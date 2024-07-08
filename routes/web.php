<?php

use App\Http\Controllers\AbcenseEnseController;
use App\Http\Controllers\AbcenseEtudsController;
use App\Http\Controllers\DetailGroubeEnsg;
use App\Http\Controllers\EexamenController;
use App\Http\Controllers\EmploieEnseAficherController;
use App\Http\Controllers\EmploieEnsegController;
use App\Http\Controllers\EmploieEtudiController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EtudiantControllerafichher;
use App\Http\Controllers\FilierAfichherController;
use App\Http\Controllers\FilliereController;
use App\Http\Controllers\ForamtionAfichherController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\GroupeAfiicherController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\StagiaireController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;







// use App\Http\Middleware;


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


Route::get('/register',[LoginController::class,'register'])->name('admin.register');
Route::post('/registerbein', [LoginController::class,'store'])->name('admin.store');
Route::post('/login',[LoginController::class,'login'])->name('admin.login');
Route::get('logout',[LoginController::class,'logout'])->name('admin.logout');
Route::get('/login', function () {
    return view('admin.login.login');
});



Route::group(['middleware'=> ['auth','admin'],'prefix'=>'admin'], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
// route stagire
Route::resource('s', StagiaireController::class);
Route::put('s/{id}', [StagiaireController::class,'update'])->name('s.update');
Route::delete('s/{id}', [StagiaireController::class,'destroy'])->name('s.destroy');
// route Filliere
Route::resource('f',FilliereController::class);
//route Formation
Route::resource('for',FormationController::class);
// route groupes
// route modules
Route::resource('m',ModuleController::class);
// route etudiant
Route::resource('e',EtudiantController::class);
// route groupe
Route::resource('g',GroupeController::class);
// Enseignant
Route::resource('ens',EnseignantController::class);
// examen
Route::resource('exm',EexamenController::class);
// note
Route::resource('not',NoteController::class);
// emploiesEns
Route::resource('emploiEns',EmploieEnsegController::class);
// emploieEtu
Route::resource('emploiEtuds',EmploieEtudiController::class);
//route abcenseEnseig
Route::resource('abcenseEnseig',AbcenseEnseController::class);
Route::resource('abcenseEtudi',AbcenseEtudsController::class);


});
Route::group(['middleware'=> ['auth', 'Etud'],'prefix'=>'etudiant'], function () {
    Route::get('/etud/dashboard', function () {
        return view('etudiant.dashboard');
    })->name('etudiant.dashboard')  ;
    Route::get('f', [EtudiantControllerafichher::class,'afichher'])->name('e.afichher');
    Route::get('g', [GroupeAfiicherController::class,'afichher'])->name('g.afichher');
    // Route::get('E', [EtudiantControllerafichher::class,'afichher']);
});
Route::group(['middleware'=> ['auth', 'stager'],'prefix'=>'Stagiaire'], function () {
    Route::get('/stag/dashboard', function () {
        return view('stagiaire.dashboard');
    })->name('stagiaire.dashboard')  ;

});
Route::group(['middleware'=> ['auth', 'Enseig'],'prefix'=>'enseignant'], function () {
    Route::get('/Ensei/dashboard', function () {
        return view('enseignant.dashboard');
    })->name('enseignant.dashboard')  ;
Route::get('e', [EtudiantControllerafichher::class,'aficherEtu'])->name('e.aficherEtu');
Route::get('f',[ForamtionAfichherController::class, 'aficherForm'])->name('f.aficherForm');
Route::get('fil',[FilierAfichherController::class, 'aficher'])->name('fil.aficher');
Route::get('g', [GroupeAfiicherController::class,'afichherEns'])->name('g.afichherEns');
Route::resource('det',DetailGroubeEnsg::class);

Route::resource('n',NoteController::class);
Route::resource('ex',EexamenController::class);
Route::resource('abcenseEtud',AbcenseEtudsController::class);
Route::get('emploEns',[EmploieEnseAficherController::class, 'index'])->name('emploEns.index');
});
