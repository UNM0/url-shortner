@extends('backend.auth.layouts.app')
@section('pagetitle', 'Signup')
@section('content')
    <form action="{{ route('signup') }}" method="POST">
        @csrf
        <div class="relative flex h-screen place-content-center bg-primary-color">
            <div class="absolute flex text-center bg-gray-600 rounded-md top-36">
                <div class="grid justify-center gap-5 p-10 outline-none place-content-center">
                    <h1 class="text-white">Please fill the form to signup</h1>
                    <div class="grid">
                        @error('name')
                            <span class="text-left text-red-400">{{ $message }}</span>
                        @enderror
                        <input type="text" name="name" placeholder=" Name"
                            class="text-white @error('name')border-red-600 placeholder:text-red-400 @enderror h-10 bg-transparent border-2 rounded-md outline-none placeholder:text-white border-primary-color w-72">
                    </div>

                    <div class="grid">
                        @error('email')
                            <span class="text-left text-red-400">{{ $message }}</span>
                        @enderror
                        <input type="email" name="email" placeholder=" Email"
                            class="text-white @error('email')border-red-600 placeholder:text-red-400 @enderror h-10 bg-transparent border-2 rounded-md outline-none placeholder:text-white border-primary-color w-72">
                    </div>
                    <div class="grid">
                        @error('password')
                            <span class="text-left text-red-400">{{ $message }}</span>
                        @enderror
                        <input type="text" name="password" placeholder=" Password"
                            class="text-white @error('password')border-red-600 placeholder:text-red-400 @enderror h-10 bg-transparent border-2 rounded-md outline-none placeholder:text-white border-primary-color w-72">
                    </div>
                    <div class="grid">
                        @error('password_confirmation')
                            <span class="text-left text-red-400">{{ $message }}</span>
                        @enderror
                        <input type="password" name="password_confirmation" placeholder=" Confirm Password"
                            class="text-white @error('password_confirmation')border-red-600 placeholder:text-red-400 @enderror h-10 bg-transparent border-2 rounded-md outline-none placeholder:text-white border-primary-color w-72">
                    </div>
                    <button type="submit"
                        class="h-10 font-bold text-white bg-gray-800 rounded-md hover:bg-gray-900 w-72 ">Signup</button>
                </div>
            </div>
    </form>
@endsection
