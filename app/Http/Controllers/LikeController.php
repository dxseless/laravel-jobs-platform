<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like (Job $job) {
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
}
