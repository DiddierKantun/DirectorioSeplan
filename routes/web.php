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
    return view('login');
});

Route::get('home', function () {
    return view('welcome');
})->name('welcome');

Route::get('borrar', function () {
    return view('logout');
})->name('borrar');

Route::resource('usuario','UsuarioController');
Route::post( 'usuario/{usuario}', 'UsuarioController@updatestatus')->name('usuario.updatestatus');

Route::resource('sector', 'SectorController');
Route::get('sector/{sector}', 'SectorController@updatestatus')->name('sector.updatestatus');

Route::resource('dependencia', 'DependenciaController');
Route::post('dependencia/{id_dependencia}', 'DependenciaController@updatestatus')->name('dependencia.updatestatus');

Route::resource('enlace', 'EnlaceController');
Route::post('enlace/{enlace}', 'EnlaceController@updatestatus')->name('enlace.updatestatus');

Route::resource('persona', 'PersonaController');
Route::post('persona/{id_persona}', 'PersonaController@updatestatus')->name('persona.updatestatus');

Route::get('directorio', 'DirectorioController@index')->name('directorio.index');

Route::post('login', 'loginController@login')->name('login.index');
Route::get('logout', 'loginController@logout')->name('login.borrar');