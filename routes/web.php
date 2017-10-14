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

Auth::routes();

// Protected routes post-login
Route::get('/dashboard', 'HomeController@showDash')->name('dashboard');
Route::get('/profile', 'ProfileController@show')->name('profile');
Route::get('/profile-edit', 'ProfileController@edit')->name('edit-profile');
Route::get('/account-info', 'InfoController@show')->name('account-info');

// Routes with permissions/roles applied
Route::middleware(['role:super-admin|admin'])->group(function () {

        Route::get('/users/manage', 'UserController@manage')->name('manage-users');
        Route::get('/users/create', 'UserController@create')->name('create-users');

    });

Route::get('users/{req_user}', 'UserController@show')->middleware('CheckAssociation');
Route::get('/users', 'UserController@index')->name('index-users');

// Route::get('/users/manage', 'UserController@manage')->name('manage-users');
// Route::get('/users/create', 'UserController@create')->name('create-users');
