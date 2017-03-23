<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use App\Notification;

class CalendarController extends Controller
{
    public function getEventJson(Request $request){
      $start = Carbon::createFromFormat('Y-m-d', $request->input('start'), 'America/Mexico_City');
      $end = Carbon::createFromFormat('Y-m-d', $request->input('end'), 'America/Mexico_City');

      $notifs = Notification::whereBetween('sent', [$start, $end])->get();

      $events = array();
      foreach($notifs as $n){
        $time = Carbon::parse($n->sent);
        $time->setTimezone('America/Mexico_City');

        $events[] = array(
          "title" => $n->title,
          "start" => $time->toIso8601String(),
          "url" => url("/notification/view/".$n->id)
        );
      }

      return response()->json($events);
    }
}
