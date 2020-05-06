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

    Route::post('/team/simpleupload', 'UploadController@teamSimpleUpload');
    Route::post('/match/simpleupload', 'UploadController@matchSimpleUpload');
    Route::post('/team/upload', 'UploadController@teamSimpleUpload');
    Route::post('/match/upload', 'UploadController@matchSimpleUpload');
    
});
