<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', 'App\Http\Controllers\HelloController@index');
Route::get('book', 'App\Http\Controllers\BookController@index');
Route::get('book/{book}/edit', 'App\Http\Controllers\BookController@edit');
Route::get('book/create', 'App\Http\Controllers\BookController@create');
Route::put('book/{book}', 'App\Http\Controllers\BookController@update');
Route::delete('book/{book}', 'App\Http\Controllers\BookController@destroy');
Route::post('book', 'App\Http\Controllers\BookController@store');


