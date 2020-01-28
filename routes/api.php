<?php

use Illuminate\Support\Facades\Route;

Route::post('v1/login', 'Api\ApiController@login');
Route::Post('v1/register','Api\ApiController@login');
Route::group(['middleware' => 'auth_jwt','prefix' => 'v1'], function () {
    Route::post('logout', 'Api\ApiController@logout');
    Route::get('profile/basic-information', 'Api\ApiController@profile');
});
