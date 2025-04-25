<?php

namespace App\Http\Controllers;

use App\Models\Employer;

class EmployerController
{
    public function index()
    {
        $employers = Employer::paginate(3);
        return view('employers', compact('employers'));
    }

    public function show(Employer $employer)
    {
        $employer->load(['jobs', 'reviews.user']); 
        return view('employer', ['employer' => $employer, 'reviews' => $employer->reviews()->latest()->paginate(5)]);
    }
}
