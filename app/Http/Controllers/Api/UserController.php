<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userUpdate(Request $request)
    {
        $result = DB::transaction(function () use ($request) {
            $numDeleteCount = User::where('id', $request->user()->id)
                ->update(['name' => $request->name ]);

            if ($numDeleteCount !== 1) {
                throw new \Exception("ユーザー名の更新に失敗しました。更新された数は${numDeleteCount}です。");
            } else {
                return $numDeleteCount;
            }
        });
    }
}
