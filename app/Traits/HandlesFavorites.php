<?php

namespace App\Traits;

trait HandlesFavorites
{
    public function addToFavorites($job)
    {
        $favorites = session('favorites', []);

        if (!in_array($job->id, $favorites)) {
            $favorites[] = $job->id;
        }

        session(['favorites' => $favorites]);

        return back()->with('success', 'Вакансия добавлена в избранное!');
    }

    public function removeFromFavorites($job)
    {
        $favorites = session('favorites', []);

        $favorites = array_diff($favorites, [$job->id]);

        session(['favorites' => $favorites]);

        return back()->with('success', 'Вакансия удалена из избранного!');
    }
}