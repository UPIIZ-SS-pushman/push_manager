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

Route::get('/users', 'UserController@present');
Route::delete('/users', 'UserController@deleteUser');
Route::patch('/users', 'UserController@updateUser');
Route::put('/users', 'UserController@createUser');
Route::post('/users', 'UserController@deleteUsers');

Route::get('/notificationmaker', 'NotificationMakerController@getMaker');
Route::get('/notificationmaker/{step}', 'NotificationMakerController@getMakerStep')->where(['step' => '[1-4]']);
Route::post('/notificationmaker/{step}', 'NotificationMakerController@postMakerData')->where(['step' => '[1-4]']);

Route::get('/notificationcalendarfeed', 'CalendarController@getEventJson');
Route::get('/notification/view/{id}', 'NotificationController@viewNotification');
Route::post('/notification/view/{id}', 'NotificationController@editNotification');
Route::post('/notification/update/{id}', 'NotificationController@updateNotification');

Route::post('/image-upload/{id}', 'ImageUploadController@upload');

Route::get('/testjson', function(){
  return Response::json(array(
    '0' =>array('id' => '0', 'description' => 'Alumno'),
    '1' =>array('id' => '1', 'description' => 'Maestro'),
  ));
});

Route::get('/testjson2', function(){
  return Response::json(array(
    '0' =>array('id' => '0', 'description' => 'Sistemas'),
    '1' =>array('id' => '1', 'description' => 'Mecatrónica'),
  ));
});

//these routes are for testing only
Route::get('/generateDB', 'DataForDatabase@generateData');
Route::get('/createNotif', 'DataForDatabase@createNotif');
Route::get('/sendtestNotif', 'NotificationController@sendTestNotif');
