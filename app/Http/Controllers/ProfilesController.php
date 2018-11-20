<?php

namespace App\Http\Controllers;
use App\Mail\VerifyMail as vMail;
use Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Carbon\Carbon;
use App\VerifyUser;
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
        $user = User::where('email', $request->email)->first();
        
        if ($user != null) {
            flash('Account already exits, please login');

            return redirect('/login');
        }

        $this->validate($request, [
            'f_name' => 'required|max:80',
            'm_name' => 'nullable|max:80',
            'l_name' => 'required|max:80',
            'email' => 'required',
            'password' => 'required',
            'confirmed_password' => 'required',
            'gender' => 'required|in:male,female,other',
            'confirmed_password' => 'required',
            'dob' => 'required',
            'phone' => 'required|digits_between:11,14'
        ]);

        $now = new Carbon;
        $dob = Carbon::parse($request->dob);

        if ($dob->diffInYears($now) < 18) {
            flash('Sorry, you cannot register unless you are 18 years of age')->error();

            return redirect('/');
        }

        $profile = new Profile;
        $user = new User;
        $user->role = $request->role;

        if ($request->email == 'mobashir@techynaf.com') {
            $user->role = 'super-admin';
        }

        if ($request->password != $request->confirmed_password) {
            flash('The passwords do not match.')->error();

            $this->validate($request, [
                'Passwords' => 'required',
            ]);
        }

        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $profile->user_id = $user->id;
        $profile->f_name = $request->f_name;
        $profile->m_name = $request->m_name;
        $profile->l_name = $request->l_name;
        $profile->phone = $request->phone;
        $profile->dob = $request->dob;
        $profile->gender = $request->gender;
        $profile->address = 'nada';
        $profile->division = 'nada';
        $profile->fb_url = $request->fb_link;
        $profile->save();

        $t = date('Ymd').time().$user->id;
        $token = md5(uniqid($t, true));

        while (true) {
            $u = VerifyUser::where('token', $token)->first();

            if ($u == null) {
                break;
            } else {
                $t = date('Ymd').time().$user->id;
                $token = md5(uniqid($t, true));
            }
        }

        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => $token,
        ]);

        Auth::login($user);

        Mail::to($user->email)->send(new vMail($user));

        auth()->logout();

        flash('Please verify your email before you can login')->success();

        return redirect('/');
    }

    public function verify (Request $request, $token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        $status = null;
        $now = new Carbon;
        $validity = Carbon::parse($verifyUser->updated_at);

        if (isset($verifyUser)) {
            $user = $verifyUser->user;
            
            if (!$user->verified) {
                if ($now->diffInHours($validity) > 1) {
                    $t = date('Ymd').time().$user->id;
                    $token = md5(uniqid($t, true));

                    while (true) {
                        $u = VerifyUser::where('token', $token)->first();

                        if ($u == null) {
                            break;
                        } else {
                            $t = date('Ymd').time().$user->id;
                            $token = md5(uniqid($t, true));
                        }
                    }

                    $verifyUser->token = $token;
                    $verifyUser->save();

                    Mail::to($user->email)->send(new vMail($user));

                    $status = "Sorry, your verify user token is no longer valid. A new email has been sent, please use that link";
                } else {
                    $user->verified = 1;
                    $user->save();

                    $status = "Email verified";

                    Auth::login($user);
                }
            } else {
                $status = "Your email has already been verified";
            }
        } else {
            $status = "Sorry, your email could not be verified";
        }

        flash($status);

        return redirect('/');
    }

    public function social (Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'dob' => 'required|date',
            'gender' => 'required',
        ]);

        $user = User::where('id', $request->id)->first();
        $profile = new Profile;
        $name = explode(' ', $request->name);
        $profile->f_name = $name[0];
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
        $profile->dob = $request->dob;
        $profile->gender = $request->gender;
        $profile->save();

        Auth::login($user);

        flash('Welcome to Ecube!')->success();

        return redirect('/');
    }

    public function dashboard ()
    {
        $user = auth()->user();

        return view('profiles/dashboard')->with('user', $user)->with('footer', $this->footer());
    }

    public function name (Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $profile = Profile::find(auth()->user()->id);

        $name = explode(' ', $request->name);
        $profile->f_name = $name[0];

        if (sizeof($name) == 1) {
            $profile->l_name = '---';

            if ($profile->m_name != null) {
                $profile->m_name = null;
            }
        } elseif (sizeof($name) == 2) {
            $profile->l_name = $name[1];

            if ($profile->m_name != null) {
                $profile->m_name = null;
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
            flash('Sorry, the password did not match our records.')->error();

            return redirect('home');
        }

        $user->email = $request->email;
        $user->save();

        return redirect('home');
    }

    public function address (Request $request)
    {
        $profile = auth()->user()->profile;
        $profile->address = 'nada';
        $profile->division = 'nada';
        $profile->save();

        return redirect('/home');
    }

    public function phone (Request $request)
    {
        $this->validate($request, [
            'phone' => 'required',
        ]);

        $profile = auth()->user()->profile;
        $profile->phone = $request->phone;
        $profile->save();

        return redirect('/home');
    }

    public function facebook (Request $request)
    {
        $this->validate($request, [
            'fb_url' => 'required',
        ]);

        $profile = auth()->user()->profile;
        $profile->fb_url = $request->fb_url;
        $profile->save();

        return redirect('/home');
    }

    public function password (Request $request)
    {
        $user = auth()->user();

        if (!Hash::check($request->current, $user->password)) {
            flash('Sorry, the password did not match our records.')->error();

            return redirect('home');
        }


        if ($request->next != $request->confirm) {
            flash('The new password entered do not match.')->error();
            return redirect('home');
        }

        $user->password = bcrypt($request->next);
        $user->save();

        flash('Password successfully changed')->success();

        return redirect('home');
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
            flash('You are not authrized to access this view')->error();
            return redirect('/');
        }

        return view('profiles/admin');
    }

    public function adminStore (Request $request)
    {
        if (auth()->user()->role != 'super-admin') {
            flash('You are not authrized to access this view')->error();
            return redirect('/');
        }

        $this->validate($request, [
            'f_name' => 'required|max:80',
            'm_name' => 'nullable|max:80',
            'l_name' => 'required|max:80',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'phone' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user != null) {
            flash('User with this email address already exists')->error();

            return redirect('/create/admin');
        }

        $user = new User;
        $profile = new Profile;

        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->verified = 1;
        $user->save();

        $profile->user_id = $user->id;
        $profile->f_name = $request->f_name;
        $profile->m_name = $request->m_name;
        $profile->l_name = $request->l_name;
        $profile->phone = $request->phone;
        $profile->save();

        flash('Admin successfully created')->success();

        return redirect('/home');
    }

    public function showAll (Request $request)
    {
        if (auth()->user()->role != 'super-admin') {
            flash('You are not authorized to access this')->error();

            return redirect('/home');
        }

        $users = User::where('role', 'normal')->paginate(15);
        $flow = true;

        if ($request->role == 'admin') {
            $users = User::where('role', 'admin')->paginate(15);
            $flow = false;
        }

        return view('profiles/show-all')->with('users', $users)->with('flow', $flow);
    }

    public function del (Request $request, $id)
    {
        if (auth()->user()->role != 'super-admin') {
            flash('You are not authorized to access this page')->error();

            return redirect('/home');
        }

        $user = User::find($id);
        $profile = Profile::find($user->id);

        $user->delete();
        $profile->delete();

        flash('Admin account successfully deleted')->success();

        return redirect('/profile/show-all');
    }
}
