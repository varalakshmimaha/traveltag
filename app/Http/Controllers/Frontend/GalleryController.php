<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::orderBy('order');

        if ($request->category) {
            $query->where('category', $request->category);
        }

        $galleries = $query->paginate(24);
        $categories = Gallery::select('category')->distinct()->whereNotNull('category')->pluck('category');

        return view('frontend.gallery', compact('galleries', 'categories'));
    }
}
