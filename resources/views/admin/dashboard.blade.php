@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="row g-3 mb-4">
    <div class="col-md-6 col-lg-3">
        <div class="stat-card" style="border-top-color: #0066cc;">
            <div class="number">{{ $totalPrograms }}</div>
            <div class="label"><i class="bi bi-globe-americas me-2"></i>Total Programs</div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card" style="border-top-color: #10b981;">
            <div class="number">{{ $totalBlogs }}</div>
            <div class="label"><i class="bi bi-pencil-square me-2"></i>Total Blogs</div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card" style="border-top-color: #f59e0b;">
            <div class="number">{{ $totalEnquiries }}</div>
            <div class="label"><i class="bi bi-envelope me-2"></i>Total Enquiries</div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card" style="border-top-color: #8b5cf6;">
            <div class="number">{{ $totalBanners }}</div>
            <div class="label"><i class="bi bi-images me-2"></i>Total Banners</div>
        </div>
    </div>
</div>

<div class="row g-4">
    {{-- Recent Programs --}}
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h6 class="mb-0"><i class="bi bi-globe-americas text-primary me-2"></i>Recent Programs</h6>
                <a href="{{ route('admin.programs.create') }}" class="btn btn-sm btn-primary"><i class="bi bi-plus me-1"></i>Add New</a>
            </div>
            <div class="card-body p-0">
                @forelse($recentPrograms as $program)
                <div class="d-flex justify-content-between align-items-center p-3 border-bottom hover" style="cursor: pointer; transition: all 0.2s;">
                    <div>
                        <h6 class="mb-1">{{ Str::limit($program->title, 30) }}</h6>
                        <small class="text-muted"><i class="bi bi-tag me-1"></i>{{ $program->category->name ?? '-' }}</small>
                    </div>
                    <span class="badge {{ $program->status ? 'badge-active' : 'badge-inactive' }}">{{ $program->status ? 'Active' : 'Inactive' }}</span>
                </div>
                @empty
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-inbox display-6 mb-3"></i>
                    <p>No programs yet</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Recent Blogs --}}
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h6 class="mb-0"><i class="bi bi-pencil-square text-success me-2"></i>Recent Blogs</h6>
                <a href="{{ route('admin.blogs.create') }}" class="btn btn-sm btn-primary"><i class="bi bi-plus me-1"></i>Add New</a>
            </div>
            <div class="card-body p-0">
                @forelse($recentBlogs as $blog)
                <div class="d-flex gap-3 p-3 border-bottom" style="transition: all 0.2s;">
                    @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" width="50" height="50" class="rounded" style="object-fit: cover;">
                    @else
                        <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; min-width: 50px;">
                            <i class="bi bi-image text-muted"></i>
                        </div>
                    @endif
                    <div class="flex-grow-1">
                        <h6 class="mb-1">{{ Str::limit($blog->title, 35) }}</h6>
                        <small class="text-muted"><i class="bi bi-calendar me-1"></i>{{ $blog->created_at->format('d M Y') }}</small>
                    </div>
                    <span class="badge {{ $blog->status ? 'badge-active' : 'badge-inactive' }}">{{ $blog->status ? 'Active' : 'Inactive' }}</span>
                </div>
                @empty
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-inbox display-6 mb-3"></i>
                    <p>No blogs yet</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mt-1">
    {{-- Recent Enquiries --}}
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h6 class="mb-0"><i class="bi bi-envelope text-warning me-2"></i>Recent Enquiries</h6>
                @if($unreadEnquiries > 0)
                    <span class="badge bg-danger rounded-pill">{{ $unreadEnquiries }} unread</span>
                @endif
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @forelse($recentEnquiries as $enquiry)
                    <a href="{{ route('admin.contacts.show', $enquiry) }}" class="list-group-item list-group-item-action {{ !$enquiry->is_read ? 'fw-bold bg-light' : '' }}">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">{{ $enquiry->name }}</h6>
                                <small class="text-muted">{{ Str::limit($enquiry->message, 60) }}</small>
                            </div>
                            <small class="text-muted ms-3">{{ $enquiry->created_at->diffForHumans() }}</small>
                        </div>
                    </a>
                    @empty
                    <div class="text-center py-5 text-muted">
                        <i class="bi bi-inbox display-6 mb-3"></i>
                        <p>No enquiries yet</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Stats --}}
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white">
                <h6 class="mb-0"><i class="bi bi-graph-up text-info me-2"></i>Quick Info</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <small class="text-muted">Programs</small>
                        <strong>{{ $totalPrograms }}</strong>
                    </div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar" style="width: {{ min($totalPrograms * 10, 100) }}%;"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <small class="text-muted">Blogs</small>
                        <strong>{{ $totalBlogs }}</strong>
                    </div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-success" style="width: {{ min($totalBlogs * 10, 100) }}%;"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <small class="text-muted">Enquiries</small>
                        <strong>{{ $totalEnquiries }}</strong>
                    </div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-warning" style="width: {{ min($totalEnquiries * 5, 100) }}%;"></div>
                    </div>
                </div>
                <div class="mb-0">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <small class="text-muted">Banners</small>
                        <strong>{{ $totalBanners }}</strong>
                    </div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-danger" style="width: {{ min($totalBanners * 20, 100) }}%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
