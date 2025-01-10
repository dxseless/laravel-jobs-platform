<?php

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', ['jobs' => Job::all()]);
});

Route::get('/job/{job}', function (Job $job) {
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/users', function () {
    return view('users', ['users' => User::all()]);
});

Route::get('/employers', function () {
    $employers = Employer::all(); 
    return view('employers', ['employers' => $employers]);
});

Route::get('/employers/{employer}', function (Employer $employer) {
    $employer->load('jobs');
    return view('employer', ['employer' => $employer]);
});