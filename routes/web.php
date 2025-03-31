<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SessionController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/{job}', [JobController::class, 'show'])->whereNumber('job');
Route::delete('/jobs/{job}', [JobController::class, 'destroy']); 

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::patch('/jobs/{job}', [JobController::class, 'update']);
Route::post('/jobs/create', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/create', [JobController::class, 'create']);

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::get('/users', function () {
    return view('users', ['users' => User::latest()->paginate(3)]);
});

Route::prefix('employers')->group(function () {
    Route::get('/', [EmployerController::class, 'index']);
    Route::get('/{employer}', [EmployerController::class, 'show']);
});

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::post('/employers/{employer}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/employers/{employer}/reviews', [ReviewController::class, 'index'])->name('reviews.index');