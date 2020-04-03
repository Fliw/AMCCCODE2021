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

/*
 * ---------------------------------------------------------------------------------------
 * Admin Routes
 * ---------------------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Web\Admin\Auth')->group(function () {
        Route::get('/login', 'LoginController@index')->name('login');
        Route::post('/login', 'LoginController@authenticate')->name('auth');
        Route::get('/logout', 'LoginController@logout')->name('logout');
    });
    
    Route::middleware('auth:admin')->namespace('Web\Admin\Dashboard')->group(function () {
        Route::get('/', 'HomeController@index')->name('dashboard');
        Route::resource('/newsfeeds', 'NewsfeedController')->except('create', 'show');
        Route::resource('/payments', 'PaymentController')->only('index', 'update');
        Route::resource('/schedules', 'ScheduleController')->except('create', 'show');
        Route::resource('/quests', 'QuestController')->except('create', 'show');
        Route::resource('/accounts', 'AccountController')->only('index', 'store', 'destroy');
        Route::resource('/configs', 'ConfigurationController')->except('create', 'show');
        Route::resource('/competitioncategories', 'CompetitionCategoryController')->except('create', 'show');
        Route::resource('/events', 'EventController')->except('create', 'show');
        Route::resource('/paymentmethods', 'PaymentMethodController')->except('create', 'show');
    });
});

/*
 * ---------------------------------------------------------------------------------------
 * Frontend Routes
 * ---------------------------------------------------------------------------------------
*/
Route::get('/', 'Web\Frontend\HomeController@landing')->name('home.landing');

Route::prefix('tickets')->name('ticket.')->namespace('Web\Frontend')->group(function () {
    Route::get('/', 'TicketController@index')->name('index');
    Route::post('/', 'TicketController@order')->name('order');
    Route::get('/done', 'TicketController@done')->name('done');
    Route::get('/{ticket}', 'TicketController@form')->name('form');
});

Route::prefix('team')->name('team.')->namespace('Web\Frontend\Team')->group(function () {
    Route::get('/login', 'LoginController@index')->name('login');
    Route::post('/login', 'LoginController@authenticate')->name('auth');
    Route::get('/logout', 'LoginController@logout')->name('logout');
    Route::get('/register', 'RegisterController@index')->name('register');
    Route::post('/register', 'RegisterController@store')->name('store');

    Route::middleware('auth:team')->namespace('Dashboard')->group(function () {
        Route::get('/', 'HomeController')->name('dashboard');
        Route::get('/newsfeeds', 'NewsfeedController')->name('newsfeeds');
        Route::get('/payments', 'PaymentController')->name('payments');
        Route::get('/schedules', 'ScheduleController')->name('schedules');
        Route::resource('/quests', 'QuestController')->only(['index', 'show', 'update']);
    });
});