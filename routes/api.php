<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use App\File;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->get('/file', function () {
  return File::select('id', 'upload_owner_name', 'file_name', 'file_comment', 'created_at', 'upload_user_id', 'upload_type',  'search_tag1', 'search_tag2', 'search_tag3', 'search_tag4')->get();
});

Route::group(['middleware' => ['api']], function () {
  Route::get('search/{searchType}', 'Api\SearchController@search');
  Route::get('sumDLSearch/{searchType}', 'Api\SearchController@sumDLSearch');

});
