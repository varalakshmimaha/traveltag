<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::parents()->with('children')->orderBy('sort_order')->get();
        $parentCategories = $categories;
        return view('admin.categories.index', compact('categories', 'parentCategories'));
    }

    public function create()
    {
        $parentCategories = Category::parents()->orderBy('name')->get();
        return view('admin.categories.create', compact('parentCategories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'description'=> 'nullable|string',
            'image'      => 'nullable|image|max:2048',
            'parent_id'  => 'nullable|exists:categories,id',
            'sort_order' => 'nullable|integer',
        ]);

        $baseSlug = Str::slug($data['name']);
        $slug = $baseSlug;
        $i = 1;
        while (Category::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $i++;
        }
        $data['slug']       = $slug;
        $data['status']     = $request->has('status');
        $data['parent_id']  = $request->input('parent_id') ?: null;
        $data['sort_order'] = $request->input('sort_order', 0);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        Category::create($data);
        return redirect()->route('admin.categories.index')->with('success', 'Category saved successfully.');
    }

    public function edit(Category $category)
    {
        $parentCategories = Category::parents()->where('id', '!=', $category->id)->orderBy('name')->get();
        return view('admin.categories.edit', compact('category', 'parentCategories'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'description'=> 'nullable|string',
            'image'      => 'nullable|image|max:2048',
            'parent_id'  => 'nullable|exists:categories,id',
            'sort_order' => 'nullable|integer',
        ]);

        $data['slug']       = Str::slug($data['name']);
        $data['status']     = $request->has('status');
        $data['parent_id']  = $request->input('parent_id') ?: null;
        $data['sort_order'] = $request->input('sort_order', 0);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        $category->update($data);
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted.');
    }
}
