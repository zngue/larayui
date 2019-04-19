<?php

Route::namespace('Zngue\Login\Controllers')->as('login::')->middleware('web')->group(function () {
    Route::middleware('login')->group(function ($api) {
        $api->get('/user',function (){
            echo 12000;die;
        });
        $api->get('login');

    });
});
