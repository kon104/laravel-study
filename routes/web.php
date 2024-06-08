<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('hello', 'App\Http\Controllers\HelloController@index');
Route::get('book', 'App\Http\Controllers\BookController@index');
Route::get('book/{book}/edit', 'App\Http\Controllers\BookController@edit');
Route::get('book/create', 'App\Http\Controllers\BookController@create');
Route::put('book/{book}', 'App\Http\Controllers\BookController@update');
Route::delete('book/{book}', 'App\Http\Controllers\BookController@destroy');
Route::post('book', 'App\Http\Controllers\BookController@store');

