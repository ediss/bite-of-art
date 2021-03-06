<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class CustomLoginController extends Controller
{
    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {

        // Validate the form data

        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

        // Attempt to log the user in
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            if(Auth::user()->role_id == 1) {
                return redirect()->intended(route('moderator.dashboard', app()->getLocale()));
            }

            elseif(Auth::user()->role_id == 2 && Auth::user()->approved == 1){
                return redirect()->intended(route('gallerist.dashboard', app()->getLocale()));
            }

            elseif(Auth::user()->role_id == 2 && Auth::user()->approved == 0){
                return redirect()->back()->withErrors(['msg' => 'You are not approved yet!']);
            }
        }

        //  if unsuccessful then redirect back to login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
