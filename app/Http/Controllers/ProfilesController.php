<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
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
        
        return view('profiles/register')->with('footer', $this->footer());
    }

    public function create (Request $request)
    {
        $profile = new Profile;
        $user = new User;

        if ($request->email == 'mobashir@techynaf.com') {
            $user->role = 'super-admin';
        } else {
            $user->role = $request->role;
        }

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

    public function dashboard ()
    {
        $user = auth()->user();

        return view('profiles/dashboard')->with('user', $user)->with('footer', $this->footer());
    }

    public function name (Request $request)
    {
        $profile = Profile::find(auth()->user()->id);

        $name = explode(' ', $request->name);
        $profile->f_name = $name[0];

        dd($name);


        if (sizeof($name) == 1) {
            $profile->l_name = '---';
        } elseif (sizeof($name) == 2) {
            $profile->l_name = $name[1];

            if ($profile->m_name != null) {
                $profile->m_name == null;
            }

        } else {
            $profile->l_name = $name[sizeof($name) - 1];
            $x = '';

            for ($i = 1; $i <= sizeof($name) - 2; $i++) {
                $x = $x.$name[$i];
            }

            $profile->m_name = $x;
        }

        $profile->save();

        return redirect('home');
    }

    public function email (Request $request)
    {
        $user = auth()->user();

        if (!Hash::check($request->password, $user->password)) {
            return redirect('home')->with('error', 'Sorry, the password did not match our records.');
        }

        $user->email = $request->email;
        $user->save();

        return redirect('home');
    }

    public function address (Request $request)
    {
        $profile = auth()->user()->profile;
        $profile->address = $request->address;
        $profile->save();

        return redirect('/home');
    }

    public function phone (Request $request)
    {
        $profile = auth()->user()->profile;
        $profile->phone = $request->phone;
        $profile->save();

        return redirect('/home');
    }

    public function password (Request $request)
    {
        $user = auth()->user();

        if (!Hash::check($request->current, $user->password)) {
            return redirect('home')->with('error', 'Sorry, the password did not match our records.');
        }


        if ($request->next != $request->confirm) {
            return redirect('home')->with('error', 'The new password entered do not match.');
        }

        $user->password = bcrypt($request->next);
        $user->save();

        return redirect('home')->with('success', 'Password successfully changed');
    }

    public function delete ()
    {
        return view('profiles/delete')->with('footer', $this->footer());
    }

    public function destroy ()
    {
        $user = auth()->user();
        $profile = $user->profile;
        $fb = $user->facebook;

        if ($fb != null) {
            $fb->delete();
        }

        $profile->delete;
        $user->delete();

        return redirect('/');
    }

    public function adminCreate () {
        if (auth()->user()->role != 'super-admin') {
            return redirect('/')->with('error', 'You are not authrized to access this view');
        }

        return view('profiles/admin');
    }
}
