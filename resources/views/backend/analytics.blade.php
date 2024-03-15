@extends('backend.layouts.app')
@section('pagetitle', 'Analyze you links')
@section('content')
    <div class="m-12">
        <h1 class="pb-5 text-2xl font-bold"> Analyze your links!</h1>
        <div class="grid gap-2 p-5 bg-gray-600">
            <h1 class="text-xl font-bold">{{ $url->title }}</h1>
            <h1 class="text">{{ $url->shortened_url }}</h1>
            <h1 class="text">{{ $url->visitor_count }}</h1>
            <div class="grid gap-6">

                @foreach ($url->visitors as $visitor)
                    <h1> {{ $visitor->url_id }}</h1>
                    <h1> {{ $visitor->ip }}</h1>
                    <h1> {{ $visitor->user_agent }}</h1>
                    <h1>{{ $visitor->created_at->diffForHumans() }}</h1>
                @endforeach
            </div>
        </div>
    </div>
@endsection
