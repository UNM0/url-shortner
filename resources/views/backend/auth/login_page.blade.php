@extends('backend.auth.layouts.app')
@section('pagetitle', 'Login')
@section('content')
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="relative flex h-screen place-content-center bg-primary-color">
            <div class="absolute flex text-center bg-gray-600 rounded-md top-36">
                <div class="grid justify-center gap-5 p-10 outline-none place-content-center">
                    <div class="flex justify-center">
                        <img src="{{ asset('img/trimly1.png') }}" class="h-20" alt="">
                    </div>
                    {{-- @dd(Session()->all()) --}}
                    <h1 class="text-white">Enter your email and password to login</h1>
                    <div class="grid">
                        @error('email')
                            <span class="mb-2 text-left text-red-400">{{ $message }}</span>
                        @enderror
                        <input type="text" name="email" placeholder=" Email" value="{{ old('email') }}"
                            class="py-2 px-3 text-white @error('email')border-red-600 placeholder:text-red-400 @enderror h-10 bg-transparent border-2 border-gray-400 rounded-md outline-none placeholder:text-white border-primary-color w-72">
                    </div>
                    <div class="grid">
                        @error('password')
                            <span class="mb-2 text-left text-red-400">{{ $message }}</span>
                        @enderror
                        <input type="text" name="password" placeholder=" Password"
                            class="py-2 px-3 text-white @error('password')border-red-600 placeholder:text-red-400 @enderror h-10 bg-transparent border-2 border-gray-400 rounded-md outline-none placeholder:text-white border-primary-color w-72">
                    </div>
                    <button type="submit"
                        class="py-2 font-bold text-white bg-gray-800 rounded-md hover:bg-gray-900 w-72 ">Login
                    </button>
                    <a href="{{ route('signup') }}"
                        class="py-2 font-bold text-white bg-gray-800 rounded-md hover:bg-gray-900 w-72">
                        Create New Account
                    </a>
                </div>
            </div>
    </form>
@endsection
