<?php
Route::namespace('Zngue\Login\Controllers')->as('login::')->prefix('/api')->middleware('api')->group(function ($api) {

    $api->get('/login','LoginController@index')->name('zng_login');

});
