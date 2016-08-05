<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::post('/api/login', 'Auth\AuthController@login');
Route::post('api/register', 'Auth\AuthController@register');
Route::get('api/me', 'Auth\AuthController@userInfo');
Route::get('api/rides', 'RideController@index');

# Vue
Route::any('{all}', function () {
    return view('index');
})
->where(['all' => '.*']);
