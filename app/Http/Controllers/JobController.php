<?php
namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     *
     * @param  Job  $job
     * @return \Illuminate\View\View
     */
    public function show(Job $job)
    {
        return view('show', ['job' => $job]);
    }

    /**
     *
     * @param  Job  $job
     * @return \Illuminate\Http\RedirectResponse
     */
    public function like(Job $job)
    {
        $likes = session('likes', []);

        if (!in_array($job->id, $likes)) {
            $likes[] = $job->id;
        }

        session(['likes' => $likes]);

        return back()->with('success', 'Вакансия добавлена в лайки!');
    }

    /**
     *
     * @param  Job  $job
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unlike(Job $job)
    {
        $likes = session('likes', []);

        // Удаляем ID вакансии из списка лайков
        $likes = array_diff($likes, [$job->id]);

        // Сохраняем обновленный список лайков в сессии
        session(['likes' => $likes]);

        // Перенаправляем обратно с сообщением об успехе
        return back()->with('success', 'Вакансия удалена из лайков!');
    }

    /**
     * Добавление вакансии в избранное.
     *
     * @param  Job  $job
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addToFavorites(Job $job)
    {
        // Получаем текущий список избранного из сессии
        $favorites = session('favorites', []);

        // Добавляем ID вакансии в список избранного, если его еще нет
        if (!in_array($job->id, $favorites)) {
            $favorites[] = $job->id;
        }

        // Сохраняем список избранного в сессии
        session(['favorites' => $favorites]);

        // Перенаправляем обратно с сообщением об успехе
        return back()->with('success', 'Вакансия добавлена в избранное!');
    }

    /**
     * Удаление вакансии из избранного.
     *
     * @param  Job  $job
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeFromFavorites(Job $job)
    {
        // Получаем текущий список избранного из сессии
        $favorites = session('favorites', []);

        // Удаляем ID вакансии из списка избранного
        $favorites = array_diff($favorites, [$job->id]);

        // Сохраняем обновленный список избранного в сессии
        session(['favorites' => $favorites]);

        // Перенаправляем обратно с сообщением об успехе
        return back()->with('success', 'Вакансия удалена из избранного!');
    }
}