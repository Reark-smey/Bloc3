<?php

use App\Http\Controllers\Bloc3Controller;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});
Route::get('/formLogin', 'App\Http\Controllers\VisiteurController@getLogin');
Route::post('/login', 'App\Http\Controllers\VisiteurController@signIn');
Route::get('/getLogin', 'App\Http\Controllers\VisiteurController@signOut');

Route::get('/getFraisVisiteur', 'App\Http\Controllers\FraisController@getFraisVisiteur');



Route::get('/updateFrais/{id}', 'App\Http\Controllers\FraisController@updateFrais');
Route::post('/validateFrais/{id}', 'App\Http\Controllers\FraisController@validateFrais');

Route::get('/ajouterFrais', 'App\Http\Controllers\FraisController@addFrais');
Route::post('/validerFrais/', 'App\Http\Controllers\FraisController@validerFrais');

Route::get('removeFrais/{id}', 'App\Http\Controllers\FraisController@removeFrais');

Route::get('/getHorsForfait', 'App\Http\Controllers\HorsForfaitController@getHorsForfait');

Route::get('/updateHorsForfait/{id}', 'App\Http\Controllers\HorsForfaitController@updateHorsForfait');
Route::post('/validateHorsForfait/{id}', 'App\Http\Controllers\HorsForfaitController@validateHorsForfait');

Route::get('/addHorsForfait/{id}', 'App\Http\Controllers\HorsForfaitController@addHorsForfait');
Route::post('/validateHorsForfait/', 'App\Http\Controllers\HorsForfaitController@validateHorsForfait');

Route::get('removeHorsForfait/{id}', 'App\Http\Controllers\HorsForfaitController@removeHorsForfait');


Route::get('/listerVisiteurs', 'App\Http\Controllers\Bloc3Controller@listerVisiteurs')->name('listerVisiteurs');

Route::get('/ChercherParNom', 'App\Http\Controllers\Bloc3Controller@visiteursByNom');
Route::post('/validerRecherche', [\App\Http\Controllers\Bloc3Controller::class,'validerRecherche'])->name('validerRecherche');
Route::get('/ListerVisiteurParNom/{nom}',[Bloc3Controller::class,'ListerVisiteurParNom'])->name('ListerVisiteurParNom');

Route::get('/ListeLabo', 'App\Http\Controllers\Bloc3Controller@ListeLabo');
Route::post('/validerRechercheLabo', [\App\Http\Controllers\Bloc3Controller::class,'validerRechercheLabo'])->name('validerRechercheLabo');
Route::get('/ListerVisiteurParLabo/{id}',[Bloc3Controller::class,'ListerVisiteurParLabo'])->name('ListerVisiteurParLabo');


Route::get('/Inviter', 'App\Http\Controllers\Bloc3Controller@Inviter');
Route::post('/validerInviter', [\App\Http\Controllers\Bloc3Controller::class,'validerInviter'])->name('validerInviter');
Route::get('/ListeInviter', 'App\Http\Controllers\Bloc3Controller@ListeInviter')->name('ListeInviter');

Route::get('/ProfilAdherents', [Bloc3Controller::class,'ProfilAdherents'])->name('ProfilAdherents');
Route::get('/InfoAdherents/{id}', [Bloc3Controller::class,'InfoAdherents'])->name('InfoAdherents');


Route::get('/Realiser/{id}', 'App\Http\Controllers\Bloc3Controller@Realiser');
Route::post('/validerrealiser', [\App\Http\Controllers\Bloc3Controller::class,'validerrealiser'])->name('validerrealiser');

Route::get('ListerActivites/{id}',[Bloc3Controller::class,'ListerActiviteComplByAdherent'])->name('ListerActivites');
Route::get('supprimeractivite/{id}', [Bloc3Controller::class, 'supprimeractivite'])->name('supprimeractivite');

Route::get('/ListeSecteur', 'App\Http\Controllers\Bloc3Controller@ListeSecteur');
Route::post('/validerRechercheSecteur', [\App\Http\Controllers\Bloc3Controller::class,'validerRechercheSecteur'])->name('validerRechercheSecteur');
Route::get('/ListerVisiteurParSecteur/{id}',[Bloc3Controller::class,'ListerVisiteurParSecteur'])->name('ListerVisiteurParSecteur');


Route::post('/validerAdherent', [Bloc3Controller::class,'validerAdherent'])->name('validerAdherent');

Route::get('/modifierAdherent/{id}', [Bloc3Controller::class,'modifierAdherent'])->name('modifierAdherent');
