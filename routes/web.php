<?php

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
