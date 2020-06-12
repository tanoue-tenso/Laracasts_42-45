<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store()
    {
        request()->validate(['email' => 'required|email']);


        Mail::raw('It works!', function ($message) {
            $message->from('tanos@tanos.com', 'tanos');
            $message->to(request('email'));
            $message->subject('Hello There');
        });

        return redirect('/contact')->with('message', 'Email sent!'); // with()でflashメッセージ定義

    }
}
