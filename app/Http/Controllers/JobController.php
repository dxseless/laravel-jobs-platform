<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\Tag;
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
        $jobs = Job::query()
            ->with(['category', 'tags'])
            ->when($request->title, function ($query, $title) {
                $query->where('title', 'like', '%' . $title . '%');
            })
            ->when($request->location, function ($query, $location) {
                $query->where('location', 'like', '%' . $location . '%');
            })
            ->when($request->salary_min, function ($query, $salaryMin) {
                $query->where('salary', '>=', $salaryMin);
            })
            ->when($request->salary_max, function ($query, $salaryMax) {
                $query->where('salary', '<=', $salaryMax);
            })
            ->paginate(10);

        $categories = Category::all();
        $tags = Tag::all();

        return view('jobs.index', ['jobs' => $jobs, 'categories' => $categories, 'tags' => $tags]);
    }
    
    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
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

        public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('edit-vacancy', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $job = Job::create([
            'title' => $request->title,
            'salary' => $request->salary,
            'location' => $request->location,
            'category_id' => $request->category_id,
        ]);

        $job->tags()->attach($request->tags);

        return redirect()->route('edit-vacancy')->with('success', 'Вакансия создана!');
    }
}