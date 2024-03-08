@extends('backend.layouts.app')
@section('pagetitle', 'Create your link')
@section('content')
    <div class=" m-14">
        <h1 class="text-2xl font-bold pb-5">Your Fast URL Shortener</h1>
        <div class="grid place w-[70%]">
            <div class="bg-gray-600 p-5 rounded-md">
                <h1 class="py-3 mb-5 text-white text-xl font-bold ">CREATE NEW</h1>
                <form action="{{ route('fast_url.edit', $url->id) }}" method="POST">
                    @csrf
                    <label for="url" class="text-white">Your URL</label><br>
                    @error('shortened_url')
                        <span class="text-red-300 text-sm mt-2 font-semibold">{{ $message }}</span>
                    @enderror
                    <input type="text" name="shortened_url" value="{{ $url->shortened_url }}"
                        class="bg-transparent border border-black w-full mt-2 outline-none h-10 rounded mb-5 @error('shortened_url') border-red-300
                        @enderror"
                        placeholder=" https:://example.com/my-url/my-long-url">
                    <label for="url" class="text-white">Title (optional)</label><br>
                    <input type="text" name="title" value="{{ $url->title }}"
                        class="bg-transparent border border-black w-full mt-2 outline-none h-10 rounded" placeholder=" ">
                    <div class="btns mt-5 flex gap-7">
                        <button class="bg-blue-300 text-black py-2 rounded-md w-1/4" type="submit"><i
                                class="fa-light fa-plus-large"></i> Save changes</button>
                        <button class="bg-red-300 text-black py-2 rounded-md w-1/4" type="reset"><i
                                class="fa-light fa-trash"></i> Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
