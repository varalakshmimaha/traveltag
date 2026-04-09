<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::active()->latest()->paginate(9);
        return view('frontend.blogs.index', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->active()->firstOrFail();
        $recentBlogs = Blog::active()->where('id', '!=', $blog->id)->latest()->take(3)->get();
        return view('frontend.blogs.show', compact('blog', 'recentBlogs'));
    }
}
