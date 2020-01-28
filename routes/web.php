<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if(!Auth::check()) {
        return view('auth.login');
    }
    return view('panel.home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
