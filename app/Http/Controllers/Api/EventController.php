<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;

class EventController extends Controller
{
    public function getEventData(){
      $data = Event::select('id','event_name','event_details','event_closing_day','event_reference_url')->get();
      return ['data' => $data];
    }
}
