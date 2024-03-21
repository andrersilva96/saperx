<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Single Action Pattern
Route::group(['namespace' => '\App\Http\Controllers\Pages\Users', 'as' => 'users.'], function () {
    Route::get('/', 'Index')->name('index');
    Route::get('/{user}', 'Show')->name('show');
});
