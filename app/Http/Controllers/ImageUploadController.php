<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageUploadController extends Controller
{


    public function showById($id)
    {
        $image = Image::findOrFail($id);
        return view('home', compact('image'));
    }


    public function showForm()
    {
        $images = Image::latest()->get();
        return view('admin.upload', compact('images'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:5120'
        ]);

        $path = $request->file('image')->store('uploads', 'public');

        $image = new Image();
        $image->filename = $path;
        $image->save();

        return back()->with('success', 'Gambar berhasil diupload.');
    }
}
