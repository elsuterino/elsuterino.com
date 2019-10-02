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

Route::get('/404', function () {
    abort(404);
})->name('home');

Route::post('/deploy', 'DeployController@handle');

Route::get('/{any?}', function () {
    return view('welcome');
})->name('home');
