<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;

class EventNoticeController extends Controller
{
      public function __construct()
      {
        $this->middleware('auth');
      }

      public function store(Request $request){
      $user = Auth::user();
      $eventReferenceUrl = $request->eventReferenceUrl ?? null;
      $event = new Event;
      $event->register_user_id     = $user->id;
      $event->event_name           = $request->eventName;
      $event->event_details        = $request->eventDetails;
      $event->event_reference_url  = $eventReferenceUrl;
      $event->event_type           = $request->eventType;
      $event->event_closing_day    = $request->eventClosingDay;
      $event->event_displaying_day = $request->eventDisplayingDay;
      $event->save();
      return redirect('/eventnotice')->with('message', 'イベント告知の登録に成功しました');
    }
}
