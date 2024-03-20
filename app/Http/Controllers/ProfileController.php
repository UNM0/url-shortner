<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit_profile()
    {
        return view('backend.settings');
    }

    public function update_profile(UpdateProfileRequest $request)
    {
        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('status', 'Profile has been update successfully');
    }
}
