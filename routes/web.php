<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Admin', 'as' => 'admin.', 'prefix' => 'admin'], function() {

    Route::get('/', function (){
        return redirect()->route('admin.authenticated.dashboard');
    });

    Route::get('/login', [
        'as' => 'login',
        'uses' => 'Auth\LoginController@showLoginForm'
    ]);

    Route::post('/login', [
        'as' => 'login.submit',
        'uses' => 'Auth\LoginController@login'
    ]);

    Route::post('/logout', [
        'as' => 'logout',
        'uses' => 'Auth\LoginController@logout'
    ]);

    // authendicated admin routes
    Route::group(['as' => 'authenticated.', 'middleware' => ['auth:admin']], function() {

        Route::get('/dashboard', [
            'as' => 'dashboard',
            'uses' => 'DashboardController@index'
        ]);

        Route::resource('/files','UserFileController');
        Route::get('/deleted_files', 'UserFileController@deletedFiles')->name('deleted_files');
    });

});