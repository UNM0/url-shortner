<?php

namespace App\Http\Controllers;

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
        Log::info('User has visited welcome page');
        $user = User::find(auth()->user()->id);
        Log::info($user);

        return view('backend.welcome', compact('user'));
    }

    public function links()
    {
        // $urls = auth()->user()->urls;
        // $urls = auth()->user()->urls;
        // $userId = (auth()->user()->id);
        // $urls = Url::where('user_id', $userId)->get();
        $user = auth()->user();
        $urls = $user->urls;

        return view('backend.view_links', compact('urls'));
    }

    public function create()
    {
        // $user = User::find(auth()->user()->id);
        return view('backend.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string',
            'orignal_url' => 'required|url',
        ]);
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
        dd($url);

        // dd($request->userAgent());
        // Log::error($url);
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

    public function analyze($id)
    {
        $url = Url::findOrFail($id);
        if ($url->id != auth()->id()) {
            abort(401);
        }
        // $user = User::find(auth()->user()->id);
        // $userId = User::find(auth()->user()->id);
        // $url = User::where('user_id', $userId)->get();

        return view('backend.analytics', compact('url'));
    }

    public function edit($id)
    {
        $user_id = auth()->id();
        $query = Url::where('user_id', $user_id)->where('id', $id)->first();
        // if (!$query) {
        //     abort(401);
        // }
        $url = Url::find($id);

        if ($url->id != auth()->id()) {
            abort(401);
        }
        Log::info($url);

        return view('backend.edit', compact('url'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string',
            'shortened_url' => 'required|string',
        ]);
        $url = Url::findOrFail($id);
        if ($url->id != auth()->id()) {
            abort(401);
        }
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

    public function upload_page()
    {
        return view('backend.upload');
    }

    public function upload(Request $request)
    {
        // Log::info('file-upload');
        $request->validate([
            'file' => 'required|image',
        ]);
        // dd($request);
        $path = $request->file('file')->store('images');

        // dump($request);
        return redirect()->back()->with('path', $path);
    }
}
