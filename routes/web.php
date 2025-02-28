<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::prefix('jobs')->group(function () {
    Route::get('/', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/{job}', [JobController::class, 'show'])->name('jobs.show')->whereNumber('job');
    Route::get('/{job}/edit', [JobController::class, 'edit']);

    Route::get('/create', function () {
        if (Auth::guest()) {
            return redirect('/login');
        };

        return view('jobs.create');
    });
    Route::post('/create', function () {
        $attributes = request()->validate([
            'title' => ['required', 'min:5'],
            'salary' => ['required', 'numeric'],
            'location' => 'required',
        ]);

        Job::create($attributes);

        return redirect('/jobs');
    });
});

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [SessionController::class, 'create']);
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