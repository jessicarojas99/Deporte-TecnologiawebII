<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/','home')->name('home');
Route::view('/about','about')->name('about');



Route::get('atleta/search', 'AtletaController@search')->name('atleta.search'); 
Route::resource('atleta', 'AtletaController')->parameters(['atleta'=>'athlete']);  

Route::get('deporte/search', 'DeporteController@search')->name('deporte.search'); 
Route::resource('deporte', 'DeporteController')->parameters(['deporte'=>'sport']);


Route::get('/equipo','EquipoController@index')->name('equipo.index');
Route::get('/equipo/crear','EquipoController@create')->name('equipo.create');
Route::get('equipo/search', 'EquipoController@search')->name('equipo.search'); 
Route::get('/equipo/{team}/editar','EquipoController@edit')->name('equipo.edit');
Route::patch('/equipo/{team}','EquipoController@update')->name('equipo.update');
Route::post('/equipo', 'EquipoController@store')->name('equipo.store');   
Route::delete('/equipo/{team}','EquipoController@destroy')->name('equipo.destroy');


Route::get('/torneo','TorneoController@index')->name('torneo.index');
Route::get('/torneo/crear','TorneoController@create')->name('torneo.create'); 
Route::get('torneo/search', 'TorneoController@search')->name('torneo.search'); 
Route::get('/torneo/{torneo}/editar','TorneoController@edit')->name('torneo.edit');
Route::patch('/torneo/{torneo}','TorneoController@update')->name('torneo.update');
Route::post('/torneo','TorneoController@store')->name('torneo.store');  
Route::delete('/torneo/{torneo}','TorneoController@destroy')->name('torneo.destroy');

//ruta para el login y register=false desabilitar la ruta de registro

Auth::routes();

Route::resource('user', 'UserController');

Route::view('/contacto', 'contacto') -> name('contacto');
Route::post('contacto','MessageController@store');