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
*//*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('auth/password/register');
});

Route::get('/login', function () {
    return view('login');
});
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('discusion','DiscusionController');
Route::resource('seguridad/usuario','UsuarioController');
//Route::resource('seguridad/usuario/{id}','UsuarioController');
Route::resource('local','LocalController');

Route::resource('asignatura','AsignaturaController');
Route::resource('reservaDiscusion','ReservaDiscusionController');

Route::resource('reserva','ReservaController');
Route::auth();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
Route::get('/{slug?}', 'HomeController@index');



