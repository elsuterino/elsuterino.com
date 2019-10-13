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

// Auth
//Route::get('login', 'Auth\LoginController@showLoginForm')->middleware('guest');
//Route::post('login', 'Auth\LoginController@login')->middleware('guest');
//Route::post('logout', 'Auth\LoginController@logout')->middleware('auth');

Route::get('/', 'AboutController@index');
Route::get('/about', 'AboutController@index');
//Route::get('/experience', 'StaticPageController@experience');
Route::get('/portfolio', 'PortfolioController@index');
Route::get('/skills', 'SkillController@index');

Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@store');

Route::get('/cv', 'CvController@index');
