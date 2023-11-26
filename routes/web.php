<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'App\Http\Controllers\HomeController@home');

    Route::get('/home', 'App\Http\Controllers\HomeController@home')->name('home');
    
    Route::post('/save-note', 'App\Http\Controllers\NoteController@saveNote');
    
    Route::get('/get-notes', 'App\Http\Controllers\NoteController@getNotes');    
});


Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');

Route::post('/authenticate', 'App\Http\Controllers\AuthController@authenticate');

Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');