<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Program;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalPrograms' => Program::count(),
            'totalBlogs' => Blog::count(),
            'totalEnquiries' => Contact::count(),
            'totalBanners' => Banner::count(),
            'unreadEnquiries' => Contact::where('is_read', false)->count(),
            'recentEnquiries' => Contact::latest()->take(5)->get(),
            'recentPrograms' => Program::with('category')->latest()->take(5)->get(),
            'recentBlogs' => Blog::latest()->take(5)->get(),
        ];

        return view('admin.dashboard', $data);
    }
}
