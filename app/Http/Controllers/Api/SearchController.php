<?php

namespace App\Http\Controllers\Api;

use App\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     *
     *
     * @return
     */
    public function search(Request $request, string $searchType)
    {
        $files =
        File::select('id', 'upload_owner_name', 'file_name', 'file_comment', 'created_at', 'upload_user_id', 'upload_type', 'search_tag1', 'search_tag2', 'search_tag3', 'search_tag4')
            ->where('data_type', '=', $searchType === "team" ? '1' : '2');

        return $files->paginate(10);
    }
}
