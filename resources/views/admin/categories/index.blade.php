@extends('admin.layouts.app')
@section('title', 'Categories & Sub-Categories')

@section('content')
<div class="page-toolbar">
    <div>
        <div class="page-toolbar-eyebrow">Taxonomy</div>
        <h6 class="page-toolbar-title">Categories & Sub-Categories</h6>
        <p class="page-toolbar-meta">Manage parent categories and their sub-categories.</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row g-4">
    {{-- LEFT: Category List --}}
    <div class="col-lg-7">
        <div class="card h-100">
            <div class="card-header fw-semibold">Categories</div>
            <div class="card-body p-0" style="max-height:680px;overflow-y:auto;">
                @forelse($categories as $category)
                <div class="cat-group border-bottom">
                    <div class="d-flex align-items-center gap-3 px-3 py-3">
                        @if($category->image)
                            <img src="{{ asset('storage/'.$category->image) }}" alt="{{ $category->name }}"
                                 style="width:44px;height:44px;object-fit:cover;border-radius:.5rem;border:1px solid #eee;">
                        @else
                            <div style="width:44px;height:44px;background:#f0f4ff;border-radius:.5rem;display:flex;align-items:center;justify-content:center;">
                                <i class="bi bi-tag" style="color:#6b7280;"></i>
                            </div>
                        @endif
                        <div class="flex-grow-1">
                            <div class="fw-semibold" style="font-size:.95rem;">{{ $category->name }}</div>
                            <div style="font-size:.75rem;color:#6b7280;">{{ $category->children->count() }} sub-categories</div>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-outline-primary btn-icon"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this category and all its sub-categories?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger btn-icon"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </div>

                    {{-- Sub-categories --}}
                    @if($category->children->count())
                    <div class="ps-5 pb-2">
                        @foreach($category->children as $child)
                        <div class="d-flex align-items-center gap-3 px-3 py-2 rounded mb-1" style="background:#f9fafb;">
                            @if($child->image)
                                <img src="{{ asset('storage/'.$child->image) }}" alt="{{ $child->name }}"
                                     style="width:34px;height:34px;object-fit:cover;border-radius:.4rem;border:1px solid #eee;">
                            @else
                                <div style="width:34px;height:34px;background:#e8f4ff;border-radius:.4rem;display:flex;align-items:center;justify-content:center;">
                                    <i class="bi bi-tag-fill" style="color:#89BFF3;font-size:.7rem;"></i>
                                </div>
                            @endif
                            <div class="flex-grow-1" style="font-size:.88rem;font-weight:500;">{{ $child->name }}</div>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.categories.edit', $child) }}" class="btn btn-sm btn-outline-primary btn-icon" style="padding:.2rem .4rem;font-size:.75rem;"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.categories.destroy', $child) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this sub-category?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger btn-icon" style="padding:.2rem .4rem;font-size:.75rem;"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                @empty
                <div class="text-center py-5 text-muted">No categories yet. Add one →</div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- RIGHT: Add Forms --}}
    <div class="col-lg-5">

        {{-- Add Category --}}
        <div class="card mb-4">
            <div class="card-header fw-semibold">Add Category</div>
            <div class="card-body">
                <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" value="0">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="status" class="form-check-input" id="cat_status" checked>
                        <label class="form-check-label" for="cat_status">Active</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Add Category</button>
                </form>
            </div>
        </div>

        {{-- Add Sub-Category --}}
        <div class="card">
            <div class="card-header fw-semibold">Add Sub-Category</div>
            <div class="card-body">
                <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Category <span class="text-danger">*</span></label>
                        <select name="parent_id" class="form-select" required>
                            <option value="">Select Category</option>
                            @foreach($parentCategories as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sub-Category Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" value="0">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="status" class="form-check-input" id="subcat_status" checked>
                        <label class="form-check-label" for="subcat_status">Active</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Add Sub-Category</button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
