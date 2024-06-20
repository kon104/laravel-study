<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
//	return view('welcome');
	return view('index');
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
Route::get('unauth', 'App\Http\Controllers\UnAuthController@index');

Route::get('book', 'App\Http\Controllers\BookController@index')->middleware('auth');
Route::get('book/{book}/edit', 'App\Http\Controllers\BookController@edit')->middleware('auth');
Route::get('book/create', 'App\Http\Controllers\BookController@create')->middleware('auth');
Route::put('book/{book}', 'App\Http\Controllers\BookController@update')->middleware('auth');
Route::delete('book/{book}', 'App\Http\Controllers\BookController@destroy')->middleware('auth');
Route::post('book', 'App\Http\Controllers\BookController@store')->middleware('auth');

Route::get('member', 'App\Http\Controllers\MemberController@index')->middleware('auth');
Route::get('member/{member}/edit', 'App\Http\Controllers\MemberController@edit')->middleware('auth');
Route::get('member/create', 'App\Http\Controllers\MemberController@create')->middleware('auth');
Route::post('member', 'App\Http\Controllers\MemberController@store')->middleware('auth');



