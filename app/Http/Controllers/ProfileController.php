<?php

namespace App\Http\Controllers;

use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);

        return view('backend.settings', compact('user'));
    }
}
