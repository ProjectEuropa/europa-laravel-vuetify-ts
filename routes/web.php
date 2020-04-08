<?php

Route::group(['middleware' => 'auth.very_basic'], function() {
  Route::get('/', function() {
    return view('index');
  });
  Route::get('/{any}', function() {
    return view('index');
  })->where('any', '[^auth].*$');

  Route::post('/register', 'Auth\RegisterController@register');
  Route::get('/auth/logout', 'Auth\LoginController@logout');
});
