@extends('frontend.layouts.app')
@section('title', $blog->title)
@section('meta_description', $blog->meta_description ?? Str::limit(strip_tags($blog->content), 160))

@push('styles')
<style>
    .blog-featured-img {
        width:100%; max-height:480px; object-fit:cover; border-radius:.75rem;
        box-shadow:0 10px 40px rgba(0,0,0,.1); display:block;
    }
</style>
@endpush

@section('content')
<section class="page-header">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2" style="--bs-breadcrumb-divider-color: rgba(255,255,255,.5);">
                <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}" class="text-white-50">Blog</a></li>
                <li class="breadcrumb-item active text-white">{{ $blog->title }}</li>
            </ol>
        </nav>
        <h1>{{ $blog->title }}</h1>
        <div class="d-flex gap-3 mt-2">
            <span class="opacity-75"><i class="bi bi-person me-1"></i>{{ $blog->author }}</span>
            <span class="opacity-75"><i class="bi bi-calendar me-1"></i>{{ $blog->created_at->format('d M Y') }}</span>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        {{-- Featured Image (full width, above content) --}}
        @php
            $fallbackImages = [
                'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1200&h=600&fit=crop',
                'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=1200&h=600&fit=crop',
                'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?w=1200&h=600&fit=crop',
                'https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=1200&h=600&fit=crop',
                'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=1200&h=600&fit=crop',
                'https://images.unsplash.com/photo-1501555088652-021faa106b9b?w=1200&h=600&fit=crop',
            ];
            $fallbackImage = $fallbackImages[$blog->id % count($fallbackImages)];
        @endphp
        <div class="mb-4">
            @if($blog->image && file_exists(public_path('storage/' . $blog->image)))
                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="blog-featured-img">
            @else
                <img src="{{ $fallbackImage }}" alt="{{ $blog->title }}" class="blog-featured-img">
            @endif
        </div>

        <div class="row g-5">
            <div class="col-lg-8">
                <div class="blog-content fs-6 lh-lg" style="color: #333;">
                    {!! $blog->content !!}
                </div>
                <style>
                    .blog-content h2 { font-size: 1.8rem; margin-top: 1.5rem; margin-bottom: 1rem; color: #1a1a1a; font-weight: 700; }
                    .blog-content h3 { font-size: 1.3rem; margin-top: 1.2rem; margin-bottom: 0.8rem; color: #2c3e50; font-weight: 600; }
                    .blog-content h4 { font-size: 1.1rem; margin-top: 1rem; margin-bottom: 0.6rem; color: #34495e; font-weight: 600; }
                    .blog-content p { margin-bottom: 1rem; line-height: 1.8; }
                    .blog-content ul, .blog-content ol { margin-left: 1.5rem; margin-bottom: 1rem; }
                    .blog-content li { margin-bottom: 0.5rem; line-height: 1.8; }
                    .blog-content strong { color: #1a1a1a; font-weight: 600; }
                </style>
            </div>
            <div class="col-lg-4">
                @if($recentBlogs->count())
                <div class="sticky-top" style="top:80px;">
                    <h5 class="fw-bold mb-3">Recent Posts</h5>
                    @foreach($recentBlogs as $recent)
                    @php
                        $recentFallbackImages = [
                            'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=150&h=150&fit=crop',
                            'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=150&h=150&fit=crop',
                            'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?w=150&h=150&fit=crop',
                            'https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=150&h=150&fit=crop',
                            'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=150&h=150&fit=crop',
                            'https://images.unsplash.com/photo-1501555088652-021faa106b9b?w=150&h=150&fit=crop',
                        ];
                        $recentFallback = $recentFallbackImages[$recent->id % count($recentFallbackImages)];
                    @endphp
                    <a href="{{ route('blogs.show', $recent->slug) }}" class="d-flex align-items-center mb-3 text-decoration-none">
                        @if($recent->image && file_exists(public_path('storage/' . $recent->image)))
                            <img src="{{ asset('storage/' . $recent->image) }}" width="70" height="70" class="rounded me-3" style="object-fit:cover;">
                        @else
                            <img src="{{ $recentFallback }}" width="70" height="70" class="rounded me-3" style="object-fit:cover;">
                        @endif
                        <div>
                            <h6 class="fw-bold mb-1 text-dark">{{ Str::limit($recent->title, 50) }}</h6>
                            <small class="text-muted">{{ $recent->created_at->format('d M Y') }}</small>
                        </div>
                    </a>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
