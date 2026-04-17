@extends('frontend.layouts.app')
@section('title', 'Gallery - School Trip Photos')
@section('meta_description', 'Browse photos from TravelTag\'s school trips and educational tours. See students exploring heritage sites, nature trails, and cultural destinations across India.')
@section('meta_keywords', 'school trip photos, educational tour gallery, student travel images, school excursion pictures, TravelTag gallery')

@push('styles')
<style>
    .gallery-filter { display:flex; flex-wrap:wrap; gap:.6rem; justify-content:center; margin-bottom:2.5rem; }
    .gallery-filter a {
        display:inline-block; padding:.55rem 1.6rem; border-radius:2rem; font-size:.88rem; font-weight:600;
        text-decoration:none; transition:all .3s ease;
        background:#e8f0fe; color:#4b4326; border:none;
    }
    .gallery-filter a:hover {
        background:#89BFF3; color:#fff;
    }
    .gallery-filter a.active {
        background:#89BFF3; color:#fff; box-shadow:0 4px 15px rgba(137,191,243,.4);
    }
</style>
@endpush

@section('content')
<section class="page-header text-center" style="background: linear-gradient(rgba(15, 23, 42, 0.75), rgba(15, 23, 42, 0.75)), url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover fixed;">
    <div class="container">
        <h1>Gallery</h1>
        <p class="opacity-75">Moments from our journeys</p>
    </div>
</section>

<section class="section">
    <div class="container">
        {{-- Category Filter --}}
        @if($categories->count())
        <div class="gallery-filter">
            <a href="{{ route('gallery') }}" class="{{ !request('category') ? 'active' : '' }}">All</a>
            @foreach($categories as $cat)
                <a href="{{ route('gallery', ['category' => $cat]) }}"
                   class="{{ request('category') == $cat ? 'active' : '' }}">{{ $cat }}</a>
            @endforeach
        </div>
        @endif

        <div class="row g-3">
            @forelse($galleries as $gallery)
            <div class="col-md-3 col-6">
                <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#lightbox" onclick="document.getElementById('lightboxImg').src='{{ asset('storage/' . $gallery->image) }}'">
                    <img src="{{ asset('storage/' . $gallery->image) }}" class="img-fluid" alt="{{ $gallery->caption }}">
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-images fs-1 text-muted"></i>
                <h5 class="mt-3 text-muted">No images yet</h5>
            </div>
            @endforelse
        </div>
        <div class="mt-4">{{ $galleries->withQueryString()->links() }}</div>
    </div>
</section>

{{-- Lightbox Modal --}}
<div class="modal fade" id="lightbox" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 text-center">
                <img id="lightboxImg" src="" class="img-fluid rounded" style="max-height:80vh;">
            </div>
        </div>
    </div>
</div>
@endsection
