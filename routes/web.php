<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', '\App\Http\Controllers\Pages\Users\Index')->name('users.index');
Route::get('user/{user?}', '\App\Livewire\Show')->name('users.save');
