<?php

use App\Http\Controllers\JobController;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::prefix('jobs')->group(function () {
    Route::get('/', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/{job}', [JobController::class, 'show'])->name('jobs.show');

    Route::post('/{job}/like', [JobController::class, 'like'])->name('jobs.like');
    Route::post('/{job}/unlike', [JobController::class, 'unlike'])->name('jobs.unlike');
    Route::post('/{job}/favorite', [JobController::class, 'addToFavorites'])->name('jobs.favorite');
    Route::post('/{job}/unfavorite', [JobController::class, 'removeFromFavorites'])->name('jobs.unfavorite');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/users', function () {
    return view('users', ['users' => User::paginate(3)]);
});

Route::prefix('employers')->group(function () {
    Route::get('/', function () {
        return view('employers', ['employers' => Employer::paginate(3)]);
    });

    Route::get('/{employer}', function (Employer $employer) {
        $employer->load('jobs');
        return view('employer', ['employer' => $employer]);
    });
});