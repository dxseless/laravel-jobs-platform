<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Employer;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\JobRequest;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::latest()->paginate(5);
        return view('jobs.index', compact('jobs'));
    }   
    
    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    public function destroy(Job $job)
    {
        Gate::authorize('edit', $job);
        $job->delete();
        return redirect('/jobs')->with('success', 'Работа успешно удалена.');
    }

    public function update(JobRequest $request, Job $job)
    {
        Gate::authorize('edit', $job);
        $job->update($request->validated()); 
        return redirect('/jobs')->with('success', 'Работа успешно обновлена.');
    }

    public function store(JobRequest $request) 
    {
        $attributes = $request->validated();

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

        Mail::to($job->employer->user->email)->queue(new JobPosted($job));

        return redirect('/jobs')->with('success', 'Работа успешно размещена.');
    }

    public function create()
    {
        if (Auth::guest()) {
            return redirect()->route('login');
        }
        return view('jobs.create');
    }
}