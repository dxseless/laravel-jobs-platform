<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

Route::resource('jobs', JobController::class)->except(['edit', 'update']);

Route::prefix('jobs')->group(function () {
    Route::post('/{job}/like', [JobController::class, 'like'])->name('jobs.like');
    Route::delete('/{job}/unlike', [JobController::class, 'unlike'])->name('jobs.unlike'); 
    Route::post('/{job}/favorite', [JobController::class, 'addToFavorites'])->name('jobs.favorite');
    Route::delete('/{job}/unfavorite', [JobController::class, 'removeFromFavorites'])->name('jobs.unfavorite'); 
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/users', function () {
    $users = User::latest()->paginate(3); 
    return view('users', ['users' => $users]);
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