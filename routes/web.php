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
    return view('auth/login');
});

Route::get('/test', function () {
    return 'welcome';
});

Route::get('/bonjour/{prenom?}/{bien?}', function ($prenom = "chuck", $bien = "bien") {
    return view('bonjour', ['prenom' => $prenom, 'bien' => $bien]);

});

Route::get('/wall', 'WallController@index')->name('wallIndex')->middleware('auth');
Route::post('/wall/write', 'WallController@write');

Route::get('/wall/delete/{id_message}', 'WallController@delete');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');
