<?php

namespace App\Http\Controllers;

use App\Models\Job;

class FavoriteController extends Controller
{
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
