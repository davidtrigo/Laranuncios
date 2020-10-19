<?php

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//autenticacion

Auth::routes();



// portada
Route::get('/', 'WelcomeController@index')->name('index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
 
// formulario de confirmacion de eliminacion
Route::get('anuncios/delete/{anuncio}', 'AnuncioController@delete')->name('anuncios.delete');

// operaciones CRUD
Route::resource('anuncios','AnuncioController');






