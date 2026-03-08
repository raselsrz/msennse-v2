<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\UserNotification;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    //add
    public function add()
    {
        return view('admin.pages.mail.add');
    }


    public function sendEmail(Request $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];

        Mail::to($details['email'])->send(new UserNotification($details));

        return redirect()->route('admin.mail.add')->with('success', 'Email has been sent successfully!');
    }
}

