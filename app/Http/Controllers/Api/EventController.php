<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;

class EventController extends Controller
{
    public function getEventData(){
      // $data = Event::get();
      $data = Event::select('id','event_name','event_details','event_closing_day','event_reference_url')->get();
      // $jsonData = json_decode($data);
      // dd($data);
      return ['data' => $data];
    }
}
