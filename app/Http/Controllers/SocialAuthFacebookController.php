<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use App\Services\SocialFacebookAccountService;
use Socialite;
use Auth;
class SocialAuthFacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(SocialFacebookAccountService $service)
    {
        $account = Socialite::driver('facebook')->user();
        $user = User::where('email', $account->email)->first();
        dd($account);

        if ($user == null) {
            $user = new User;
            $user->email = $account->email;
            $user->password = bcrypt($account->id);
            $user->save();

            Auth::login($user);
        } else {
            Auth::login($user);
        }

        return redirect('/')->with('success', 'Welcome to Ecube!');
    }
}
