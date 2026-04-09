<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index(Request $request)
    {
        $query = Program::active()->with('category');

        if ($request->category) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }

        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $programs = $query->latest()->get();
        $categories = Category::active()->get();

        return view('frontend.programs.index', compact('programs', 'categories'));
    }

    public function show($slug)
    {
        $program = Program::where('slug', $slug)->active()->with(['category', 'images', 'itineraries'])->firstOrFail();
        $relatedPrograms = Program::active()
            ->where('category_id', $program->category_id)
            ->where('id', '!=', $program->id)
            ->take(3)->get();

        return view('frontend.programs.show', compact('program', 'relatedPrograms'));
    }
}
