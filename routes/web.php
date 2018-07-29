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
    Route::get('/users', 'UserController@index');
    Route::post('/users', 'UserController@user_insert');
    Route::post('/users/{id}', 'UserController@user_update');

    Route::get('/languages', 'LanguagesController@index');

    Route::get('/versions', 'VersionController@index');
    Route::post('/versions', 'VersionController@version_insert');
    Route::post('/versions/{id}', 'VersionController@version_update');

    Route::get('/projects', 'ProjectsController@index');
    Route::post('/projects', 'ProjectsController@projects_insert');
    Route::post('/projects/{id}', 'ProjectsController@projects_update');

    Route::get('/lokalizasyon', 'ProjectsController@lokalizasyon');
    Route::post('/lokalizasyon', 'ProjectsController@lokalizasyon_insert');
    Route::post('/lokalizasyon/{id}', 'ProjectsController@lokalizasyon_update');

});

Route::get('/login', 'TeknasyonController@login');
Route::post('signin', 'TeknasyonController@signin');
Route::get('/logout', 'TeknasyonController@logout');