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
        try {
            \Mail::send(
                'dynamic_email_template',
                [
                    'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'need' => $request->need,
            'message' => $request->message,
            'phone'=>$request->phone
                    
                ],
                function ($message) use ($request) {
                    $message->from('albinkryeziu21@gmail.com');
                    $message->to('promeedrep@gmail.com')->subject('New contact From' . ' ' . $request->name);
                }
            );
        } catch (ModelNotFoundException $e) {
            return back()->with('error', [$e->getMessage()]);
        }
        return back()->with('success', 'Message sent successfully. Thank you for contacting us');

        
    }
}
