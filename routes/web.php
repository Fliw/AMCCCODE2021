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

Route::get('/', 'Web\Frontend\HomeController@landing')->name('home.landing');

Route::prefix('team')->group(function () {
    Route::get('/login', 'Web\Frontend\Team\LoginController@index')->name('team.login');
    Route::post('/login', 'Web\Frontend\Team\LoginController@authenticate')->name('team.login.authenticate');
    Route::get('/logout', 'Web\Frontend\Team\LoginController@logout')->name('team.logout');
    Route::get('/register', 'Web\Frontend\Team\RegisterController@index')->name('team.register');
    Route::post('/register', 'Web\Frontend\Team\RegisterController@store')->name('team.register.store');

    Route::middleware('auth.team:web')->prefix('dashboard')->group(function () {
        Route::get('/', 'Web\Frontend\Team\Dashboard\HomeController@index')->name('team.dashboard');
        Route::get('/newsfeeds', 'Web\Frontend\Team\Dashboard\NewsfeedController@index')->name('newsfeeds.index');
    });
});