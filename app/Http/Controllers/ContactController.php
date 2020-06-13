<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMe;
use App\Mail\Contact;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store()
    {
        request()->validate(['email' => 'required|email']);


        // memo: 文字列で送りたい場合
        // Mail::raw('It works!', function ($message) {
        //     $message->from('tanos@tanos.com', 'tanos');
        //     $message->to(request('email'));
        //     $message->subject('Hello There');
        // });

        // memo: htmlで送る場合
        // Mail::to(request('email'))->send(new ContactMe('shirts'));

        // memo: マークダウンで送る場合
        Mail::to(request('email'))->send(new Contact());


        return redirect('/contact')->with('message', 'Email sent!'); // with()でflashメッセージ定義

    }
}
