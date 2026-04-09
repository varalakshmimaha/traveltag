<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Itinerary;
use App\Models\Program;
use App\Models\ProgramImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::with('category')->latest()->paginate(10);
        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        $categories = Category::active()->get();
        return view('admin.programs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
            'price' => 'nullable|numeric|min:0',
            'duration' => 'nullable|string|max:100',
            'inclusions' => 'nullable|string',
            'exclusions' => 'nullable|string',
            'featured' => 'nullable|boolean',
            'status' => 'nullable|boolean',
            'gallery.*' => 'nullable|image|max:2048',
            'itinerary_day.*' => 'nullable|string',
            'itinerary_desc.*' => 'nullable|string',
        ]);

        $data['slug'] = Str::slug($data['title']) . '-' . Str::random(5);
        $data['featured'] = $request->has('featured');
        $data['status'] = $request->has('status');

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('programs', 'public');
        }

        $program = Program::create($data);

        // Gallery images
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $i => $image) {
                ProgramImage::create([
                    'program_id' => $program->id,
                    'image' => $image->store('programs/gallery', 'public'),
                    'order' => $i,
                ]);
            }
        }

        // Itinerary
        if ($request->itinerary_day) {
            foreach ($request->itinerary_day as $i => $day) {
                if ($day) {
                    Itinerary::create([
                        'program_id' => $program->id,
                        'day_title' => $day,
                        'description' => $request->itinerary_desc[$i] ?? '',
                        'order' => $i,
                    ]);
                }
            }
        }

        return redirect()->route('admin.programs.index')->with('success', 'Program created successfully.');
    }

    public function edit(Program $program)
    {
        $categories = Category::active()->get();
        $program->load('images', 'itineraries');
        return view('admin.programs.edit', compact('program', 'categories'));
    }

    public function update(Request $request, Program $program)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
            'price' => 'nullable|numeric|min:0',
            'duration' => 'nullable|string|max:100',
            'inclusions' => 'nullable|string',
            'exclusions' => 'nullable|string',
            'featured' => 'nullable|boolean',
            'status' => 'nullable|boolean',
            'gallery.*' => 'nullable|image|max:2048',
            'itinerary_day.*' => 'nullable|string',
            'itinerary_desc.*' => 'nullable|string',
        ]);

        $data['featured'] = $request->has('featured');
        $data['status'] = $request->has('status');

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('programs', 'public');
        }

        $program->update($data);

        // Gallery images (append new ones)
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $i => $image) {
                ProgramImage::create([
                    'program_id' => $program->id,
                    'image' => $image->store('programs/gallery', 'public'),
                    'order' => $program->images()->count() + $i,
                ]);
            }
        }

        // Itinerary (replace all)
        $program->itineraries()->delete();
        if ($request->itinerary_day) {
            foreach ($request->itinerary_day as $i => $day) {
                if ($day) {
                    Itinerary::create([
                        'program_id' => $program->id,
                        'day_title' => $day,
                        'description' => $request->itinerary_desc[$i] ?? '',
                        'order' => $i,
                    ]);
                }
            }
        }

        return redirect()->route('admin.programs.index')->with('success', 'Program updated successfully.');
    }

    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->route('admin.programs.index')->with('success', 'Program deleted successfully.');
    }

    public function deleteImage(ProgramImage $image)
    {
        $image->delete();
        return back()->with('success', 'Image deleted.');
    }
}
