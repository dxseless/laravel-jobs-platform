<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, Employer $employer)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'rating' => 'required|integer|between:1,5',
        ]);

        Review::create([
            'employer_id' => $employer->id,
            'user_id' => Auth::id(),
            'content' => $request->content,
            'rating' => $request->rating,
        ]);

        return redirect()->back()->with('success', 'Отзыв успешно добавлен.');
    }

    public function index(Employer $employer)
    {
        $reviews = $employer->reviews()->latest()->paginate(5);
        return view('reviews.index', compact('employer', 'reviews'));
    }
}
