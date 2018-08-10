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

        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $profile->user_id = $user->id;
        $profile->f_name = $request->f_name;
        $profile->m_name = $request->m_name;
        $profile->l_name = $request->l_name;
        $profile->job_title = $request->job_title;
        $profile->company = $request->company;
        $profile->c_website = $request->company_website;
        $profile->country = $request->country;
        $profile->industry = $request->industry;
        $profile->blog_url = $profile->blog_url;
        $profile->save();

        Auth::login($user);

        return redirect('/')->with('success', 'Welcome to Ecube!');
    }
}
