@extends('backend.layouts.app')
@section('pagetitle', 'Update your link')
@section('content')
    <div class=" m-14">
        <h1 class="pb-5 text-2xl font-bold">Your Fast URL Shortener</h1>
        <div class="grid place w-[70%]">
            <div class="p-5 bg-gray-600 rounded-md">
                <h1 class="py-3 mb-5 text-xl font-bold text-white ">Edit Your Short link</h1>
                <form action="{{ route('fast_url.edit', $url->id) }}" method="POST">
                    @csrf
                    <div class="grid">

                        <label for="url" class="text-white">Your URL</label>
                        @error('shortened_url')
                            <span class="mt-2 text-sm font-semibold text-red-300">{{ $message }}</span>
                        @enderror
                        <input type="text" name="shortened_url" value="{{ $url->shortened_url }}"
                            class="w-1/2 h-10 px-3 py-3 mt-2 mb-8 bg-transparent border border-gray-400 rounded outline-none @error('shortened_url') border-red-300
                        @enderror"
                            placeholder=" myshorturl">
                        <label for="url" class="text-white">Title (optional)</label>
                        <input type="text" name="title"
                            class="w-1/2 h-10 px-3 py-3 mt-2 bg-transparent border border-gray-400 rounded outline-none"
                            placeholder=" Link for my app" value="{{ $url->title }}">
                    </div>

                    <div class="flex mt-9 btns gap-7">
                        <button class="w-1/6 py-2 text-white bg-gray-800 rounded-md hover:bg-gray-700" type="submit"><i
                                class="fa-light fa-plus-large"></i> Create Link</button>
                        <button class="w-1/6 py-2 text-black bg-red-400 rounded-md hover:bg-red-500" type="reset"><i
                                class="fa-light fa-trash"></i> Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
