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
  if(Auth::guest()){
    return view('welcome');
  }else {
    return view('dashboard');
  }
});

// Route::get('/h', function(){
//   return view('history');
// });

Route::get('/viewMessages', function(){
  return view('messages');
})->middleware('auth');

Route::get('/calendar', function(){
  return view('calendar');
})->middleware('auth');
Route::get('/dashboard', function(){
  return view('dashboard');
})->middleware('auth');

Route::get('/users', 'UserController@present')->middleware('auth');
Route::delete('/users', 'UserController@deleteUser')->middleware('auth');
Route::patch('/users', 'UserController@updateUser')->middleware('auth');
Route::put('/users', 'UserController@createUser')->middleware('auth');
Route::post('/users', 'UserController@deleteUsers')->middleware('auth');

Route::get('/notificationmaker', 'NotificationMakerController@getMaker')->middleware('auth');
Route::get('/notificationmaker/{step}', 'NotificationMakerController@getMakerStep')->where(['step' => '[1-4]'])->middleware('auth');
Route::post('/notificationmaker/{step}', 'NotificationMakerController@postMakerData')->where(['step' => '[1-4]'])->middleware('auth');

Route::get('/notificationcalendarfeed', 'CalendarController@getEventJson')->middleware('auth');
Route::get('/notification/view/{id}', 'NotificationController@viewNotification')->middleware('auth');
Route::post('/notification/view/{id}', 'NotificationController@editNotification')->middleware('auth');
Route::post('/notification/update/{id}', 'NotificationController@updateNotification')->middleware('auth');

Route::post('/image-upload/{id}', 'ImageUploadController@upload')->middleware('auth');

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

Route::get('/scheduler-run-scheduled-tasks', function(){
  $pendingNotifs = Notification::whereBetween('sent', [Carbon::now()->subMinutes(2), Carbon::now()])->get();//get notifications from the last two minutes
  foreach($pendingNotifs as $not){
    if($not->notification_log->status == 0){//if notification hasn't been sent
      //send notification and update status
      $status = NotificationSenderClass::sendNotification($not);
      if($status == 0){
        $not->notification_log->status = 1;//notification sent
      }else if(is_array($status)){//check tokens to retry
        Log::warning("Couldn't send notification to some users: ".var_dump($status));
        $not->notification_log->status = 1;//notification sent
      }else{//notification not sent
        $not->notification_log->status = -1;//couldn't send notification
      }
      $not->notification_log->save();
    }
  }
  return '';
});

Route::auth();

Route::get('/home', 'HomeController@index');
// Route::get('/home', function(){
//   return view('dashboard');
// });
