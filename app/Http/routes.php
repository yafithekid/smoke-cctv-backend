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


Route::group(['prefix'=>'auth'],function(){
    Route::get('/login',['as'=>'auth.login','uses'=>'AuthController@getLogin']);
    Route::post('/login',['as'=>'auth.login.submit','uses'=>'AuthController@postLogin']);
    Route::get('/logout',['as'=>'auth.logout','uses'=>'AuthController@getLogout']);
});
Route::group(['prefix'=>'photo'],function(){
    Route::get('/',['uses' => 'PhotoController@getIndex','as' => 'photo.index']);
    Route::get('/{id}/read',['uses'=>'PhotoController@getRead','as'=>'photo.read']);
    Route::post('/create',['uses'=>'PhotoController@postCreate','as'=>'photo.create.submit']);
    Route::get('/{id}/delete',['uses'=>'PhotoController@getDelete','as'=>'photo.delete']);
});



Route::get('/', 'PhotoController@getIndex');

