<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Auth;

class ProfilesController extends Controller
{
    public function register ()
    {
        if (auth()->user() != null) {
            return redirect('/');
        }
        
        return view('profiles/register');
    }

    public function create (Request $request)
    {
        $profile = new Profile;
        $user = new User;
        $user->role = 'normal';
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $profile->user_id = $user->id;
        $profile->f_name = $request->f_name;
        $profile->m_name = $request->m_name;
        $profile->l_name = $request->l_name;
        $profile->phone = $request->phone;
        $profile->address = $request->address;
        $profile->save();

        Auth::login($user);

        return redirect('/')->with('success', 'Welcome to Ecube!');
    }

    public function social (Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $profile = new Profile;
        $name = explode(' ', $request->name);
        $profile->f_name = $name[0];
        $profile->phone = $request->phone;
        $profile->address = $request->address;

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

        return redirect('/')->with('success', 'Welcome to Ecube!');
    }
}
