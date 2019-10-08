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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('welcome');
});

Route::get('/cheatsheet', function () {
    $cheatsheet = \App\CheatsheetEntry::with('tags')->get();
    $cheatsheet = \App\Http\Resources\CheatsheetEntryResource::collection($cheatsheet);
    return view('welcome', compact('cheatsheet'));
});

Route::get('/contact', function () {
    return view('welcome');
});

Route::get('/experience', function () {
    return view('welcome');
});

Route::get('/portfolio', function () {
    return view('welcome');
});

Route::get('/skills', function () {
    return view('welcome');
});
