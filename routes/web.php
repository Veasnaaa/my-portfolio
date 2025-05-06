<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', [ContactController::class, 'index'])->name('index');
Route::post('/', [ContactController::class, 'store'])->name('store');
