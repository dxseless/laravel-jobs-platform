<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Job::query()->latest()->paginate(10);

        return view('jobs.index', ['jobs' => $jobs]);
    }   
    
    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function edit(Job $job)
    {
        if (Auth::guest()) {
            return redirect('/login');
        };
        
        if (Auth::guest() || $job->user_id !== Auth::id()) {
            abort(403);
        }

        return view('jobs.edit', ['job' => $job]);
    }
}