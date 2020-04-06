<?php

namespace App\Http\Controllers\Api;

use App\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     *
     *
     * @return
     */
    public function search(Request $request)
    {
        $files = File::select('id', 'upload_owner_name', 'file_name', 'file_comment', 'created_at', 'upload_user_id', 'upload_type', 'search_tag1', 'search_tag2', 'search_tag3', 'search_tag4');

        return $files->paginate(10);
    }
}
