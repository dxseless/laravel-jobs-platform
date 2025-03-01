<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
    
        $job = Job::create(array_merge($attributes, [
            'employer_phone' => Job::factory()->create()->employer_phone,
            'user_id' => Auth::id(),
        ]));
    
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