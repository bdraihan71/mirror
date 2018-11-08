<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class VerifyAdminsController extends Controller
{
    public function verify ()
    {
        $admins = User::where('role', 'admin')->where('verified', false)->get();
        $supers = User::where('role', 'super-admin')->where('verified', false)->get();

        if (count($admins) != 0 || count($supers) != 0) {
            foreach ($admins as $admin) {
                $admin->verified = 1;
                $admin->save();
            }
    
            foreach ($supers as $super) {
                $super->verified = 1;
                $super->save();
            }
    
            flash('All admin accounts have been verified')->success();
        } else {
            flash('All admin accounts are already verified');
        }

        return redirect('/');
    }
}
