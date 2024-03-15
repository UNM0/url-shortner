@extends('backend.layouts.app')
@section('pagetitle', 'Profile Settings')
@section('content')
    <div class="m-14">
        <h1 class="text-2xl font-bold pb-5">Your Fast URL Shortener</h1>
        <div class="grid place w-[70%]">
            <div class="bg-gray-600 p-5 rounded-md">
                <h1 class="py-3 mb-5 text-white text-xl font-bold ">Preferences</h1>
                <form action="{{ route('fast_url.create') }}" method="POST">
                    @csrf
                    <label for="name" class="text-white">Display Name</label><br>
                    @error('name')
                        <span class="text-red-300 text-sm mt-2 font-semibold">{{ $message }}</span>
                    @enderror
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="bg-transparent border border-black w-full mt-2 outline-none h-10 rounded mb-5 @error('name') border-red-300
                        @enderror"
                        placeholder=" " value=" Nunam">
                    <label for="email" class="text-white">Email <label><br>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="bg-transparent border border-black w-full mt-2 outline-none h-10 rounded"
                                placeholder=" ">
                            <div class="btns mt-5 flex gap-7">
                                <button class="bg-gray-800 hover:bg-gray-700 text-white py-2 rounded-md w-1/4"
                                    type="submit"><i class="fa-light fa-plus-large"></i> Create Link</button>
                                <button class="bg-red-400 text-black hover:bg-red-500 py-2 rounded-md w-1/4"
                                    type="reset"><i class="fa-light fa-trash"></i> Cancel</button>
                            </div>
                </form>
            </div>
        </div>
    </div>

@endsection
