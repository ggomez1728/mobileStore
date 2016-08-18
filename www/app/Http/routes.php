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

Route::get("clients/generate","ClientController@generate")->name('clients.generate');
Route::get("clients/backup","ClientController@backup")->name('clients.backup');
Route::get("clients/search","ClientController@search")->name('clients.search');
Route::resource("clients","ClientController");

Route::get("solicitudes/updateStatus/{id}/{status}","solicitudeController@updateStatus")->name('solicitudes.updateStatus');
Route::get("solicitudes/search","solicitudeController@search")->name('solicitudes.search');
Route::resource("solicitudes","solicitudeController");
Route::resource("status_solicitudes","StatusSolicitudeController");
