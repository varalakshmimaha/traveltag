@extends('admin.layouts.app')
@section('title', 'Categories')

@section('content')
<div class="page-toolbar">
    <div>
        <div class="page-toolbar-eyebrow">Taxonomy</div>
        <h6 class="page-toolbar-title">All Categories</h6>
        <p class="page-toolbar-meta">Organize programs into clean, consistent categories for easier management.</p>
    </div>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg me-1"></i> Add Category</a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Programs</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr>
                    <td><span class="fw-semibold">{{ $category->name }}</span></td>
                    <td><code>{{ $category->slug }}</code></td>
                    <td><span class="badge bg-info">{{ $category->programs_count }}</span></td>
                    <td><span class="badge {{ $category->status ? 'badge-active' : 'badge-inactive' }}">{{ $category->status ? 'Active' : 'Inactive' }}</span></td>
                    <td>
                        <div class="table-actions">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-outline-primary btn-icon" aria-label="Edit category"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this category?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger btn-icon" aria-label="Delete category"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="empty-row">No categories found</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">{{ $categories->links() }}</div>
@endsection
