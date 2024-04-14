<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUrlRequest;
use App\Http\Requests\UpdateUrlRequest;
use App\Models\Url;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Events\UrlCreation;
use App\Jobs\SendUrlCreatedMailJob;
use App\Mail\UrlCreatedMail;
use App\Mail\UrlCreatedMarkdownMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class UrlController extends Controller
{
    public function welcome()
    {
        // abort(404);
        // Log::info('User has visited welcome page');
        $user = User::find(auth()->user()->id);
        // Log::info($user);

        return view('backend.welcome', compact('user'));
    }

    public function create(CreateUrlRequest $request)
    {
        return view('backend.create');
    }

    public function store(CreateUrlRequest $request)
    {
        // $user = auth()->user()->id;
        // $title = $request->input('title');
        // $orignalUrl = $request->input('orignal_url');
        // $shortenedUrl = Str::random(7);

        // $url = new Url;
        // // $url->user_id = $user;
        // $url->title = $title;
        // $url->orignal_url = $orignalUrl;
        // $url->shortened_url = $shortenedUrl;
        // $url->save();
        // dump($request);
        $shortened_url = Str::random(6);
        $url = Url::create([
            // 'user_id' =>  auth()->user()->id,
            'title' => $request->title,
            'orignal_url' => $request->orignal_url,
            'shortened_url' => $shortened_url,
        ]);
        if (Cache::forget('urls')) {
            Log::info('Cache forgot succesfully upon creating a new Short Url');
        }

        //html mail
        $user = auth()->user();
        // Mail::to($user)->send(new UrlCreatedMail($url));
        //endhtmlmail
        //mail markdown
        // $user = auth()->user();
        // Mail::to($user)->send(new UrlCreatedMarkdownMail($url));
        //endmailmarkdown
        // dump($url);
        // dd(UrlCreation::dispatch($url));
        // UrlCreation::dispatch($url);
        SendUrlCreatedMailJob::dispatch($user, $url);

        return to_route('fast_url.links')->with('status', 'Your link has been shortened successfully');
    }

    public function links()
    {
        //Cache ko normal use case to retrieve datas from cache and not from database
        // $user_id = auth()->id();
        // if (Cache::has('urls')) {
        //     Log::info('urls are present in the cache');
        //     $urls = Cache::get('urls');
        //     return $urls;
        // } else {
        //     Log::info('urls are not present in the cache');
        //     return Url::where('user_id', $user_id)->get();
        //     Cache::set('urls', $urls);
        //     return Cache::get('urls');
        // }

        // Extracted Method of the above cache method
        $user_id = auth()->id();

        $urls = Cache::remember('urls', 60, function () use ($user_id) {
            Log::info('im fetching the datas from the database using cache extracted method');
            return Url::where('user_id', $user_id)->latest()->paginate(5);
        });
        $count = Url::where('user_id', $user_id)->count();

        return view('backend.view_links', compact('urls', 'count'));
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

        $url = Url::findOrFail($id);
        $url->title = $request->input('title');
        $url->shortened_url = $request->input('shortened_url');
        $url->save();
        if (Cache::forget('urls')) {
            Log::info('Cache forgot succesfully upon editing the selected Short Url');
        }

        $user = auth()->user();
        Mail::to($user)->send(new UrlCreatedMarkdownMail($url));

        return to_route('fast_url.links')->with('status', 'Edited successfully');
    }

    public function destroy(Request $request, $id)
    {

        $url = Url::findOrFail($id);
        if ($url->user_id != auth()->user()->id) {
            Log::error('u r not authorized');
            abort(401);
        }
        $url->delete();
        Log::info('Url has been deleted successfully');

        // $request->session()->flash('Status', 'Successfully deleted the URL');

        if (Cache::forget('urls')) {
            Log::info('Cache forget successfully upon deleting the chosen url');
        };

        return to_route('fast_url.links')->with('status', 'Edited successfully');
    }
}
