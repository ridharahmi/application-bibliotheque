<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/***** Admin *****/
Route::resource('GestionLivres', 'Admin\LivresController');
route::match(['get', 'post'],'admin', 'Admin\AdminController@index');
Route::resource('GestionMembre', 'Admin\MembresController');


/***** Membre *****/
route::match(['get', 'post'],'settings', 'Membre\MembreController@settings');
route::match(['get', 'post'],'membre', 'Membre\MembreController@index');