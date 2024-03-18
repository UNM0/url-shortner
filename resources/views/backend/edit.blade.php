@extends('backend.layouts.app')
@section('pagetitle', 'Update your link')
@section('content')
    <div class=" m-14">
        <h1 class="pb-5 text-2xl font-bold">Your Fast URL Shortener</h1>
        <div class="grid place w-[70%]">
            <div class="p-5 bg-gray-600 rounded-md">
                <h1 class="py-3 mb-5 text-xl font-bold text-white ">CREATE NEW</h1>
                <form action="{{ route('fast_url.edit', $url->id) }}" method="POST">
                    @csrf
                    <label for="url" class="text-white">Your URL</label><br>
                    @error('shortened_url')
                        <span class="mt-2 text-sm font-semibold text-red-300">{{ $message }}</span>
                    @enderror
                    <input type="text" name="shortened_url" value="{{ $url->shortened_url }}"
                        class="bg-transparent border border-black w-full mt-2 outline-none h-10 rounded mb-5 @error('shortened_url') border-red-300
                        @enderror"
                        placeholder=" https:://example.com/my-url/my-long-url">
                    <label for="url" class="text-white">Title (optional)</label><br>
                    <input type="text" name="title" value="{{ $url->title }}"
                        class="w-full h-10 mt-2 bg-transparent border border-black rounded outline-none" placeholder=" ">
                    <div class="flex mt-5 btns gap-7">
                        <button class="w-1/4 py-2 text-black bg-blue-300 rounded-md" type="submit"><i
                                class="fa-light fa-plus-large"></i> Save changes</button>
                        <button class="w-1/4 py-2 text-black bg-red-300 rounded-md" type="reset"><i
                                class="fa-light fa-trash"></i> Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
