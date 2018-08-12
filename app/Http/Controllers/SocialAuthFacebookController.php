<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\Profile;

class SocialAuthFacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        $account = Socialite::driver('facebook')->stateless()->user();
        $user = User::where('email', $account->email)->first();

        if ($user == null) {
            $user = new User;
            
            if ($account->email == 'mobashirmonim@gmail.com') {
                $user->role = 'admin';
            } else {
                $user->role = 'normal';
            }

            $user->email = $account->email;
            $user->password = bcrypt($account->id);
            $user->save();

            return view('profiles/social-register')->with('name', $account->name)->with('id', $user->id);
        } else {
            Auth::login($user);
        }

        return redirect('/')->with('success', 'Welcome to Ecube!');
    }
}
