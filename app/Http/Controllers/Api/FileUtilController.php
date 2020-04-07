<?php

namespace App\Http\Controllers\Api;

use DB;
use App\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileUtilController extends Controller
{

    public function deleteSearchFile(Request $request)
    {
        $result = DB::transaction(function () use ($request) {
            $numDeleteCount = File::where('id', '=', $request->input('id'))
                ->where('delete_password', '=', $request->input('deletePassword') === null ? '' : $request->input('deletePassword'))
                ->delete();
            if ($numDeleteCount !== 1) {
                throw new \Exception('ファイルの削除に失敗しました');
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
