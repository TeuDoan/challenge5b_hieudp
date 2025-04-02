<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

//about
Route::get('/about', function () {
    return view('about');
})->name('about');

//Dashboard page
Route::get('/dashboard', [UserController::class,'index'])->name('dashboard.index');

//profile page
Route::get('/profile/{uuid}', [UserController::class,'show'])->name('profile.show');

//Edit profile
Route::get('/profile/{uuid}/edit', function ($uuid) {
    return view('profile.edit', ["uuid" => $uuid]);
})->name('profile.edit');

//homework assignments

//homework submissions

