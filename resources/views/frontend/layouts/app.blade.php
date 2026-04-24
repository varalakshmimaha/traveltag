<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', setting('site_name', 'TravelTag')) - {{ setting('tagline', 'Explore the World') }}</title>
    <meta name="description" content="@yield('meta_description', 'TravelTag - India\'s leading school trip organizer. We plan safe, structured educational tours, student travel programs, and school excursions from Bangalore. Trusted by 100+ schools.')">
    <meta name="keywords" content="@yield('meta_keywords', 'school trips, educational tours, student travel, school excursions, Bangalore school trips, student tour packages, school travel planner, educational travel India, school picnic organizer, student group tours, safe school trips, structured school travel, school trip management, corporate travel, leisure travel')">
    <meta name="author" content="TravelTag">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph --}}
    <meta property="og:title" content="@yield('title', 'TravelTag') - {{ setting('tagline', 'Explore the World') }}">
    <meta property="og:description" content="@yield('meta_description', 'TravelTag - India\'s leading school trip organizer. Safe, structured educational tours and student travel programs from Bangalore.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="TravelTag">
    <meta property="og:image" content="@yield('og_image', asset('storage/' . setting('logo')))">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'TravelTag') - {{ setting('tagline', 'Explore the World') }}">
    <meta name="twitter:description" content="@yield('meta_description', 'TravelTag - India\'s leading school trip organizer. Safe, structured educational tours and student travel programs from Bangalore.')">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    
    {{-- Dynamic Font Loading --}}
    @php
        $fontFamily = setting('font_family', 'Poppins');
        $fontUrl = match($fontFamily) {
            'Roboto' => 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700;800;900&display=swap',
            'Open Sans' => 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap',
            'Lato' => 'https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap',
            'Montserrat' => 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap',
            default => 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap',
        };
    @endphp
    <link href="{{ $fontUrl }}" rel="stylesheet">
    
    {{-- Favicon --}}
    @if(setting('favicon'))
        <link rel="icon" href="{{ asset('storage/' . setting('favicon')) }}" type="image/x-icon">
    @endif
    
    <style>
        @php
            $primaryColor = setting('primary_color', '#0066cc');
            $secondaryColor = setting('secondary_color', '#10b981');
            $fontFamily = setting('font_family', 'Poppins');
            $darkModeEnabled = setting('dark_mode_enabled', '0') == '1';
        @endphp
        
        :root {
            --primary: #89BFF3;
            --primary-hover: #6DB0EB;
            --primary-dark: #5AA3E3;
            --secondary: {{ $secondaryColor }};
            --bg: #F9F8F4;
            --charcoal: #606060;
            --taupe: #E0DEDA;
            --dark: #2C2C2C;
            --white: #FFFFFF;
            --light-blue-bg: #e8f4fd;
            --heading-color: #2C2C2C;
            --subheading-color: #6b7280;
        }
        
        @if($darkModeEnabled)
        body {
            background: #121212 !important;
            color: #ffffff !important;
        }
        body, * {
            --charcoal: #e0e0e0;
            --dark: #ffffff;
        }
        .footer, .page-header {
            background: #1e1e1e !important;
        }
        .card, .test-card, .blog-card, .program-card, .struct-card, .why-card {
            background: #1e1e1e !important;
            color: #ffffff !important;
        }
        .form-control, .form-select {
            background: #2a2a2a !important;
            color: #ffffff !important;
            border-color: #404040 !important;
        }
        .navbar, .main-navbar {
            background: #1e1e1e !important;
        }
        @endif
        
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: '{{ $fontFamily }}', sans-serif; color: var(--charcoal); background: var(--bg); font-size: 1.1rem; line-height: 1.75; }
        p, li, span, td, th, label, .form-control { font-size: 1.1rem; }

        /* Global typography color rules */
        h1, h2, h3, h4, h5, h6 { color: var(--heading-color) !important; }
        .section-subtitle,
        .subheading,
        .subtitle,
        .text-muted,
        small {
            color: var(--subheading-color) !important;
        }
        .text-primary,
        a.text-primary,
        .section-label,
        .main-navbar .navbar-brand span {
            color: var(--heading-color) !important;
        }
        a { color: inherit; }

        /* ===== NAVBAR ===== */
        .main-navbar { background: #4b4326; padding: .5rem 0; box-shadow: 0 2px 15px rgba(0,0,0,.15); z-index: 1000; }
        .main-navbar .navbar-brand {
            font-weight: 800; font-size: 1.5rem; color: #fff !important;
            display: inline-flex; align-items: center; min-height: 85px;
        }
        .main-navbar .navbar-brand span { color: #fff; }
        .main-navbar .navbar-brand img {
            height: 85px; width: auto; max-height: 85px; display: block; object-fit: contain;
            image-rendering: -webkit-optimize-contrast;
            border-radius: 8px; padding: 6px 10px;
        }
        .main-navbar .nav-link {
            font-weight: 600; color: #fff !important; padding: .5rem .65rem !important;
            font-size: .92rem; transition: .2s; white-space: nowrap;
        }
        .main-navbar .nav-link i { color: #fff !important; }
        .main-navbar .nav-link:hover, .main-navbar .nav-link.active { color: #89BFF3 !important; }
        .main-navbar .btn-getintouch {
            background: #fff; color: #4b4326; border: none; border-radius: 2rem;
            padding: .5rem 1.6rem; font-weight: 600; font-size: 1rem; transition: .3s;
            text-decoration: none;
        }
        .main-navbar .btn-getintouch i { color: #4b4326 !important; }
        .main-navbar .btn-getintouch:hover { background: #89BFF3; color: #fff; }
        .main-navbar .btn-getintouch:hover i { color: #fff !important; }
        .main-navbar .dropdown-menu { border-radius: .5rem; padding: .5rem 0; min-width: 220px; background: #4b4326; border: 1px solid rgba(255,255,255,.1); }
        .main-navbar .dropdown-item { font-size: 1rem; padding: .5rem 1.2rem; color: #fff; font-weight: 500; }
        .main-navbar .dropdown-item:hover { background: rgba(255,255,255,.1); color: #89BFF3; }
        .main-navbar .dropdown-toggle::after { color: #fff; }
        .main-navbar .navbar-toggler { border: none; }
        .main-navbar .navbar-toggler-icon { filter: invert(1); }

        /* ===== HERO ===== */
        .hero-section {
            background: linear-gradient(135deg, #d4eaf7 0%, #b8d8f0 40%, #89BFF3 100%);
            min-height: 600px; position: relative; overflow: hidden; display: flex; align-items: center;
            padding: 4rem 0;
        }
        .hero-section .hero-text { position: relative; z-index: 2; }
        .hero-section .hero-label {
            font-size: .75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 3px;
            color: var(--charcoal); margin-bottom: .5rem;
        }
        .hero-section h1 {
            font-size: 2.8rem; font-weight: 900; color: var(--dark); line-height: 1.15;
            text-transform: uppercase; letter-spacing: 1px; margin-bottom: 1rem;
        }
        .hero-section .hero-desc { font-size: 1rem; color: var(--charcoal); line-height: 1.7; max-width: 480px; margin-bottom: 1.5rem; }
        .hero-section .btn-explore {
            background: var(--dark); color: #fff; border: none; border-radius: .4rem;
            padding: .65rem 2rem; font-weight: 600; font-size: .9rem; text-decoration: none; transition: .3s;
        }
        .hero-section .btn-explore:hover { background: #1a1a1a; }
        .hero-images { position: relative; z-index: 2; }
        .hero-images .float-img {
            border-radius: 1rem; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,.15);
            position: absolute;
        }
        .hero-images .float-img img { width: 100%; height: 100%; object-fit: cover; }
        .hero-images .img-1 { width: 220px; height: 280px; top: 0; right: 40px; }
        .hero-images .img-2 { width: 170px; height: 170px; top: 20px; right: 280px; border-radius: 50%; }
        .hero-images .img-3 { width: 180px; height: 130px; bottom: 0; right: 250px; }
        .hero-images .img-4 { width: 140px; height: 180px; bottom: -20px; right: 50px; }
        .hero-dot {
            width: 12px; height: 12px; border-radius: 50%; background: var(--primary);
            position: absolute; z-index: 1;
        }

        /* ===== SECTIONS ===== */
        .section { padding: 5rem 0; }
        .section-label {
            font-size: .7rem; font-weight: 700; text-transform: uppercase; letter-spacing: 3px;
            color: var(--primary-dark); margin-bottom: .5rem;
        }
        .section-title {
            font-weight: 800; font-size: 2rem; color: var(--dark); margin-bottom: .5rem;
            line-height: 1.3;
        }
        .section-subtitle { color: var(--charcoal); margin-bottom: 2rem; font-size: 1rem; }
        .section-line {
            width: 50px; height: 3px; background: var(--primary); margin-bottom: 1.2rem;
        }
        .section-line-center { margin-left: auto; margin-right: auto; }
        .dot-pattern {
            display: inline-block; width: 40px; height: 40px;
            background: radial-gradient(circle, var(--primary) 2px, transparent 2px);
            background-size: 8px 8px;
        }

        /* ===== ABOUT SECTION ===== */
        .about-check { display: flex; align-items: flex-start; gap: .6rem; margin-bottom: .8rem; }
        .about-check i { color: var(--primary-dark); font-size: 1rem; margin-top: .15rem; flex-shrink: 0; }
        .about-check span { font-size: 1rem; color: var(--charcoal); }
        .about-image { border-radius: .75rem; overflow: hidden; box-shadow: 0 10px 35px rgba(0,0,0,.1); }
        .about-image img { width: 100%; height: 100%; object-fit: cover; }

        /* ===== VALUES STRIP ===== */
        .values-strip { background: transparent; padding: 3.5rem 0; position:relative; overflow:none; }
        .value-item { text-align: center; }
        .value-item h6 { font-size: 1.1rem; font-weight: 700; color: var(--heading-color); margin-bottom:.5rem; }
        .value-item p { font-size: 1rem; color: var(--subheading-color); }

        /* ===== HOW WE OPERATE ACCORDION ===== */
        .hwo-accordion .accordion-item {
            background:rgba(255,255,255,.95); border:none; border-radius:.5rem !important;
            margin-bottom:.5rem; overflow:hidden; backdrop-filter:blur(8px);
        }
        .hwo-accordion .accordion-button {
            font-weight:700; font-size:.92rem; color:#1a1a1a; padding:.9rem 1.2rem;
            background:transparent; box-shadow:none !important;
        }
        .hwo-accordion .accordion-button:not(.collapsed) {
            color:var(--primary-dark); background:rgba(255,255,255,1);
        }
        .hwo-accordion .accordion-button::after {
            background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%236b7280' viewBox='0 0 16 16'%3E%3Cpath d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/%3E%3Cpath d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/%3E%3C/svg%3E");
            width:20px; height:20px; background-size:20px;
        }
        .hwo-accordion .accordion-button:not(.collapsed)::after {
            background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%234A90D9' viewBox='0 0 16 16'%3E%3Cpath d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/%3E%3Cpath d='M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z'/%3E%3C/svg%3E");
            transform:none;
        }
        .hwo-accordion .accordion-body {
            padding:.2rem 1.2rem 1rem; font-size:.84rem; color:#4b5563; line-height:1.8;
        }

        /* ===== WHY CHOOSE US ===== */
        .why-card {
            border-radius: .75rem; overflow: hidden; background: var(--white);
            box-shadow: 0 4px 15px rgba(0,0,0,.06); transition: .3s; height: 100%;
        }
        .why-card:hover { transform: translateY(-5px); box-shadow: 0 8px 25px rgba(0,0,0,.1); }
        .why-card img { width: 100%; height: 200px; object-fit: cover; }
        .why-card .why-body { padding: 1.2rem; }
        .why-card h6 { font-weight: 700; color: var(--dark); font-size: .9rem; margin-bottom: .4rem; }
        .why-card p { font-size: .8rem; color: var(--charcoal); margin: 0; }

        /* ===== TRAVEL POINT ===== */
        .travel-point { background: var(--bg); }
        .stat-box { text-align: center; padding: 1rem; }
        .stat-box .stat-num { font-size: 2rem; font-weight: 800; color: var(--dark); }
        .stat-box .stat-lbl { font-size: .85rem; color: var(--charcoal); }

        /* ===== STRUCTURED SECTION ===== */
        .structured-section { background: var(--bg); }
        .struct-card {
            background: var(--white); border-radius: .75rem; overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,.05); height: 100%; transition: .3s;
        }
        .struct-card:hover { transform: translateY(-3px); }
        .struct-card img { width: 100%; height: 200px; object-fit: cover; }
        .struct-card .struct-body { padding: 1.2rem; }
        .struct-card h6 { font-weight: 700; color: var(--dark); font-size: .88rem; }
        .struct-card p { font-size: .8rem; color: var(--charcoal); }

        /* ===== GALLERY ===== */
        .gallery-item { border-radius: .5rem; overflow: hidden; cursor: pointer; }
        .gallery-item img { width: 100%; height: 220px; object-fit: cover; transition: .3s; }
        .gallery-item:hover img { transform: scale(1.05); }

        /* ===== DESTINATIONS ===== */
        .dest-card {
            background: #4b4326; border-radius: 1.25rem; overflow: hidden;
            box-shadow: 0 8px 30px rgba(0,0,0,.2); transition: .3s; height: 100%;
            display: flex; flex-direction: column;
        }
        .dest-card:hover { transform: translateY(-6px); box-shadow: 0 15px 40px rgba(75,67,38,.4); }
        .dest-card .dest-img {
            padding: 1rem 1rem 0; position: relative;
        }
        .dest-card .dest-img img {
            width: 100%; height: 220px; object-fit: cover; border-radius: .85rem;
        }
        .dest-card .dest-body {
            padding: 1.2rem 1.25rem; flex: 1; display: flex; flex-direction: column;
        }
        .dest-card .dest-badge {
            display: inline-flex; align-items: center; justify-content: center;
            width: 32px; height: 32px; background: #89BFF3; color: #fff;
            border-radius: .5rem; font-size: .85rem; font-weight: 700; margin-right: .6rem; flex-shrink: 0;
        }
        .dest-card .dest-title-row { display: flex; align-items: center; margin-bottom: .3rem; }
        .dest-card h5 { font-weight: 700; color: #fff !important; margin: 0; font-size: 1.2rem; }
        .dest-card .dest-sub { color: #89BFF3; font-size: .82rem; margin-bottom: .8rem; font-weight: 500; }
        .dest-card .dest-desc {
            color: rgba(255,255,255,.75); font-size: .88rem; line-height: 1.65; flex: 1;
        }
        .dest-card .dest-divider { border-top: 1px solid rgba(255,255,255,.08); margin: 1rem 0; }
        .dest-card .dest-btns { display: flex; gap: .75rem; }
        .dest-card .btn-explore {
            flex: 1; text-align: center; border: 1.5px solid #89BFF3; color: #89BFF3;
            border-radius: .6rem; padding: .55rem .8rem; font-size: .82rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: .5px; text-decoration: none; transition: .2s; background: transparent;
        }
        .dest-card .btn-explore:hover { background: #89BFF3; color: #fff; }
        .dest-card .btn-plan {
            flex: 1; text-align: center; background: #89BFF3; color: #4b4326;
            border-radius: .6rem; padding: .55rem .8rem; font-size: .82rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: .5px; text-decoration: none; transition: .2s; border: none;
        }
        .dest-card .btn-plan:hover { background: #6aabf0; }

        /* ===== TESTIMONIALS ===== */
        .testimonial-section { background: var(--bg); }
        .test-card {
            background: #fff; border-radius: 1rem; padding: 2rem;
            box-shadow: 0 6px 30px rgba(0,0,0,.06); position: relative; overflow: hidden;
            border: 1px solid rgba(0,0,0,.04); height: 100%;
            display: flex; flex-direction: column;
        }
        .test-card::before {
            content: '\201C'; position: absolute; top: 8px; left: 16px;
            font-size: 4.5rem; font-family: Georgia, serif; color: var(--primary);
            opacity: .1; line-height: 1; pointer-events: none;
        }
        .test-card .test-stars { margin-bottom: .7rem; }
        .test-card .test-stars i { color: #f59e0b; font-size: .85rem; margin-right: 1px; }
        .test-card .test-quote {
            font-size: .88rem; color: #4b5563; font-style: italic; line-height: 1.8;
            margin-bottom: 1.2rem; position: relative; z-index: 1; flex: 1;
        }
        .test-card .test-divider {
            width: 40px; height: 3px; background: var(--primary); border-radius: 3px;
            margin-bottom: 1rem;
        }
        .test-card .test-author { display: flex; align-items: center; gap: .8rem; }
        .test-card .test-avatar {
            width: 48px; height: 48px; border-radius: 50%; flex-shrink: 0;
            border: 2.5px solid var(--primary); padding: 2px; overflow: hidden;
        }
        .test-card .test-avatar img { width: 100%; height: 100%; object-fit: cover; border-radius: 50%; }
        .test-card .test-name { font-weight: 700; color: #000; font-size: .85rem; }
        .test-card .test-role { font-size: .73rem; color: #6b7280; }
        #homeTestimonials .carousel-indicators { bottom: -50px; }
        #homeTestimonials .carousel-indicators button {
            width: 10px; height: 10px; border-radius: 50%; background: var(--taupe);
            border: none; opacity: 1; transition: all .3s ease; margin: 0 5px;
        }
        #homeTestimonials .carousel-indicators button.active {
            background: var(--primary); width: 28px; border-radius: 5px;
        }
        #homeTestimonials .carousel-item { transition: transform .6s ease-in-out, opacity .4s ease; }

        /* ===== BLOG CARDS ===== */
        .blog-card {
            border: none; border-radius: .75rem; overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,.05); transition: .3s; background: var(--white); height: 100%;
        }
        .blog-card:hover { transform: translateY(-3px); box-shadow: 0 6px 20px rgba(0,0,0,.08); }
        .blog-card img { width: 100%; height: 200px; object-fit: cover; }
        .blog-card .blog-body { padding: 1.2rem; }

        /* ===== BUTTONS ===== */
        .btn-primary { background: var(--primary); border-color: var(--primary); color: #fff; }
        .btn-primary:hover { background: var(--primary-hover); border-color: var(--primary-hover); color: #fff; }
        .btn-outline-primary { color: var(--heading-color); border-color: var(--primary); }
        .btn-outline-primary:hover { background: var(--primary); border-color: var(--primary); color: #fff; }

        /* ===== PROGRAM CARDS ===== */
        .program-card {
            border: none; border-radius: 1rem; overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,.06); transition: all .4s ease; background: var(--white);
            display: flex; flex-direction: column; min-height: 100%;
        }
        .program-card:hover { transform: translateY(-8px); box-shadow: 0 12px 35px rgba(0,0,0,.12); }
        .program-card .card-img-wrap { position: relative; overflow: hidden; }
        .program-card .card-img-wrap img { height: 230px; object-fit: cover; width: 100%; transition: transform .5s ease; }
        .program-card:hover .card-img-wrap img { transform: scale(1.08); }
        .program-card .card-img-wrap .img-overlay {
            position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,.5) 0%, transparent 60%);
            opacity: 0; transition: opacity .4s ease;
        }
        .program-card:hover .card-img-wrap .img-overlay { opacity: 1; }
        .program-card .badge-cat {
            position: absolute; top: 14px; left: 14px; z-index: 2;
            background: rgba(255,255,255,.92); backdrop-filter: blur(6px);
            color: var(--primary-dark); font-size: .72rem; font-weight: 700;
            padding: .35rem .8rem; border-radius: 2rem; letter-spacing: .3px;
        }
        .program-card .card-body { padding: 1.3rem 1.3rem .8rem; }
        .program-card .card-content { flex: 1 1 auto; display: flex; flex-direction: column; }
        .program-card .card-body h5 { font-size: 1.05rem; font-weight: 700; color: var(--dark); margin-bottom: .5rem; line-height: 1.4; }
        .program-card .card-body .prog-desc { font-size: .82rem; color: var(--charcoal); line-height: 1.6; margin-bottom: .8rem; }
        .program-card .prog-meta {
            display: flex; align-items: center; justify-content: space-between;
            padding: .6rem 0; border-top: 1px solid rgba(0,0,0,.06); margin-top: auto;
        }
        .program-card .prog-meta .prog-dur { font-size: .78rem; color: var(--charcoal); display: flex; align-items: center; gap: .3rem; }
        .program-card .prog-meta .prog-price { font-size: 1rem; font-weight: 800; color: var(--primary-dark); }
        .program-card .card-footer {
            background: transparent; border: none; padding: 0 1.3rem 1.3rem; margin-top: auto;
        }
        .program-card .btn-view {
            display: flex; align-items: center; justify-content: center; gap: .5rem;
            width: 100%; padding: .65rem 1rem; border-radius: .6rem;
            font-size: .85rem; font-weight: 600; text-decoration: none;
            color: var(--primary-dark); background: var(--light-blue-bg);
            border: 1.5px solid transparent; transition: all .3s ease;
        }
        .program-card .btn-view i { transition: transform .3s ease; }
        .program-card:hover .btn-view {
            background: var(--primary); color: #fff; border-color: var(--primary);
        }
        .program-card:hover .btn-view i { transform: translateX(4px); }

        /* ===== PAGE HEADER ===== */
        .page-header { 
            background: linear-gradient(rgba(15, 23, 42, 0.75), rgba(15, 23, 42, 0.75)), url('https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover fixed; 
            padding: 5rem 0; 
            color: #fff; 
            background-blend-mode: multiply;
        }
        .page-header h1 { font-weight: 800; text-transform: uppercase; letter-spacing: .5px; color: #fff !important; }
        .page-header p { color: rgba(255, 255, 255, 0.8) !important; }

        /* ===== FOOTER ===== */
        .footer { background: #4b4326; color: #fff; padding: 3.5rem 0 0; font-family: inherit; }
        .footer-top { padding-bottom: 2.5rem; border-bottom: 1px solid rgba(255,255,255,.15); }
        .footer-grid { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 2rem; align-items: start; }
        .footer .footer-brand { position: relative; text-align: center; }
        .footer .footer-brand h4 { color: #fff; font-weight: 800; font-size: 1.8rem; letter-spacing: -0.5px; margin: 0 0 0.5rem 0; }
        .footer .footer-brand h4 span { color: #89BFF3; }
        .footer .footer-brand img {
            height: 140px; width: auto; max-height: 140px; object-fit: contain; display: block;
            image-rendering: -webkit-optimize-contrast;
            border-radius: 8px; padding: 6px 10px;
            margin: 0 auto;
        }
        .footer .footer-brand small { display: block; color: rgba(255,255,255,.7); font-size: 0.7rem; }
        .footer .footer-desc { font-size: 1rem; line-height: 1.7; color: rgba(255,255,255,.8); }
        .footer h6 { color: #fff !important; font-weight: 700; text-transform: uppercase; font-size: .85rem; letter-spacing: 1px; margin-bottom: 1.2rem; display: block; }
        .footer ul { list-style: none; padding: 0; margin: 0; }
        .footer ul li { margin-bottom: .7rem; }
        .footer ul li a { color: rgba(255,255,255,.8); text-decoration: none; font-size: .95rem; transition: all .2s ease; display: flex; align-items: center; }
        .footer ul li a i { margin-right: .6rem; font-size: .75rem; }
        .footer ul li a:hover { color: #89BFF3; padding-left: 0.3rem; }
        .footer .footer-contact { list-style: none; padding: 0; margin: 0; }
        .footer .footer-contact li { display: flex; align-items: center; gap: .6rem; font-size: .95rem; color: rgba(255,255,255,.8); margin-bottom: .7rem; }
        .footer .footer-contact li i { color: #fff; font-size: 0.9rem; flex-shrink: 0; }
        .footer .footer-contact li a { color: rgba(255,255,255,.8); text-decoration: none; transition: .2s; }
        .footer .footer-contact li a:hover { color: #89BFF3; }
        .footer-social { display: flex; gap: 0.8rem; margin-top: 1.5rem; }
        .footer-social-link {
            width: 40px; height: 40px; border-radius: 50%; background: rgba(255,255,255,.1);
            display: inline-flex; align-items: center; justify-content: center;
            color: #fff; text-decoration: none; font-size: .95rem; transition: all .2s ease; border: 1px solid rgba(255,255,255,.15); box-shadow: none;
        }
        .footer-social-link:hover { background: #89BFF3; color: #fff; border-color: #89BFF3; transform: translateY(-2px); }
        .footer-bottom { border-top: 1px solid rgba(255,255,255,.15); padding: 1.5rem 0; text-align: center; font-size: .75rem; color: rgba(255,255,255,.6); text-transform: uppercase; letter-spacing: 0.5px; }

        @if(! $darkModeEnabled)
        .main-navbar .dropdown-menu {
            background: var(--bg);
        }
        .main-navbar .dropdown-item {
            color: #333 !important;
        }
        .main-navbar .dropdown-item:hover {
            background: rgba(0,0,0,.06);
            color: var(--primary) !important;
        }
        section:not(.hero-section):not(.hwo-section):not(.page-header):not(.about-hero):not(.partner-sec):not(.prog-hero):not(.prog-hero-banner):not(.contact-hero) {
            background: var(--bg) !important;
        }
        @endif
        
        @media (max-width: 991px) {
            .footer-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }

        @media (max-width: 768px) {
            .footer-grid { grid-template-columns: 1fr; gap: 1.5rem; }
            .footer { text-align: center; }
            .footer ul li a,
            .footer .footer-contact li { justify-content: center; }
            .footer-social { justify-content: center; }
        }

        /* ===== RESPONSIVE ===== */
        @media(max-width:991px) {
            .hero-images { display: none; }
            .hero-section h1 { font-size: 1.6rem; }
            h1 { font-size: 1.8rem !important; }
            h2 { font-size: 1.5rem !important; }
            h3 { font-size: 1.25rem !important; }
            h4 { font-size: 1.1rem !important; }
            .section-title { font-size: 1.5rem; }
            .main-navbar .navbar-brand img { height: 55px; max-height: 55px; padding: 4px 7px; }
            .main-navbar .navbar-brand { min-height: 55px; }
            .main-navbar .nav-link { font-size: .95rem; }
        }
        @media(max-width:768px) {
            .section { padding: 2.5rem 0; }
            .hero-section { min-height: 400px; }
            h1 { font-size: 1.5rem !important; }
            h2 { font-size: 1.3rem !important; }
            h3 { font-size: 1.1rem !important; }
            h4 { font-size: 1rem !important; }
            .section-title { font-size: 1.3rem; }
            .section-label { font-size: .65rem; letter-spacing: 2px; }
            .dest-card .dest-img img { height: 160px; }
            .dest-card .dest-body { padding: 1rem; }
            .dest-card h5 { font-size: 1rem; }
            .dest-card .dest-desc { font-size: .8rem; }
            .dest-card .dest-badge { width: 26px; height: 26px; font-size: .75rem; }
            .dest-card .btn-explore, .dest-card .btn-plan { font-size: .72rem; padding: .45rem .5rem; }
            .main-navbar .navbar-brand img { height: 48px; max-height: 48px; padding: 3px 6px; }
            .main-navbar .navbar-brand { min-height: 48px; }
            .main-navbar .nav-link { font-size: .9rem; }
            .main-navbar .btn-getintouch { font-size: .85rem; padding: .4rem 1rem; }
            .footer .footer-brand img { height: 120px; max-height: 120px; }
        }
        @media(max-width:576px) {
            /* Force single column on mobile for cards/images — except stat counters */
            .section > .container > .row > .col-6,
            .values-strip .col-6,
            .dest-card-wrap.col-6,
            .row.g-4 > .col-6:not(.travel-point .col-6) { width: 100% !important; flex: 0 0 100% !important; max-width: 100% !important; }
            /* Keep stat counters 2 per row */
            .travel-point .col-6 { width: 50% !important; flex: 0 0 50% !important; max-width: 50% !important; }
            .stat-box { padding: .7rem .5rem; }
            .stat-box .stat-num { font-size: 1.4rem; }
            .stat-box .stat-lbl { font-size: .75rem; }
            /* About Us section spacing */
            .row.g-5 { --bs-gutter-y: 1.5rem !important; --bs-gutter-x: 0 !important; }
            h1 { font-size: 1.25rem !important; }
            h2 { font-size: 1.1rem !important; }
            h3 { font-size: 1rem !important; }
            h4 { font-size: .95rem !important; }
            .section-title { font-size: 1.15rem; }
            .hero-section h1 { font-size: 1.2rem !important; }
            body { font-size: .95rem; }
            p, li, span { font-size: .9rem; }
            .main-navbar .navbar-brand img { height: 40px; max-height: 40px; padding: 2px 5px; }
            .main-navbar .navbar-brand { min-height: 40px; }
            .main-navbar .nav-link { font-size: .85rem; }
            .main-navbar .btn-getintouch { font-size: .78rem; padding: .35rem .9rem; }
            .footer .footer-brand img { height: 100px; max-height: 100px; }
        }
    </style>
    @stack('styles')
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg main-navbar sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                @if(setting('logo'))
                    <img src="{{ asset('storage/' . setting('logo')) }}" alt="Logo" class="me-2">
                @else
                    <span>{{ setting('site_name', 'Travel') }}</span>Tag
                @endif
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('programs.*') ? 'active' : '' }}" href="{{ route('programs.index') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">Student Programs</a>
                        <ul class="dropdown-menu shadow-sm border-0">
                            @php
                                $studentProgramsCat = \App\Models\Category::where('slug', 'student-programs')->first();
                                $navCategories = $studentProgramsCat
                                    ? \App\Models\Category::active()->where('parent_id', $studentProgramsCat->id)->orderBy('sort_order')->orderBy('name')->get()
                                    : \App\Models\Category::active()->parents()->orderBy('sort_order')->orderBy('name')->get();
                            @endphp
                            @foreach($navCategories as $navCat)
                                <li><a class="dropdown-item" href="{{ route('programs.index', ['category' => $navCat->slug]) }}">{{ $navCat->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('corporates') ? 'active' : '' }}" href="{{ route('corporates') }}">For Corporates</a></li>
                    @php
                        $leisureCat = \App\Models\Category::where('slug', 'plan-your-leisure')->first();
                        $leisureSubCats = $leisureCat ? \App\Models\Category::active()->where('parent_id', $leisureCat->id)->orderBy('sort_order')->orderBy('name')->get() : collect();
                    @endphp
                    @if($leisureSubCats->count())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('leisure') ? 'active' : '' }}" href="{{ route('leisure') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">Plan Your Leisure</a>
                        <ul class="dropdown-menu shadow-sm border-0">
                            @foreach($leisureSubCats as $lCat)
                                <li><a class="dropdown-item" href="{{ route('programs.index', ['category' => $lCat->slug]) }}">{{ $lCat->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @else
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('leisure') ? 'active' : '' }}" href="{{ route('leisure') }}">Plan Your Leisure</a></li>
                    @endif
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('blogs.*') ? 'active' : '' }}" href="{{ route('blogs.index') }}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    {{-- Footer --}}
    <footer class="footer">
        <div class="container footer-top">
            <div class="footer-grid">
                {{-- Left: Brand & Address --}}
                <div>
                    <div class="footer-brand mb-1">
                        @if(setting('logo'))
                            <img src="{{ asset('storage/' . setting('logo')) }}" alt="Logo" class="mb-1">
                        @else
                            <h4 style="margin: 0 0 0.5rem 0;"><span>{{ setting('site_name', 'Travel') }}</span>Tag</h4>
                        @endif
                    </div>
                    <div class="footer-desc" style="font-size: 0.85rem; line-height: 1.6; margin-bottom: 0; color: rgba(255,255,255,.8); text-align: center;">
                        {{ setting('site_title', 'Your Student Travel Companion') }}
                    </div>
                </div>

                {{-- Middle: Links --}}
                <div>
                    <h6>Popular Links</h6>
                    <ul>
                        <li><a href="{{ route('about') }}"><i class="bi bi-chevron-right"></i> About Us</a></li>
                        <li><a href="{{ route('about') }}"><i class="bi bi-chevron-right"></i> Why Choose Us</a></li>
                        <li><a href="{{ route('about') }}"><i class="bi bi-chevron-right"></i> What Sets Us Apart</a></li>
                        <li><a href="{{ route('programs.index') }}"><i class="bi bi-chevron-right"></i> Programs</a></li>
                        <li><a href="{{ route('contact') }}"><i class="bi bi-chevron-right"></i> Contact Us</a></li>
                    </ul>
                </div>

                {{-- Right: Contact --}}
                <div>
                    <h6>Get In Touch</h6>
                    <ul class="footer-contact" style="margin-bottom: 1.5rem;">
                        <li style="margin-bottom: 0.8rem; align-items: flex-start;">
                            <i class="bi bi-geo-alt-fill" style="color: #fff; margin-top: 0.1rem;"></i>
                            <span style="color: rgba(255,255,255,.8);">{{ setting('address', 'RR Nagar Bangalore') }}</span>
                        </li>
                        <li style="margin-bottom: 0.8rem;">
                            <i class="bi bi-telephone-fill" style="color: #fff;"></i>
                            <a href="tel:{{ setting('phone', '+91988601872') }}" style="color: rgba(255,255,255,.8); text-decoration: none;">{{ setting('phone', '+91988601872') }}</a>
                        </li>
                        <li style="margin-bottom: 0.8rem;">
                            <i class="bi bi-envelope-fill" style="color: #fff;"></i>
                            <a href="mailto:{{ setting('email', 'enquiry@traveltag.co.in') }}" style="color: rgba(255,255,255,.8); text-decoration: none;">{{ setting('email', 'enquiry@traveltag.co.in') }}</a>
                        </li>
                    </ul>

                </div>

                {{-- Follow Us --}}
                <div>
                    <h6>Follow Us</h6>
                    <div class="footer-social" style="display: flex; gap: 0.8rem; margin-top: 0; flex-wrap: wrap;">
                        @if(setting('youtube_url'))
                            <a href="{{ setting('youtube_url') }}" target="_blank" class="footer-social-link"><i class="bi bi-youtube"></i></a>
                        @endif
                        @if(setting('facebook_url'))
                            <a href="{{ setting('facebook_url') }}" target="_blank" class="footer-social-link"><i class="bi bi-facebook"></i></a>
                        @endif
                        @if(setting('instagram_url'))
                            <a href="{{ setting('instagram_url') }}" target="_blank" class="footer-social-link"><i class="bi bi-instagram"></i></a>
                        @endif
                        @if(setting('twitter_url'))
                            <a href="{{ setting('twitter_url') }}" target="_blank" class="footer-social-link"><i class="bi bi-twitter-x"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">{{ setting('footer_text', '© ' . date('Y') . ' TravelTag. All rights reserved.') }}</div>
    </footer>

    {{-- Floating WhatsApp Button --}}
    <a href="https://wa.me/91988601872" target="_blank" class="whatsapp-float" aria-label="Chat on WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#fff" viewBox="0 0 16 16">
            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.325-.336-.445-.342-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
        </svg>
    </a>
    <style>
        .whatsapp-float {
            position: fixed;
            bottom: 25px;
            right: 25px;
            width: 56px;
            height: 56px;
            background: #25D366;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4);
            z-index: 9999;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .whatsapp-float:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.6);
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
