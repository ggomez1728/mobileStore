<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource("mobiles","MobileController");
Route::resource("features","FeatureController");
Route::post("clients/search","ClientController@search")->name('clients.search');
Route::get("clients/search","ClientController@index");

Route::resource("clients","ClientController");
Route::resource("solicitudes","solicitudeController");
Route::resource("status_solicitudes","StatusSolicitudeController");