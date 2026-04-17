<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Program;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::active()->get();
        $categories = Category::active()->get();
        $featuredPrograms = Program::featured()->with('category')->take(6)->get();

        return view('frontend.home', compact('banners', 'categories', 'featuredPrograms'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function corporates()
    {
        return view('frontend.corporates');
    }

    public function leisure()
    {
        return view('frontend.leisure');
    }
}
