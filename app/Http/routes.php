<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */



Route::get('/getstates', 'CareHomeController@getStates');
Route::get('/getcities', 'CareHomeController@getCities');
Route::get('/getcarehomes', 'CareHomeController@getCareHomes');
Route::get('/getcarehomerooms', 'CareHomeController@getCareHomeRooms');
Route::get('/authlogout', function () {
    Auth::logout();
    echo "asdfasdf";
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
 */

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function() {
        return view('home');
    });
    Route::get('/login', 'auth\AuthController@getLogin');
    Route::post('/login', 'auth\AuthController@postLogin');
    Route::get('/logout', 'auth\AuthController@getLogout');
    //
    Route::get('/register', 'auth\AuthController@getRegister');
    Route::post('/register', 'auth\AuthController@postRegister');
    Route::get('/findcarehome', function () {
        return view('findcarehome');
    });

    Route::get('/profile', 'CareHomeController@getProfile');
    Route::get('/registersubstitute', 'CareHomeController@getRegisterSubstitute');
    Route::post('/registersubstitute', 'CareHomeController@postRegisterSubstitute');
    Route::get('/registercarehome', 'CareHomeController@getRegisterCareHome');
});
