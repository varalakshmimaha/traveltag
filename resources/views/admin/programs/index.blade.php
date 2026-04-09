@extends('admin.layouts.app')
@section('title', 'Programs')

@section('content')
<div class="page-toolbar">
    <div>
        <div class="page-toolbar-eyebrow">Programme Library</div>
        <h6 class="page-toolbar-title">All Programs</h6>
        <p class="page-toolbar-meta">Manage featured trips, pricing, duration, and publishing across the travel catalogue.</p>
    </div>
    <a href="{{ route('admin.programs.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg me-1"></i> Add Program</a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Duration</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($programs as $program)
                <tr>
                    <td>
                        @if($program->thumbnail)
                            <img src="{{ asset('storage/' . $program->thumbnail) }}" alt="{{ $program->title }}" class="admin-thumb-square">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        <span class="fw-semibold">{{ $program->title }}</span>
                        @if($program->featured)
                            <span class="badge bg-warning text-dark ms-2">Featured</span>
                        @endif
                    </td>
                    <td><span class="badge bg-info">{{ $program->category->name ?? '-' }}</span></td>
                    <td>{{ $program->price ? 'Rs. ' . number_format($program->price) : '-' }}</td>
                    <td>{{ $program->duration ?? '-' }}</td>
                    <td><span class="badge {{ $program->status ? 'badge-active' : 'badge-inactive' }}">{{ $program->status ? 'Active' : 'Inactive' }}</span></td>
                    <td>
                        <div class="table-actions">
                            <a href="{{ route('admin.programs.edit', $program) }}" class="btn btn-sm btn-outline-primary btn-icon" aria-label="Edit program"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.programs.destroy', $program) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this program?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger btn-icon" aria-label="Delete program"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="empty-row">No programs found</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">{{ $programs->links() }}</div>
@endsection
