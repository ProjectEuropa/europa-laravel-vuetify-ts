<?php

/**
 * Forward specific route to nuxt router
 *
 * This route is redered by `<nuxtRoot>/pages/index.vue`
 */
// Route::get(
//     '{uri}',
//     '\\' . Pallares\LaravelNuxt\Controllers\NuxtController::class
// )->where('uri', '.*');

// Route::get(
//     '{uri}',
//     '\\' . Pallares\LaravelNuxt\Controllers\NuxtController::class
// )->where('uri', '.*');

Route::group(['middleware' => 'auth.very_basic'], function() {
  Route::get('/{any}', function() {
    return view('index');
  })->where('any', '.*');
});
