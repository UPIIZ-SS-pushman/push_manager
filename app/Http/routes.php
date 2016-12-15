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

Route::get('/notificationmaker', 'NotificationMakerController@getMaker');
Route::get('/notificationmaker/{step}', 'NotificationMakerController@getMakerStep')->where(['step' => '[1-3]']);

// Route::get('/n2', function(){
//   return view('notification.notification2');
// });
//
// Route::get('/n3', function(){
//   return view('notification.notification3');
// });

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

Route::get('/generateDB', 'DataForDatabase@generateData');

Route::get('/createNotif', 'DataForDatabase@createNotif');
