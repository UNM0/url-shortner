<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{
    public function signup_form()
    {
        // Auth()->logout();
        // dd(Auth());
        // dd(Session::all());
        return view('backend.auth.signup_page');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:90',
            'email' => 'required|email',
            'password' => 'required|min:6|max:15|confirmed',
            'password_confirmation' => 'required',
        ]);
        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // $this->login($request);
        // dd(Auth()->user());
        // dd(Session::all());
        return to_route('login')->with('status', 'Account has been signed up successfully');
    }

    public function login_form()
    {
        return view('backend.auth.login_page');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // dd($credentials);
            return redirect()->intended(to_route('fast_url.welcome'))->with('status', 'you have been logged in successfully');
        }

        // dd(Session());
        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
            'approve' => 'Wrong password or this account not approved yet.',
        ]);
    }

    public function logout()
    {
        Auth()->logout();

        return redirect()->route('login')->with('status', 'Account has been logout');
    }
}
