<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload_page()
    {
        return view('backend.upload');
    }
    public function upload(Request $request)
    {
        validator(request()->all(), ['file' => 'required|image'])->validate();
        // $request->validate([
        // 'file' => 'required|image'
        // ]);
        $path = $request->file('file')->store('public');
        $qualified_url = Storage::url($path);
        // dd($path, $qualified_url);
        return redirect()->back()->with('path', $path);
    }
}
