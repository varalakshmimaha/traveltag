@extends('frontend.layouts.app')
@section('title', request('category') ? ucfirst(str_replace('-', ' ', request('category'))) . ' - Student Travel Programs' : 'Student Travel Programs')
@section('meta_description', 'Explore TravelTag\'s student travel programs — day trips, domestic tours, and international educational trips. Safe, structured school excursions from Bangalore.')
@section('meta_keywords', 'student travel programs, school trip packages, day trips for students, domestic school tours, international student tours, educational excursions Bangalore')

@push('styles')
<style>
    .prog-hero {
        position:relative; min-height:340px; display:flex; align-items:center; justify-content:center;
        background:url('https://images.unsplash.com/photo-1503220317375-aaad61436b1b?w=1600&h=500&fit=crop') center/cover no-repeat fixed;
    }
    .prog-hero::before { content:''; position:absolute; inset:0; background:linear-gradient(135deg,rgba(15,23,42,.8),rgba(30,58,138,.65)); }
    .prog-hero .container { position:relative; z-index:2; text-align:center; color:#fff; }
    .prog-hero h1 { font-size:2.6rem; font-weight:900; text-transform:uppercase; letter-spacing:1px; color:#fff !important; }
    .prog-hero .breadcrumb { justify-content:center; margin-bottom:.5rem; }
    .prog-hero .breadcrumb-item a { color:rgba(255,255,255,.6); text-decoration:none; font-size:.8rem; text-transform:uppercase; letter-spacing:1px; font-weight:600; }
    .prog-hero .breadcrumb-item.active { color:#fff; font-size:.8rem; text-transform:uppercase; letter-spacing:1px; font-weight:600; }
    .prog-hero .breadcrumb-item+.breadcrumb-item::before { color:rgba(255,255,255,.4); content:'\203A'; }

    /* Destination Grid */
    .dest-grid { display:grid; gap:1.2rem; }
    .dest-grid.has-items {
        grid-template-columns:repeat(3, 1fr);
    }
    .dest-grid .dest-item { position:relative; border-radius:1rem; overflow:hidden; cursor:pointer; height:280px; }
    .dest-grid .dest-item img { width:100%; height:100%; object-fit:cover; transition:transform .5s ease; }
    .dest-grid .dest-item:hover img { transform:scale(1.08); }
    .dest-grid .dest-item .dest-info {
        position:absolute; bottom:0; left:0; right:0;
        background:linear-gradient(to top,rgba(0,0,0,.75) 0%,rgba(0,0,0,.2) 60%,transparent 100%);
        padding:1.5rem 1.2rem .8rem; color:#fff;
    }
    .dest-grid .dest-item .dest-info h5 {
        font-weight:800; font-size:1.2rem; margin-bottom:.15rem; color:#fff !important;
        text-shadow:0 2px 8px rgba(0,0,0,.3);
    }
    .dest-grid .dest-item .dest-info small { opacity:.8; font-size:.75rem; }
    .dest-grid .dest-item .dest-info .dest-meta {
        display:flex; align-items:center; gap:.8rem; font-size:.72rem; opacity:.85; margin-top:.2rem;
    }

    .dest-grid .dest-item a { position:absolute; inset:0; z-index:3; }

    /* Filter pills */
    .filter-pills { display:flex; flex-wrap:wrap; gap:.5rem; justify-content:center; margin-bottom:2rem; }
    .filter-pills a {
        padding:.5rem 1.3rem; border-radius:2rem; font-size:.82rem; font-weight:600;
        text-decoration:none; transition:all .3s ease; border:1.5px solid #e0e0e0; color:#6b7280;
    }
    .filter-pills a:hover { border-color:var(--primary); color:var(--primary-dark); }
    .filter-pills a.active { background:var(--primary); border-color:var(--primary); color:#fff; }

    @media(max-width:768px) {
        .dest-grid.has-items { grid-template-columns:repeat(2, 1fr); }
        .dest-grid .dest-item { height:220px; }
        .prog-hero h1 { font-size:1.8rem; }
    }
    @media(max-width:576px) {
        .dest-grid.has-items { grid-template-columns:1fr; }
        .dest-grid .dest-item { height:220px; }
        .prog-hero h1 { font-size:1.3rem; }
    }
</style>
@endpush

@section('content')
{{-- Hero --}}
<section class="prog-hero">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">TravelTag</a></li>
                <li class="breadcrumb-item active">{{ request('category') ? ucfirst(str_replace('-', ' ', request('category'))) : 'Programs' }}</li>
            </ol>
        </nav>
        <h1>{{ request('category') ? ucfirst(str_replace('-', ' ', request('category'))) : 'Our Programs' }}</h1>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="text-center mb-4">
            <div class="section-label">Popular Destination</div>
            <h2 class="section-title">Popular Destinations</h2>
            <div class="section-line section-line-center"></div>
        </div>

        {{-- Destination Grid --}}
        <div class="dest-grid {{ $programs->count() ? 'has-items' : '' }}">
            @forelse($programs as $program)
                <div class="dest-item">
                    @if($program->thumbnail)
                        <img src="{{ asset('storage/' . $program->thumbnail) }}" alt="{{ $program->title }}">
                    @else
                        <img src="{{ asset('images/2Q0A2992.JPG') }}" alt="{{ $program->title }}">
                    @endif
                    <div class="dest-info">
                        <h5>{{ $program->title }}</h5>
                        <small>{{ $program->category->name ?? '' }} {{ $program->duration ? '| '.$program->duration : '' }}</small>
                    </div>
                    <a href="{{ route('programs.show', $program->slug) }}"></a>
                </div>
            @empty
                <div class="text-center py-5" style="grid-column:1/-1;">
                    <i class="bi bi-search" style="font-size:3rem;color:#ccc;"></i>
                    <h5 style="color:#6b7280;margin-top:1rem;">No programs found</h5>
                    <a href="{{ route('programs.index') }}" class="btn btn-outline-primary rounded-pill mt-2 px-4" style="font-size:.85rem;">View All Programs</a>
                </div>
            @endforelse
        </div>

    </div>
</section>
@endsection
