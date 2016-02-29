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
    Route::get('/careHome/{id}', 'CareHomeController@getCareHome');
    Route::get('/edit/carehome/{id}', 'CareHomeController@getEditCareHome');
    Route::get('/delete/carehome/{id}', 'CareHomeController@getDeleteCareHome');
    Route::get('/', function() {
        return view('home');
    });
    Route::get('/login', 'auth\AuthController@getLogin');
    Route::post('/login', 'auth\AuthController@postLogin');
    Route::get('/logout', 'auth\AuthController@getLogout');
    //
    Route::get('/register', 'CareHomeController@getRegister');
    Route::post('/register', 'CareHomeController@postRegister');
    Route::get('/findcarehome', function () {
        return view('findcarehome');
    });

    Route::get('/profile', 'CareHomeController@getProfile');
    Route::get('/registersubstitute', 'CareHomeController@getRegisterSubstitute');
    Route::post('/registersubstitute', 'CareHomeController@postRegisterSubstitute');
    Route::get('/register/carehome', 'CareHomeController@getRegisterCareHome');
    Route::post('/register/carehome', 'CareHomeController@postRegisterCareHome');

    Route::get('/edit/substituteinfo', 'CareHomeController@getEditSubstituteInfo');
    Route::post('/edit/substituteinfo', 'CareHomeController@postEditSubstituteInfo');

    Route::get('/create/callforsubstitute', 'CareHomeController@getCreateCallForSubstitute');
    Route::post('/create/callforsubstitute', 'CareHomeController@postCreateCallForSubstitute');

    Route::get('/search/callforsubstitute/{id}', 'CareHomeController@getSearchForSubstitute');
    Route::get('/edit/callforsubstitute/{id}', 'CareHomeController@getEditCallForSubstitute');
    Route::get('/delete/callforsubstitute/{id}', 'CareHomeController@getDeleteCallForSubstitute');
    Route::post('/edit/callforsubstitute/{id}', 'CareHomeController@postEditCallForSubstitute');
    Route::get('/search/substitute/{id}', 'CareHomeController@getSearchForSubstitute');

    Route::get('/sendmessage/substitute/{id}', 'CareHomeController@getSendMessageSubstitute');
    Route::post('/sendmessage/substitute/{id}', 'CareHomeController@postSendMessageSubstitute');

    Route::get('/confirmation/sendmessage/substitute/{id}', 'CareHomeController@getConfirmationSendMessageSubstitute');

    Route::get('/substitutemessages', 'CareHomeController@getSubstituteMessages');
    Route::get('/delete/substitutemessage/{id}', 'CareHomeController@getDeleteSubstituteMessage');

    Route::get('/search/callforsubstitute/{id}', 'CareHomeController@getSearchCallForSubstitute');

    Route::get('/sendmessage/callforsubstitute/{id}', 'CareHomeController@getSendMessageCallForSubstitute');
    Route::post('/sendmessage/callforsubstitute/{id}', 'CareHomeController@postSendMessageCallForSubstitute');

    Route::get('/show/callforsubstitutemessages/{id}', 'CareHomeController@getShowCallForSubstituteMessages');
    Route::get('/delete/callforsubstitutemessages/{id}/{callid}', 'CareHomeController@getDeleteShowCallForSubstituteMessages');
    Route::get('/confirmation/sendmessage/callforsubstitute/{id}', 'CareHomeController@getConfirmationSendMessageCallForSubstitute');

    Route::get('/callforsubstitutemessage/{id}', 'CareHomeController@getCallForSubstituteMessage');

});
