<?php

namespace App\Http\Controllers\Api;

use App\Event;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function getEventData()
    {
        $data = Event::select('id', 'event_name', 'event_details', 'event_closing_day', 'event_reference_url')->get();
        return ['data' => $data];
    }

    public function getMyEventData(Request $request)
    {
        $data = Event::select('id', 'event_name', 'event_details', 'event_closing_day', 'event_displaying_day', 'event_reference_url')
            ->where('register_user_id', $request->user()->id)
            ->get();
        return ['data' => $data];
    }

    public function deleteUserEvents(Request $request)
    {
        $result = DB::transaction(function () use ($request) {
            $numDeleteCount = Event::where('register_user_id', $request->user()->id)
                ->where('id', $request->id)
                ->delete();

            if ($numDeleteCount !== 1) {
                throw new \Exception("ファイルの削除に失敗しました。ファイル削除数は${numDeleteCount}です。");
            } else {
                return $numDeleteCount;
            }
        });

        if ($result === 1) {
            return $result;
        } else {
            throw new \Exception("ファイルの削除に失敗しました");
        }
    }
}
