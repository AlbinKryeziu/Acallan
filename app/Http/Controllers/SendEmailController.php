<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
    function index()
    {
        return view('contact-us');
    }

    function send(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'need' => $request->need,
            'message' => $request->message,
        ];

        Mail::to('art.kujtimi@hotmail.com')->send(new SendMail($data));
        return back()->with('success', 'Thanks for contacting us!');
    }
}
