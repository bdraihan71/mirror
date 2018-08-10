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
        $account = Socialite::driver('facebook')->user();
        $user = User::where('email', $account->email)->first();

        if ($user == null) {
            $user = new User;
            $user->email = $account->email;
            $user->password = bcrypt($account->id);
            $user->save();

            $profile = new Profile;
            $name = split(' ', $account->name);
            $profile->f_name = $name[0];

            if (sizeof($name) == 1) {
                $profile->l_name = '---';
            } elseif (sizeof($name) == 2) {
                $profile->l_name = $name[1];
            } else {
                $profile->l_name = $name[sizeof($name) - 1];
                $x = '';

                for ($i = 1; $i <= sizeof($name) - 2; $i++) {
                    $x = $x.$name[$i];
                }

                $profile->m_name = $x;
            }

            $profile->user_id = $user->id;
            $profile->save();

            Auth::login($user);
        } else {
            Auth::login($user);
        }

        return redirect('/')->with('success', 'Welcome to Ecube!');
    }
}
