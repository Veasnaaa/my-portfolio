<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [ContactController::class, 'index'])->name('index');
Route::post('/', [ContactController::class, 'store'])->name('store');

Route::get('/user', [AuthController::class, 'getUserLogin'])
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/contact-management', [ContactController::class, 'getContact'])->name('contact');
});
