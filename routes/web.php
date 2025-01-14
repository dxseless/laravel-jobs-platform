<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LikeController;
use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

Route::post('/jobs/{job}/like', [JobController::class, 'like'])->name('jobs.like');
Route::post('/jobs/{job}/unlike', [JobController::class, 'unlike'])->name('jobs.unlike');
Route::delete('/jobs/{job}/unlike', [JobController::class, 'unlike'])->name('jobs.unlike'); 

Route::post('/jobs/{job}/favorite', [JobController::class, 'addToFavorites'])->name('jobs.favorite');
Route::post('/jobs/{job}/unfavorite', [JobController::class, 'removeFromFavorites'])->name('jobs.unfavorite');
Route::delete('/jobs/{job}/unfavorite', [JobController::class, 'removeFromFavorites'])->name('jobs.unfavorite');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/users', function () {
    return view('users', ['users' => User::paginate(3)]);
});

Route::get('/employers', function () {
    return view('employers', ['employers' => Employer::paginate(3)]);
});

Route::get('/employers/{employer}', function (Employer $employer) {
    $employer->load('jobs');
    return view('employers.show', ['employer' => $employer]);
});