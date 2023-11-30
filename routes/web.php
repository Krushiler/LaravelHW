<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'App\Http\Controllers\HomeController@home');

    Route::get('/home', 'App\Http\Controllers\HomeController@home')->name('home');
    
    Route::post('/save-note', 'App\Http\Controllers\NoteController@saveNote');
    
    Route::get('/get-notes', 'App\Http\Controllers\NoteController@getNotes');   

    Route::post('/create-post', 'App\Http\Controllers\PostController@createPost');

    Route::get('/posts', 'App\Http\Controllers\PostController@getPosts');

    Route::get('/post/{id}', 'App\Http\Controllers\PostController@getPost')->name('get-post');

    Route::post('/add-comment', 'App\Http\Controllers\PostController@addComment');

    Route::delete('/delete-comment', 'App\Http\Controllers\PostController@deleteComment');
});


Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');

Route::post('/authenticate', 'App\Http\Controllers\AuthController@authenticate');

Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');