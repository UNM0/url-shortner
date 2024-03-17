@extends('backend.layouts.app')
@section('pagetitle', 'Dashboard')
@section('content')
    {{-- @dd(Session::all()) --}}
    @include('backend.partials.hero')
@endsection
