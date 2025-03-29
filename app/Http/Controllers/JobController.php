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
        $jobs = Job::with('employer')->latest()->paginate(5);
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

    protected function redirectWithSuccess($route, $message) {
        return redirect($route)->with('success', $message);
    }

    public function destroy(Job $job) 
    {
        Gate::authorize('edit', $job);
        $job->delete();
        return $this->redirectWithSuccess('/jobs', 'Работа успешно удалена.');
    }

    public function update(JobRequest $request, Job $job) 
    {
        Gate::authorize('edit', $job);
        $job->update($request->validated());
        return $this->redirectWithSuccess('/jobs', 'Работа успешно обновлена.');
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
        return $this->redirectWithSuccess('/jobs', 'Работа успешно размещена.');
    }

    public function create()
    {
        if (Auth::guest()) {
            return redirect()->route('login');
        }
        return view('jobs.create');
    }
}