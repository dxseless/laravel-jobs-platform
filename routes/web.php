<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::prefix('jobs')->group(function () {
    Route::get('/', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/{job}', [JobController::class, 'show'])->name('jobs.show')->whereNumber('job');

    Route::post('/{job}/like', [JobController::class, 'like'])->name('jobs.like');
    Route::delete('/{job}/unlike', [JobController::class, 'unlike'])->name('jobs.unlike'); 
    Route::post('/{job}/favorite', [JobController::class, 'addToFavorites'])->name('jobs.favorite');
    Route::delete('/{job}/unfavorite', [JobController::class, 'removeFromFavorites'])->name('jobs.unfavorite'); 
    
    Route::get('/create', function () {
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

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);