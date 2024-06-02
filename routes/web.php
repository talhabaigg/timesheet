<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SwmsController;
use App\Http\Controllers\UserController;

Route::get('/', [IndexController::class, 'index']);
Route::get('/hello', [IndexController::class, 'show']);

Route::resource('listing', ListingController::class);
Route::middleware(['auth'])->group(function () {
    Route::resource('project', ProjectController::class);
    Route::resource('swms', SwmsController::class);
    Route::resource('users', UserController::class);
});

// Authentication Routes
Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('destroy');
