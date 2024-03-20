<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUrlRequest;
use App\Http\Requests\UpdateUrlRequest;
use App\Models\Url;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    public function welcome()
    {
        // Log::info('User has visited welcome page');
        $user = User::find(auth()->user()->id);
        // Log::info($user);

        return view('backend.welcome', compact('user'));
    }

    public function links()
    {

        $user = auth()->user();
        $urls = $user->urls()->latest()->get();

        return view('backend.view_links', compact('urls'));
    }

    public function create(CreateUrlRequest $request)
    {
        return view('backend.create');
    }

    public function store(CreateUrlRequest $request)
    {
        $user = auth()->user()->id;
        $title = $request->input('title');
        $orignalUrl = $request->input('orignal_url');
        $shortenedUrl = Str::random(7);

        $url = new Url;
        $url->user_id = $user;
        $url->title = $title;
        $url->orignal_url = $orignalUrl;
        $url->shortened_url = $shortenedUrl;
        $url->save();

        return to_route('fast_url.links')->with('success', 'Your link has been shortened successfully');
    }

    public function redirect(Request $request, $shortenedUrl)
    {
        $url = Url::where('shortened_url', $shortenedUrl)->first();
        if ($url) {
            Visitor::create([
                'url_id' => $url->id,
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            $url->increment('visitor_count');


            return redirect()->away($url->orignal_url);
        }
        abort(404);
    }

    public function analyze(UpdateUrlRequest $request, $id)
    {
        $url = Url::findOrFail($id);
        // if ($url->id != auth()->id()) {
        //     abort(401);
        // }
        // $user = User::find(auth()->user()->id);
        // $userId = User::find(auth()->user()->id);
        // $url = User::where('user_id', $userId)->get();

        return view('backend.analytics', compact('url'));
    }

    public function edit(UpdateUrlRequest $request, $id)
    {
        // $user_id = auth()->id();
        // $query = Url::where('user_id', $user_id)->where('id', $id)->first();
        // // if (!$query) {
        // //     abort(401);
        // // }
        $url = Url::findOrFail($id);

        // if ($url->id != auth()->id()) {
        //     abort(401);
        // }
        // Log::info($url);

        return view('backend.edit', compact('url'));
    }

    public function update(UpdateUrlRequest $request, $id)
    {
        // $request->validate([
        //     'title' => 'nullable|string',
        //     'shortened_url' => 'required|string',
        // ]);
        $url = Url::findOrFail($id);
        // if ($url->id != auth()->id()) {
        //     abort(401);
        // }
        $url->title = $request->input('title');
        $url->shortened_url = $request->input('shortened_url');
        $url->save();

        return to_route('fast_url.links')->with('success', 'Edited successfully');
    }

    public function destroy($id)
    {
        $url = Url::findOrFail($id);
        if ($url->id != auth()->id()) {
            abort(401);
        }
        $url->delete();

        return to_route('fast_url.links')->with('success', 'Edited successfully');
    }
}
