@extends('admin.layouts.app')
@section('title', 'Gallery')

@section('content')
<div class="page-toolbar">
    <div>
        <div class="page-toolbar-eyebrow">Media Library</div>
        <h6 class="page-toolbar-title">Gallery Images</h6>
        <p class="page-toolbar-meta">Upload, review, and remove gallery imagery used across the public website.</p>
    </div>
    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-upload me-1"></i> Upload Images</a>
</div>

<div class="row g-3">
    @forelse($galleries as $gallery)
    <div class="col-md-3 col-6">
        <div class="card h-100">
            <img src="{{ asset('storage/' . $gallery->image) }}" class="card-img-top" style="height: 190px; object-fit: cover;" alt="{{ $gallery->caption ?? 'Gallery image' }}">
            <div class="card-body p-3 d-flex justify-content-between align-items-center">
                <span class="badge bg-info">{{ $gallery->category ?? 'General' }}</span>
                <form action="{{ route('admin.gallery.destroy', $gallery) }}" method="POST" onsubmit="return confirm('Delete this image?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger btn-icon" aria-label="Delete image"><i class="bi bi-trash"></i></button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="card">
            <div class="card-body empty-state py-5">No gallery images yet</div>
        </div>
    </div>
    @endforelse
</div>

<div class="mt-3">{{ $galleries->links() }}</div>
@endsection
