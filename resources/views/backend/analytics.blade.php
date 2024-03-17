@extends('backend.layouts.app')
@section('pagetitle', 'Analyze you links')
@section('content')
    <div class="m-12">
        <h1 class="pb-5 text-2xl font-bold"> Analyze your links!</h1>
        <div class="grid gap-2 p-5 bg-gray-600">
            <div class="">
                <p class="pr-5 font-semibold">
                    Title : <span class="text-xl font-bold"> {{ $url->title }}</span>
                </p>

            </div>
            <div class="">
                <p class="pr-5 font-semibold">
                    Shortened URL : <a href="{{ $url->shortened_url }}" class="text-lg text-blue-500 font- hover:underline">
                        {{ $url->shortened_url }}</a>
                </p>

            </div>
            <p class="pr-5 font-semibold">
                Visitor Count : <a href="{{ $url->shortened_url }}" class="text-lg text-blue-500 font- hover:underline">
                    {{ $url->visitor_count }}</a>
            </p>
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
    </div>
@endsection
