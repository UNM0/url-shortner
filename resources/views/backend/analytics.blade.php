@extends('backend.layouts.app')
@section('pagetitle', 'Analyze you links')
@section('content')
    <div class="m-12">
        <div class="grid justify-center gap-2 ">

            <h1 class="pb-5 text-2xl font-bold"> Analyze your link!</h1>
            <div class="grid p-5 bg-gray-600">

                <div class="">
                    <h1 class="text-3xl font-bold"> {{ $url->title }}</h1>
                </div>
                <div class="pr-5">
                    <a href="{{ route('fast_url.redirect', ['shortenedUrl' => $url->shortened_url]) }}" target="_blank"
                        class="text-lg text-blue-300 font- hover:underline">
                        {{ $url->shortened_url }}
                    </a>
                </div>
                <div class="pr-5">
                    <a href="{{ $url->orignal_url }}" target="_blank" class="text-sm text-white hover:underline">
                        {{ $url->orignal_url }}
                    </a>
                </div>
                <p class="pr-5 font-semibold">
                    Visitor Count <span class="text-3xl text-gray-300 pl-7">
                        {{ $url->visitor_count }}</a></span>
                <p>
                <div class="mt-4">
                    <p class="text-sm text-white"><i class="fa-light fa-clock"></i>
                        {{ $url->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <div class="">

                <table class="w-full p-3 text-left ">
                    <tr class="border border-collapse">
                        <th class="px-3 py-2">IP</th>
                        <th class="px-3 py-2">USER AGENT</th>
                    </tr>
                    @foreach ($url->visitors as $visitor)
                        <tr class="border border-collapse ">
                            <td class="px-2 py-3">{{ $visitor->ip }}</td>
                            <td class="px-2 py-3">{{ $visitor->user_agent }}</td>
                        </tr>
                    @endforeach

                </table>
            </div>
            <h1 class="mt-10 text-xl font-semibold text-red-600">Charts will be added after i finish learning</h1>
        </div>
    </div>
@endsection
