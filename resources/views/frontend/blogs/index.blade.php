@extends('frontend.layouts.app')
@section('title', 'Blogs')

@section('content')
<section class="page-header text-center" style="background: linear-gradient(rgba(15, 23, 42, 0.75), rgba(15, 23, 42, 0.75)), url('https://images.unsplash.com/photo-1506459225024-1428097a7e18?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover fixed;">
    <div class="container">
        <h1>Our Blog</h1>
        <p class="opacity-75">Insights, stories, and updates from TravelTag</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row g-4">
            @forelse($blogs as $blog)
            <div class="col-md-4">
                <div class="card blog-card h-100">
                    @php
                        $fallbackImages = [
                            'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=600&h=400&fit=crop',
                            'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=600&h=400&fit=crop',
                            'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?w=600&h=400&fit=crop',
                            'https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=600&h=400&fit=crop',
                            'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=600&h=400&fit=crop',
                            'https://images.unsplash.com/photo-1501555088652-021faa106b9b?w=600&h=400&fit=crop',
                        ];
                        $fallbackImage = $fallbackImages[$blog->id % count($fallbackImages)];
                    @endphp
                    @if($blog->image && file_exists(public_path('storage/' . $blog->image)))
                        <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" style="height:200px; object-fit:cover;">
                    @else
                        <img src="{{ $fallbackImage }}" class="card-img-top" style="height:200px; object-fit:cover;" alt="{{ $blog->title }}">
                    @endif
                    <div class="card-body">
                        <div class="d-flex gap-2 mb-2">
                            <small class="text-muted"><i class="bi bi-person me-1"></i>{{ $blog->author }}</small>
                            <small class="text-muted"><i class="bi bi-calendar me-1"></i>{{ $blog->created_at->format('d M Y') }}</small>
                        </div>
                        <h5 class="fw-bold">{{ $blog->title }}</h5>
                        <p class="text-muted small">{{ Str::limit(strip_tags($blog->content), 120) }}</p>
                    </div>
                    <div class="card-footer bg-white border-0 pb-3 px-3">
                        <a href="{{ route('blogs.show', $blog->slug) }}" class="btn btn-outline-primary btn-sm">Read More</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-newspaper fs-1 text-muted"></i>
                <h5 class="mt-3 text-muted">No blog posts yet</h5>
                <p class="text-muted">Check back soon for travel insights and stories.</p>
            </div>
            @endforelse
        </div>
        <div class="mt-4">{{ $blogs->links() }}</div>
    </div>
</section>
@endsection
