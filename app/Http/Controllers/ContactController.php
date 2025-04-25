<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmitted;

class ContactController
{
    public function create()
    {
        return view('contact');
    }

    public function store(ContactRequest $request)
    {
        Mail::to('admin@example.com')->send(new ContactFormSubmitted($request->validated()));

        return redirect()->route('contact.create')->with('success', 'Ваше сообщение успешно отправлено!');
    }
}