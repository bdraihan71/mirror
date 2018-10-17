<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Mail;
use App\Mail\VerifyMail as vMail;

class VerifyEmailController extends Controller
{
    public function resend ()
    {
        return view ('emails.resend-verification');
    }

    public function send (Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user->verified == 1) {
            flash('Your email is already verified, please login')->success();

            return redirect('/login');
        } else {
            Mail::to($user->email)->send(new vMail($user));

            flash('Verification email has been resent, please verify your email now.')->success();

            return redirect('/');
        }
    }
}
