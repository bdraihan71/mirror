<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Socialite;
use Auth;
use Exception;

class SocialAuthGoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }


    public function callback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $existUser = User::where('email',$googleUser->email)->first();

        if($existUser != null) {
            if (count($existUser->profile) == 0) {
                return view ('profiles/social-register')->with('name', $account->name)->with('id', $existUser->id)->with('footer', $this->footer());
            }

            Auth::loginUsingId($existUser->id);
        }
        else {
            $user = new User;

            if ($googleUser->email == 'mobashirmonim@gmail.com') {
                $user->role = 'super-admin';
            } else {
                $user->role = 'normal';
            }

            $user->email = $googleUser->email;
            $user->verified = 1;
            $user->google_id = $googleUser->id;
            $user->password = md5($googleUser->id);
            $user->save();
            
            return view('profiles/social-register')->with('name', $googleUser->name)->with('id', $user->id)->with('footer', $this->footer());
        }

        return redirect()->to('/');
    }
}
