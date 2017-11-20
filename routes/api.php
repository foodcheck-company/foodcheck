<?php

Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');
Route::get('/auth-check', 'AuthController@checkAuth');

Route::group(['middleware' => 'jwt.auth'], function () {

    Route::group(['prefix' => 'dishes'], function () {
        Route::get('/', 'DishesController@index');
    });

    Route::group(['prefix' => 'images'], function () {
        Route::post('/', 'ImagesController@store');
    });

    Route::group(['prefix' => 'restaurants'], function () {
        Route::get('/', 'RestaurantsController@index');
    });
});


