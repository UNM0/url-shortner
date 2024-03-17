@extends('backend.layouts.app')
@section('pagetitle', 'Profile Settings')
@section('content')
    <div class="m-14">
        <h1 class="pb-5 text-2xl font-bold">Your Fast URL Shortener</h1>
        <div class="grid place w-[70%]">
            <div class="p-5 bg-gray-600 rounded-md">
                <h1 class="py-3 mb-5 text-xl font-bold text-white ">Preferences</h1>
                <form action="{{ route('fast_url.create') }}" method="POST">
                    @csrf
                    <label for="name" class="text-white">Display Name</label><br>
                    @error('name')
                        <span class="mt-2 text-sm font-semibold text-red-300">{{ $message }}</span>
                    @enderror
                    <input type="text" name="name" value="{{ $user->name }}"
                        class="bg-transparent border border-black w-full mt-2 outline-none h-10 py-2 px-3 rounded mb-5 @error('name') border-red-300
                        @enderror"
                        placeholder=" Name" value=" Nunam">
                    <label for="email" class="text-white">Email <label><br>
                            <input type="email" name="email" value="{{ $user->email }}"
                                class="w-full h-10 px-3 py-2 mt-2 bg-transparent border border-black rounded outline-none"
                                placeholder=" Enter a valid email">
                            <div class="">
                                email verified at {{ $user->email_verified_at }}
                            </div>
                            <div class="flex mt-5 btns gap-7">
                                <button class="w-1/4 py-2 text-white bg-gray-800 rounded-md hover:bg-gray-700"
                                    type="submit"><i class="fa-light fa-pen-to-square"></i> Save Changes</button>
                                <button class="w-1/4 py-2 text-black bg-red-400 rounded-md hover:bg-red-500"
                                    type="reset"><i class="fa-light fa-trash"></i> Reset</button>
                            </div>
                </form>
            </div>
        </div>
    </div>

@endsection
