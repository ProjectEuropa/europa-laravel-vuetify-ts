<?php

namespace App\Http\Controllers;

use App\File;

class FileConventionalUtilController extends Controller
{

    public function download(int $id)
    {
        $file = File::select('file_name', 'file_data')
            ->where('id', '=', $id)
            ->first();

        // タイトル取得
        $title = $file->file_name;
        // CHEバイナリデータ取得
        $fileData = $file->file_data;
        // 取得したバイナリデータを書き込み
        $cheData = '.CHE';
        file_put_contents($cheData, $fileData);
        $headers = [
            'Content-Type: application/CHE',
        ];
        return response()->download($cheData, $title, $headers);
    }
}
