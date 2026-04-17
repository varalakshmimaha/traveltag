@extends('frontend.layouts.app')
@section('title', $program->title . ' - Student Travel Program')
@section('meta_description', Str::limit(strip_tags($program->description ?? 'Explore ' . $program->title . ' with TravelTag — safe, structured student travel from Bangalore.'), 160))
@section('meta_keywords', $program->title . ', school trip, educational tour, student travel, ' . ($program->category->name ?? '') . ', TravelTag')

@push('styles')
<style>
    /* ===== HERO BANNER ===== */
    .prog-hero-banner {
        position:relative; min-height:320px; display:flex; align-items:center; justify-content:center;
        background:url('https://images.unsplash.com/photo-1503220317375-aaad61436b1b?w=1600&h=500&fit=crop') center/cover no-repeat fixed;
    }
    .prog-hero-banner::before { content:''; position:absolute; inset:0; background:linear-gradient(135deg,rgba(15,23,42,.82),rgba(30,58,138,.7)); }
    .prog-hero-banner .container { position:relative; z-index:2; text-align:center; color:#fff; }
    .prog-hero-banner h1 { font-size:2.4rem; font-weight:900; color:#fff !important; text-transform:uppercase; letter-spacing:1px; }
    .prog-hero-banner .breadcrumb { justify-content:center; margin-bottom:.5rem; }
    .prog-hero-banner .breadcrumb-item a { color:rgba(255,255,255,.6); text-decoration:none; font-size:.8rem; text-transform:uppercase; letter-spacing:1px; font-weight:600; }
    .prog-hero-banner .breadcrumb-item.active { color:#fff; font-size:.8rem; text-transform:uppercase; letter-spacing:1px; font-weight:600; }
    .prog-hero-banner .breadcrumb-item+.breadcrumb-item::before { color:rgba(255,255,255,.4); content:'\203A'; }
    .prog-hero-banner .hero-tags { display:flex; flex-wrap:wrap; gap:.5rem; justify-content:center; margin-top:1rem; }
    .prog-hero-banner .hero-tags span {
        background:rgba(255,255,255,.12); backdrop-filter:blur(6px);
        border:1px solid rgba(255,255,255,.18); padding:.35rem 1rem;
        border-radius:2rem; font-size:.75rem; font-weight:600; color:#fff;
        display:inline-flex; align-items:center; gap:.3rem;
    }

    /* ===== FEATURED IMAGE ===== */
    .featured-img { border-radius:1rem; overflow:hidden; box-shadow:0 10px 40px rgba(0,0,0,.1); margin-bottom:2rem; }
    .featured-img img { width:100%; height:420px; object-fit:cover; display:block; }

    /* ===== CONTENT ===== */
    .prog-content h4 {
        font-weight:800; font-size:1.25rem; color:#000 !important; margin-bottom:1rem;
        padding-bottom:.6rem; border-bottom:2px solid var(--light-blue-bg);
        display:flex; align-items:center; gap:.5rem;
    }
    .prog-content h4 i { color:var(--primary-dark); font-size:1.1rem; }
    .prog-content .desc-text { font-size:.88rem; color:#6b7280; line-height:1.9; }

    /* ===== ITINERARY ===== */
    .itin-list { list-style:none; padding:0; margin:0; }
    .itin-list li { padding:.5rem 0; border-bottom:1px solid #f0f0f0; font-size:.85rem; color:#4b5563; }
    .itin-list li:last-child { border-bottom:none; }
    .itin-list li strong { color:#000; font-weight:600; }

    /* ===== STICKY ENQUIRY FORM ===== */
    .enquiry-card {
        background:#fff; border-radius:1rem; box-shadow:0 8px 40px rgba(0,0,0,.08);
        border:1px solid #f0f0f0; overflow:hidden;
    }
    .enquiry-card .eq-header {
        background:linear-gradient(135deg,#1e3a5f,#0f172a);
        padding:1.3rem 1.5rem; color:#fff; text-align:center;
    }
    .enquiry-card .eq-header h5 { font-weight:800; color:#fff !important; margin-bottom:.15rem; font-size:1.05rem; }
    .enquiry-card .eq-header p { font-size:.75rem; opacity:.7; margin:0; color:rgba(255,255,255,.8); }
    .enquiry-card .eq-body { padding:1.3rem 1.5rem; }
    .enquiry-card .form-control {
        border-radius:.5rem; border:1.5px solid #e5e7eb; font-size:.82rem; padding:.55rem .75rem;
    }
    .enquiry-card .form-control:focus { border-color:var(--primary); box-shadow:0 0 0 3px rgba(137,191,243,.15); }
    .enquiry-card textarea.form-control { resize:none; }
    .enquiry-card .btn-enquire {
        width:100%; padding:.65rem; border-radius:.5rem; font-weight:700; font-size:.88rem;
        background:var(--primary); color:#fff; border:none; transition:all .3s ease;
        display:flex; align-items:center; justify-content:center; gap:.4rem;
    }
    .enquiry-card .btn-enquire:hover { background:var(--primary-dark); transform:translateY(-2px); box-shadow:0 6px 20px rgba(137,191,243,.3); }
    .enquiry-card .eq-trust { display:flex; align-items:center; justify-content:center; gap:.4rem; margin-top:.8rem; font-size:.72rem; color:#6b7280; }
    .enquiry-card .eq-trust i { color:#22c55e; }
    .eq-success { background:#f0fdf4; border:1px solid #bbf7d0; border-radius:.5rem; padding:.6rem 1rem; margin-bottom:.8rem; font-size:.82rem; color:#16a34a; display:flex; align-items:center; gap:.4rem; }

    /* ===== RELATED TRIPS (sidebar) ===== */
    .related-sidebar a {
        display:flex; align-items:center; gap:.75rem; padding:.65rem 0;
        text-decoration:none; border-bottom:1px solid #eee;
    }
    .related-sidebar a:last-of-type { border-bottom:none; }
    .related-sidebar a img {
        width:70px; height:55px; object-fit:cover; border-radius:.4rem; flex-shrink:0;
    }
    .related-sidebar a span {
        font-size:.82rem; font-weight:600; color:#1a1a1a; line-height:1.4;
    }
    .related-sidebar a:hover span { color:var(--primary-dark); }

    /* ===== GALLERY GRID ===== */
    .gallery-grid { display:grid; grid-template-columns:repeat(4,1fr); gap:.8rem; }
    .gallery-grid .g-item { border-radius:.6rem; overflow:hidden; cursor:pointer; height:220px; position:relative; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
    .gallery-grid .g-item img { width:100%; height:100%; object-fit:cover; transition:transform .4s ease; }
    .gallery-grid .g-item:hover img { transform:scale(1.08); }
    .gallery-grid .g-item::after {
        content:''; position:absolute; inset:0;
        background:linear-gradient(to top, rgba(0,0,0,0.6), transparent 50%); transition:background .3s ease;
    }
    .gallery-grid .g-item:hover::after { background:linear-gradient(to top, rgba(0,0,0,0.75), transparent 60%); }
    .gallery-grid .g-item .g-name {
        position: absolute; bottom: 12px; left: 15px; right: 15px; z-index: 2;
        color: #fff; font-weight: 600; font-size: .85rem; text-shadow: 0 2px 4px rgba(0,0,0,0.8);
    }

    @media(max-width:991px) {
        .enquiry-card { position:static !important; }
        .featured-img img { height:300px; }
    }
    @media(max-width:768px) {
        .prog-hero-banner h1 { font-size:1.6rem; }
        .prog-hero-banner { min-height:240px; }
        .gallery-grid { grid-template-columns:1fr 1fr; }
    }
</style>
@endpush

@section('content')

{{-- ===== 1. HERO BANNER ===== --}}
<section class="prog-hero-banner">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">TravelTag</a></li>
                <li class="breadcrumb-item"><a href="{{ route('programs.index') }}">Programs</a></li>
                <li class="breadcrumb-item"><a href="{{ route('programs.index', ['category' => $program->category->slug ?? '']) }}">{{ $program->category->name ?? '' }}</a></li>
                <li class="breadcrumb-item active">{{ $program->title }}</li>
            </ol>
        </nav>
        <h1>{{ $program->title }}</h1>
        <div class="hero-tags">
            <span><i class="bi bi-folder2-open"></i> {{ $program->category->name ?? '' }}</span>
        </div>
    </div>
</section>

{{-- ===== 2. FEATURED IMAGE + DESCRIPTION (LEFT) + STICKY FORM + RELATED (RIGHT) ===== --}}
@php
    $relatedPrograms = \App\Models\Program::active()
        ->where('id', '!=', $program->id)
        ->where('category_id', $program->category_id)
        ->with('category')
        ->inRandomOrder()
        ->take(5)
        ->get();
@endphp

<section class="section" style="background:#fff;">
    <div class="container">
        <div class="row g-5">
            {{-- Left: Image + Content --}}
            <div class="col-lg-8 prog-content">

                {{-- Featured Image --}}
                <div class="featured-img">
                    @if($program->thumbnail && file_exists(public_path('storage/' . $program->thumbnail)))
                        <img src="{{ asset('storage/' . $program->thumbnail) }}" alt="{{ $program->title }}">
                    @else
                        <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=1000&h=500&fit=crop" alt="{{ $program->title }}">
                    @endif
                </div>

                {{-- Description --}}
                <div class="mb-5">
                    <h4><i class="bi bi-info-circle"></i> About This Program</h4>
                    <div class="desc-text">{!! nl2br(e($program->description)) !!}</div>
                </div>

                {{-- Itinerary --}}
                @if($program->itineraries->count())
                <div class="mb-5">
                    <h4><i class="bi bi-map"></i> Day-by-Day Itinerary</h4>
                    <ul class="itin-list">
                        @foreach($program->itineraries as $it)
                        <li><strong>{{ $it->day_title }}:</strong> {{ $it->description }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

            </div>

            {{-- Right: Sticky Enquiry Form + Related Trips --}}
            <div class="col-lg-4">
                <div class="sticky-top" style="top:85px; z-index:10;">
                    {{-- Enquiry Form --}}
                    <div class="enquiry-card mb-4">
                        <div class="eq-header">
                            <h5><i class="bi bi-envelope-paper me-1"></i> Book School Consultation</h5>
                            <p>We'll get back to you within 24 hours</p>
                        </div>
                        <div class="eq-body">
                            @if(session('success'))
                            <div class="eq-success"><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</div>
                            @endif

                            <form action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="source" value="Program Enquiry: {{ $program->title }}">
                                <div class="mb-2">
                                    <input type="text" name="name" class="form-control" placeholder="Full Name *" value="{{ old('name') }}" required>
                                </div>
                                <div class="mb-2">
                                    <input type="tel" name="phone" class="form-control" placeholder="Phone Number *" value="{{ old('phone') }}" required>
                                </div>
                                <div class="mb-2">
                                    <input type="email" name="email" class="form-control" placeholder="Email Address *" value="{{ old('email') }}" required>
                                </div>
                                <div class="mb-3">
                                    <textarea name="message" class="form-control" rows="3" placeholder="Your Message (optional)">Enquiry about: {{ $program->title }}</textarea>
                                </div>
                                <button type="submit" class="btn-enquire"><i class="bi bi-send-fill"></i> Talk to Trip Expert</button>
                            </form>
                            <div class="eq-trust"><i class="bi bi-shield-check"></i> Your details are safe with us. No spam.</div>
                        </div>
                    </div>

                    {{-- Related Trips (below enquiry form) --}}
                    @if($relatedPrograms->count())
                    <div class="related-sidebar">
                        <h6 style="font-weight:800; font-size:.9rem; color:#000 !important; margin-bottom:.8rem; padding-bottom:.5rem; border-bottom:2px solid var(--light-blue-bg);">
                            <i class="bi bi-compass me-1" style="color:var(--primary-dark);"></i> Related Trips
                        </h6>
                        @foreach($relatedPrograms as $pp)
                        <a href="{{ route('programs.show', $pp->slug) }}">
                            @if($pp->thumbnail && file_exists(public_path('storage/' . $pp->thumbnail)))
                                <img src="{{ asset('storage/' . $pp->thumbnail) }}" alt="{{ $pp->title }}">
                            @else
                                <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=200&h=150&fit=crop" alt="{{ $pp->title }}">
                            @endif
                            <span>{{ $pp->title }}</span>
                        </a>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== 3. TRIP GALLERY (only if images exist) ===== --}}
@if($program->images->count())
<section class="section" style="background:var(--light-blue-bg);">
    <div class="container">
        <div class="text-center mb-4">
            <div class="section-label">Gallery</div>
            <h2 class="section-title">Trip Gallery</h2>
            <div class="section-line section-line-center"></div>
        </div>
        <div class="gallery-grid">
            @foreach($program->images as $index => $img)
            <div class="g-item" data-bs-toggle="modal" data-bs-target="#galleryModal" onclick="document.getElementById('modalImg').src='{{ asset('storage/' . $img->image) }}'">
                <img src="{{ asset('storage/' . $img->image) }}" alt="{{ $program->title }} - Image {{ $index + 1 }}" loading="lazy">
                <div class="g-name">{{ $program->title }} - {{ $index + 1 }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Gallery Lightbox Modal --}}
<div class="modal fade" id="galleryModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 text-center">
                <img id="modalImg" src="" class="img-fluid" style="border-radius:.75rem;max-height:80vh;object-fit:contain;">
            </div>
        </div>
    </div>
</div>
@endif

@endsection
