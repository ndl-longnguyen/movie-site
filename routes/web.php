<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'MovieController@showMovieHome')->name('home');

Route::get('/all', 'MovieController@showAllMovie')->name('show-all-movie');

Route::get('/show/{id}', 'MovieController@showMovieDetail')->name('view-detail');

Route::get('/view/{id}', 'MovieController@viewMovie')->name('view-movie')->middleware('auth');

Route::get('/add/view', 'MovieController@handleAddViews')->name('add-views');

Route::get('/comment', 'CommentController@addComment')->name('add-comment');

Route::get('/search', 'LiveSearchController@HandleLiveSearch');

Route::prefix('admin')->middleware('checkrole')->name('admin.')->group(function () {

    Route::get('/', 'UserController@index')->name('index');

    Route::prefix('user')->group(function () {

        Route::get('/', 'UserController@index')->name('show-dashboard-user');

        Route::get('/delete/{id}', 'UserController@deleteUser')->name('delete-user');

        Route::get('/update/{id}', 'UserController@showUpdateUser')->name('show-update-user');

        Route::post('/update', 'UserController@updateUser')->name('update-user');

        Route::view('/add', 'admins.users.add-user')->name('show-add-user');

        Route::post('/add', 'UserController@addUser')->name('add-user');
    });

    Route::prefix('movie')->group(function () {

        Route::get('/', 'MovieController@index')->name('show-dashboard-movie');

        Route::get('/delete/{id}', 'MovieController@deleteMovie')->name('delete-movie');

        Route::get('/update/{id}', 'MovieController@showUpdateMovie')->name('show-update-movie');

        Route::post('/update', 'MovieController@updateMovie')->name('update-movie');

        Route::view('/add', 'admins.movies.add-movie')->name('show-add-movie');

        Route::post('/add', 'MovieController@addMovie')->name('add-movie');
    });
});

Route::post('/logout', 'AuthController@logout')->name('logout');

Route::view('/login', 'login')->name('login');

Route::post('/login', 'AuthController@handleLogin')->name('handleLogin');

Route::view('/register', 'register')->name('register');

Route::post('/register', 'AuthController@handleRegister')->name('handleRegister');

Route::prefix('email')->group(function () {

    Route::get('/verification', 'MailController@verification')->name('verify-email')->middleware('signed');

    Route::view('/showforgot', 'auth.show-forgot')->name('show-forgot-password');

    Route::get('/forgot', 'MailController@forgotPassword')->name('forgot-password')->middleware('signed');

    Route::post('/send', 'MailController@sendTokenForgotPassword')->name('send-token-forgot-password');

    Route::post('/forgot', 'MailController@handleforgotPassword')->name('handle-forgot-password');
});