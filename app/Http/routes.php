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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/u', function(){
  return view('user');
});

Route::get('/h', function(){
  return view('history');
});

Route::get('/m', function(){
  return view('messages');
});

Route::get('/c', function(){
  return view('calendar');
});
Route::get('/d', function(){
  return view('dashboard');
});

Route::get('/n', function(){
  return view('notification');
});

Route::post('/image-upload/{id}', 'ImageUploadController@upload');
