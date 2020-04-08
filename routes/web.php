<?php

Route::group(['middleware' => 'auth.very_basic'], function() {
  Route::get('/', function() {
    return view('index');
  });
  Route::get('/{any}', function() {
    return view('index');
  })->where('any', '[^au].*$');

  Route::post('/login', 'Auth\LoginController@login');
  Route::post('/register', 'Auth\RegisterController@register');
  Route::get('/auth/logout', 'Auth\LoginController@logout');
  Route::get('/auto/download/{id}', 'FileConventionalUtilController@download');

});
