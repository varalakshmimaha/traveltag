@extends('admin.layouts.app')
@section('title', 'Banners')

@section('content')
<div class="page-toolbar">
    <div>
        <div class="page-toolbar-eyebrow">Homepage Content</div>
        <h6 class="page-toolbar-title">All Banners</h6>
        <p class="page-toolbar-meta">Create and manage the hero banners displayed on the homepage.</p>
    </div>
    <a href="{{ route('admin.banners.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg me-1"></i> Add Banner</a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($banners as $banner)
                <tr>
                    <td><img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}" class="admin-thumb"></td>
                    <td>
                        <div class="fw-semibold">{{ $banner->title ?: 'Untitled banner' }}</div>
                        @if($banner->subtitle)
                            <small class="text-muted">{{ $banner->subtitle }}</small>
                        @endif
                    </td>
                    <td>{{ $banner->order }}</td>
                    <td><span class="badge {{ $banner->status ? 'badge-active' : 'badge-inactive' }}">{{ $banner->status ? 'Active' : 'Inactive' }}</span></td>
                    <td>
                        <div class="table-actions">
                            <a href="{{ route('admin.banners.edit', $banner) }}" class="btn btn-sm btn-outline-primary btn-icon" aria-label="Edit banner"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.banners.destroy', $banner) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this banner?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger btn-icon" aria-label="Delete banner"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="empty-row">No banners found</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">{{ $banners->links() }}</div>
@endsection
