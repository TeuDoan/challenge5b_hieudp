<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

//about
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::middleware('guest')->group(function () {
    //Login page
    Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');

    //Login action
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});




Route::middleware('auth')->group(function () {

    //Dashboard page
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard.index');

    //profile page
    Route::get('/profile/{uuid}', [UserController::class, 'show'])->name('profile.show');

    //show Edit profile page
    Route::get('/profile/{uuid}/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{uuid}', [UserController::class, 'update'])->name('profile.update');
    
    //Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name(name: 'logout');
});

//homework assignments

//homework submissions

