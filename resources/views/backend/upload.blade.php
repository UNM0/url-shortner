@extends('backend.auth.layouts.app')
@section('content')
    <div class="flex justify-center place-content-center">
        <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="File" class="text-white">File uploader</label><br> <br>
            @error('file')
                <span class="bg-red-500 ">{{ $message }}</span>
            @enderror
            <input type="file" class="text-white" name="file"><br><br>
            <button type="submit" class="p-5 text-white bg-gray-300">Submit</button>
        </form>
    </div>
    <img src="{{ asset('storage/file.txt') }}" alt="">

    @if (Session::has('path'))
        <div class="">
            <img src="{{ Storage::url(Session::get('path')) }}" alt="">
            {{-- <img src="{{ asset(Session::get('path')) }}" alt=""> --}}
        </div>
    @endif
@endsection
