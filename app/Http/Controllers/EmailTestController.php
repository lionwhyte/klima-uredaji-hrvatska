<?php

namespace App\Http\Controllers;

use App\Mail\EmailTest;
use Illuminate\Support\Facades\Mail;


class EmailTestController extends Controller
{
    public function sendTestEmail()
    {

        // Replace with a real user instance
        $user = "someone@mail.com";

        // Send the email
        Mail::to($user)->send(new EmailTest());

        return 'Test email sent to ' . $user;
    }
}