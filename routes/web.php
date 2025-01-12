<?php

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function (Request $request) {
    $jobs = Job::query()
        ->when($request->has('title'), function ($query) use ($request) {
            $query->where('title', 'like', '%' . $request->title . '%');
        })
        ->when($request->has('location'), function ($query) use ($request) {
            $query->where('location', 'like', '%' . $request->location . '%');
        })
        ->when($request->has('salary_min'), function ($query) use ($request) {
            $query->where('salary', '>=', $request->salary_min);
        })
        ->when($request->has('salary_max'), function ($query) use ($request) {
            $query->where('salary', '<=', $request->salary_max);
        })
        ->paginate(10);

    return view('jobs', ['jobs' => $jobs]);
});

Route::get('/job/{job}', function (Job $job) {
    return view('job', ['job' => $job]);
});

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
    return view('employer', ['employer' => $employer]);
});