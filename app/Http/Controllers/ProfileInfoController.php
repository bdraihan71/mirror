<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileInfoController extends Controller
{
    public function store (Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $profile = new Profile;
        $profile->f_name = $request->f_name;
        $profile->m_name = $request->m_name;
        $profile->m_name = $request->l_name;
        $profile->phone = $request->phone;
        $profile->address = 'nada';
        $profile->division = 'nada';

        $now = new Carbon;
        $dob = Carbon::parse($request->dob);

        if ($dob->diffInYears($now) < 18) {
            $user->delete();

            flash('Sorry, you cannot register unless you are 18 years of age')->error();

            return redirect('/');
        }

        $profile->user_id = $user->id;
        $profile->dob = $request->dob;
        $profile->gender = $request->gender;
        $profile->save();

        Auth::login($user);

        return redirect('/');
    }
}
