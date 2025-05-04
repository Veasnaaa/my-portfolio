<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/' , function(){
    return Inertia::render('Index');
})->name('index');

Route::get('/jobs' , function(){
    $jobs = Job::all();
});
