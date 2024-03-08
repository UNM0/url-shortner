@extends('backend.layouts.app')
@section('pagetitle', 'Create your link')
@section('content')
    <div class=" m-14">
        <h1 class="text-2xl font-bold pb-5">Your Fast URL Shortener</h1>
        <div class="grid place w-[70%]">
            <div class="bg-gray-600 p-5 rounded-md">
                <h1 class="py-3 mb-5 text-white text-xl font-bold ">CREATE NEW</h1>
                <form action="{{ route('fast_url.create') }}" method="POST">
                    @csrf
                    <label for="url" class="text-white">Destination</label><br>
                    @error('orignal_url')
                        <span class="text-red-300 text-sm mt-2 font-semibold">{{ $message }}</span>
                    @enderror
                    <input type="text" name="orignal_url" value="{{ old('orignal_url') }}"
                        class="bg-transparent border border-black w-full mt-2 outline-none h-10 rounded mb-5 @error('orignal_url') border-red-300
                        @enderror"
                        placeholder=" https:://example.com/my-url/my-long-url">
                    <label for="url" class="text-white">Title (optional)</label><br>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="bg-transparent border border-black w-full mt-2 outline-none h-10 rounded" placeholder=" ">
                    <div class="btns mt-5 flex gap-7">
                        <button class="bg-gray-800 hover:bg-gray-700 text-white py-2 rounded-md w-1/4" type="submit"><i
                                class="fa-light fa-plus-large"></i> Create Link</button>
                        <button class="bg-red-400 text-black hover:bg-red-500 py-2 rounded-md w-1/4" type="reset"><i
                                class="fa-light fa-trash"></i> Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
