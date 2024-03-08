<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    public function welcome()
    {
        return view('backend.welcome');
    }

    public function links()
    {
        $urls = Url::latest()->get();

        return view('backend.view_links', compact('urls'));
    }

    public function create()
    {
        return view('backend.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string',
            'orignal_url' => 'required|url',
        ]);

        $title = $request->input('title');
        $orignalUrl = $request->input('orignal_url');
        $shortenedUrl = Str::random(7);

        $url = new Url;
        $url->title = $title;
        $url->orignal_url = $orignalUrl;
        $url->shortened_url = $shortenedUrl;
        $url->save();

        return redirect(route('fast_url.links'))->with('success', 'Your link has been shortened successfully');
    }

    public function redirect($shortenedUrl)
    {
        $url = Url::where('shortened_url', $shortenedUrl)->first();

        if ($url) {
            return redirect($url->orignal_url);
        } else {
            abort(404);
        }
    }

    public function edit($id)
    {
        $url = Url::find($id);

        return view('backend.edit', compact('url'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string',
            'shortened_url' => 'required|string',
        ]);
        $url = Url::findOrFail($id);
        $url->title = $request->input('title');
        $url->shortened_url = $request->input('shortened_url');
        $url->save();

        return to_route('fast_url.links')->with('success', 'Edited successfully');
    }

    public function destroy($id)
    {
        $url = Url::findOrFail($id);
        $url->delete();

        return to_route('fast_url.links')->with('success', 'Edited successfully');
    }
}
