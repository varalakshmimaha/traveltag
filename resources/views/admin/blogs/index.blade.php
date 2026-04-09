@extends('admin.layouts.app')
@section('title', 'Blogs')

@section('content')
<div class="page-toolbar">
    <div>
        <div class="page-toolbar-eyebrow">Editorial</div>
        <h6 class="page-toolbar-title">All Blogs</h6>
        <p class="page-toolbar-meta">Manage blog articles, publishing status, and the latest editorial content.</p>
    </div>
    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg me-1"></i> Add Blog</a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($blogs as $blog)
                <tr>
                    <td>
                        @if($blog->image)
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="admin-thumb-square">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td><span class="fw-semibold">{{ $blog->title }}</span></td>
                    <td>{{ $blog->author }}</td>
                    <td>{{ $blog->created_at->format('d M Y') }}</td>
                    <td><span class="badge {{ $blog->status ? 'badge-active' : 'badge-inactive' }}">{{ $blog->status ? 'Active' : 'Inactive' }}</span></td>
                    <td>
                        <div class="table-actions">
                            <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-sm btn-outline-primary btn-icon" aria-label="Edit blog"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this blog?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger btn-icon" aria-label="Delete blog"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="empty-row">No blogs found</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">{{ $blogs->links() }}</div>
@endsection
