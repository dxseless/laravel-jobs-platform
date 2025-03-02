<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Employer;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::query()->orderBy('id', 'DESC')->paginate(5);

        return view('jobs.index', ['jobs' => $jobs]);
    }   
    
    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function destroy(Job $job)
    {
        Gate::authorize('edit', $job);
        
        $job->delete();
        
        return redirect('/jobs');
    }

    public function update(Request $request, Job $job)
    {
        Gate::authorize('edit', $job);

        $attributes = $request->validate([
            'title' => ['required', 'min:5'],
            'salary' => ['required', 'numeric'],
            'location' => 'required',
        ]);

        $job->update($attributes);

        return redirect('/jobs')->with('success', 'Job updated successfully.');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:5'],
            'salary' => ['required', 'numeric'],
            'location' => 'required',
        ]);

        $employer = Employer::create([
            'user_id' => Auth::id(),
            'title' => fake()->company(), 
            'main_office_location' => fake()->city(), 
            'employer_phone' => fake()->phoneNumber(), 
        ]);

        $job = Job::create(array_merge($attributes, [
            'employer_phone' => $employer->employer_phone,
            'user_id' => Auth::id(),
            'employer_id' => $employer->id,
        ]));

        Mail::to($job->employer->user->email)->queue(
            new JobPosted($job)
        );

        return redirect('/jobs');
    }

    public function create()
    {
        if (Auth::guest()) {
            return redirect('/login');
        };

        return view('jobs.create');
    }
}