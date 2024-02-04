<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function contact(Request $request) {
        $data = [
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
        ];

        Mail::to('brainster@brainster.co')->send(new ContactMail($data));
        return redirect()->route('home');
    }
}
