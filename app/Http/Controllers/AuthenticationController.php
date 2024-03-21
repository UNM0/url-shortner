<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLoginRequest;
use App\Http\Requests\CreateSignupRequest;
use App\Models\User;
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

    public function signup(CreateSignupRequest $request)
    {

        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return to_route('login')->with('status', 'Account has been signed up successfully');
    }

    public function login_form()
    {
        return view('backend.auth.login_page');
    }

    public function login(CreateLoginRequest $request)
    {

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // dd($credentials);
            return redirect()->intended('admin/home')->with('status', 'you have been logged in successfully');
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
