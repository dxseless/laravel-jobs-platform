<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Repositories\JobRepository;
use App\Traits\HandlesFavorites;
use Illuminate\Http\Request;

class JobController extends Controller
{
    use HandlesFavorites;

    protected $jobRepository;

    public function __construct(JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    public function index(Request $request)
    {
        $jobs = $this->jobRepository->filterJobs($request->only(['title', 'location', 'salary_min', 'salary_max']));
        return view('jobs', ['jobs' => $jobs]);
    }
    
    public function show(Job $job)
    {
        return view('show', ['job' => $job]);
    }

    public function like(Job $job)
    {
        $likes = session('likes', []);

        if (!in_array($job->id, $likes)) {
            $likes[] = $job->id;
        }

        session(['likes' => $likes]);

        return back()->with('success', 'Вакансия добавлена в лайки!');
    }

    public function unlike(Job $job)
    {
        $likes = session('likes', []);

        $likes = array_diff($likes, [$job->id]);

        session(['likes' => $likes]);

        return back()->with('success', 'Вакансия удалена из лайков!');
    }

    public function addToFavorites(Job $job)
    {
        $favorites = session('favorites', []);

        if (!in_array($job->id, $favorites)) {
            $favorites[] = $job->id;
        }

        session(['favorites' => $favorites]);

        return back()->with('success', 'Вакансия добавлена в избранное!');
    }

    public function removeFromFavorites(Job $job)
    {
        $favorites = session('favorites', []);

        $favorites = array_diff($favorites, [$job->id]);

        session(['favorites' => $favorites]);

        return back()->with('success', 'Вакансия удалена из избранного!');
    }
}