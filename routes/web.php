<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@home');

Route::get('/home', 'App\Http\Controllers\HomeController@home');

Route::post('/save-note', 'App\Http\Controllers\NoteController@saveNote');

Route::get('/get-notes', 'App\Http\Controllers\NoteController@getNotes');