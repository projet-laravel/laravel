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

Route::get('/test', function () {
    return 'welcome';
});

Route::get('/bonjour/{name?}/{bien?}', function ($name = "wang",$bien = "bien") {
    return view("bonjour",["name" => $name , "bien" => $bien]);
});

Route::get('/wall',"WalleController@index")->name('WalleIndex')->Middleware('auth');

Route::post('/wall/write',"WalleController@write");

Route::get('/wall/delete/{id_message}',"WalleController@delete");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
