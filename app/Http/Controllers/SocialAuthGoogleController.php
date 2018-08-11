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
            Auth::loginUsingId($existUser->id);
        }
        else {
            $user = new User;
            $user->email = $googleUser->email;
            $user->google_id = $googleUser->id;
            $user->password = md5($googleUser->id);
            $user->save();
            Auth::loginUsingId($user->id);

            $profile = new Profile;
            $name = explode(' ', $account->name);
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
        }
        
        return redirect()->to('/');
    }
}
