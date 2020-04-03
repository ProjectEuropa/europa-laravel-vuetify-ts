<?php

/**
 * Forward specific route to nuxt router
 *
 * This route is redered by `<nuxtRoot>/pages/index.vue`
 */

use Illuminate\Http\Request;

Route::group(['middleware' => 'auth.very_basic'], function () {
    Route::get('/{any}', function () {
        return view('index');
    })->where('any', '.*');

    Route::post('/team/simpleupload', function (Request $request) {

        $dataType = null;
        $file = null;
        $uploadOwnerName = null;
        $fileComment = null;
        $deletePassword = null;
        $searchTags = null;

        // チームFlgがオンならばチームデータを取得、offならばマッチデータ
        $dataType = '1';
        $file = $request->file('teamFile');
        $uploadOwnerName = $request->input('teamOwnerName'); // アップロードオーナー名（編集可能）
        $fileComment = $request->input('teamComment'); // コメント
        $deletePassword = $request->input('teamDeletePassWord'); // 削除パスワード
        $searchTags = $request->input('teamSearchTags'); // 検索タグ
        $searchTag1 = null;
        $searchTag2 = null;
        $searchTag3 = null;
        $searchTag4 = null;
        switch ($searchTags !== null ? count($searchTags) : 0) {
            case 4:
                $searchTag4 = $searchTags[3];
            case 3:
                $searchTag3 = $searchTags[2];
            case 2:
                $searchTag2 = $searchTags[1];
            case 1:
                $searchTag1 = $searchTags[0];
                break;
        }
        $fileData = file_get_contents($file); // ファイルのバイナリデータ取得
        $fileName = $file->getClientOriginalName(); // ファイル名
        $now = now(); // 現在日付
        $uploadUserId = 0;
        $uploadType = '1';
        $db = DB::connection('pgsql')->getPdo();
        $stmt = $db->prepare("INSERT INTO files (file_data, upload_type, file_name, upload_owner_name, file_comment, delete_password, data_type, created_at, updated_at, upload_user_id, search_tag1, search_tag2, search_tag3, search_tag4) "
            . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $fileData, $db::PARAM_LOB); //ラージオブジェクトとして登録
        $stmt->bindParam(2, $uploadType, $db::PARAM_STR);
        $stmt->bindParam(3, $fileName, $db::PARAM_STR);
        $stmt->bindParam(4, $uploadOwnerName, $db::PARAM_STR);
        $stmt->bindParam(5, $fileComment, $db::PARAM_STR);
        $stmt->bindParam(6, $deletePassword, $db::PARAM_STR);
        $stmt->bindParam(7, $dataType, $db::PARAM_STR);
        $stmt->bindParam(8, $now, $db::PARAM_STR);
        $stmt->bindParam(9, $now, $db::PARAM_STR);
        $stmt->bindParam(10, $uploadUserId, $db::PARAM_INT);
        $stmt->bindParam(11, $searchTag1, $db::PARAM_STR);
        $stmt->bindParam(12, $searchTag2, $db::PARAM_STR);
        $stmt->bindParam(13, $searchTag3, $db::PARAM_STR);
        $stmt->bindParam(14, $searchTag4, $db::PARAM_STR);
        $stmt->execute();
        // 切断
        unset($db);
    });

});
