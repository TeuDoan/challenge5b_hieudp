<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\SubmissionController;



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

    // Send message
    Route::post('/messages/send/{uuid}', [MessageController::class, 'send'])->name('messages.send')->middleware('auth');
    Route::post('/messages/{id}/update', [MessageController::class, 'update'])->name('messages.update');
    Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('messages.delete');


    //Homework stuffs
    Route::get('/homework', [HomeworkController::class, 'index'])->name('homework.index');
    Route::post('/homework/upload', [HomeworkController::class, 'upload'])->name('homework.upload');
    Route::post('/homework/submit', [HomeworkController::class, 'submit'])->name('homework.submit');
    Route::get('/homework/submission', [SubmissionController::class, 'index'])->name('homework.submission');



    //Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name(name: 'logout');
});



