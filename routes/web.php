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

Route::group(['middleware' => ['AuthCheck']],function(){
    Route::get('/', 'TeknasyonController@index');
});

Route::get('/login', 'TeknasyonController@login');
Route::post('signin', 'TeknasyonController@signin');
Route::get('/logout', 'TeknasyonController@logout');