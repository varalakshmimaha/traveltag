<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('order')->paginate(20);
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|max:2048',
            'category' => 'nullable|string|max:100',
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $i => $image) {
                Gallery::create([
                    'image' => $image->store('gallery', 'public'),
                    'category' => $request->category,
                    'order' => $i,
                ]);
            }
        }

        return redirect()->route('admin.gallery.index')->with('success', 'Images uploaded successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Image deleted successfully.');
    }
}
