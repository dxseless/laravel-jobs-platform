<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Mail\JobPosted;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
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

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/users', function () {
    return view('users', ['users' => User::latest()->paginate(3)]);
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