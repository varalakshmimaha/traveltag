@extends('frontend.layouts.app')
@section('title', 'Corporate Travel & Experience Solutions')
@section('meta_description', 'Strategically designed corporate travel and experience solutions — leadership offsites, MICE, incentive programs, and team-building experiences managed end-to-end by TravelTag.')
@section('meta_keywords', 'corporate travel, MICE, leadership offsite, incentive travel, team building, business travel India, corporate event planning, conference mobility')

@push('styles')
<style>
    /* ===== CORPORATE PAGE ===== */
    :root {
        --c-primary: #89BFF3;
        --c-primary-dark: #1e3a5f;
        --c-ink: #0f172a;
        --c-muted: #6b7280;
        --c-soft: #f5f8fd;
    }

    /* ===== PAGE HEADER BANNER ===== */
    .corp-banner {
        position: relative;
        min-height: 360px;
        display: flex; align-items: center; justify-content: center;
        color: #fff;
        padding: 3rem 0;
        overflow: hidden;
    }
    .corp-banner-bg {
        position: absolute; inset: 0; z-index: 0;
    }
    .corp-banner-bg img {
        width: 100%; height: 100%; object-fit: cover; object-position: center 35%;
        display: block;
    }
    .corp-banner-bg::after {
        content: ''; position: absolute; inset: 0;
        background: linear-gradient(180deg, rgba(15,23,42,.35) 0%, rgba(15,23,42,.55) 100%);
    }
    .corp-banner > .container { position: relative; z-index: 2; }
    .corp-banner h1 {
        text-shadow: 0 4px 20px rgba(0,0,0,.5);
    }
    .corp-banner .breadcrumb { justify-content: center; margin-bottom: .6rem; }
    .corp-banner .breadcrumb-item a {
        color: rgba(255,255,255,.65); text-decoration: none;
        font-size: .78rem; text-transform: uppercase; letter-spacing: 1.5px; font-weight: 600;
    }
    .corp-banner .breadcrumb-item.active {
        color: #fff; font-size: .78rem; text-transform: uppercase; letter-spacing: 1.5px; font-weight: 600;
    }
    .corp-banner .breadcrumb-item + .breadcrumb-item::before {
        color: rgba(255,255,255,.4); content: '\203A';
    }
    .corp-banner h1 {
        font-size: 2.4rem; font-weight: 900; color: #fff !important;
        text-transform: uppercase; letter-spacing: 1px; margin: 0;
    }

    /* ===== INTRO SPLIT ===== */
    .corp-intro { padding: 5rem 0; background: #fff; }
    .corp-intro .intro-img-wrap {
        position: relative; border-radius: 1.2rem; overflow: hidden;
        box-shadow: 0 20px 60px rgba(15,23,42,.12);
    }
    .corp-intro .intro-img-wrap img {
        width: 100%; height: 480px; object-fit: cover; display: block;
        transition: transform .6s ease;
    }
    .corp-intro .intro-img-wrap:hover img { transform: scale(1.04); }
    .corp-intro .intro-img-wrap::after {
        content: ''; position: absolute; inset: 0;
        background: linear-gradient(to top right, rgba(137,191,243,.15), transparent 60%);
        pointer-events: none;
    }
    .corp-intro .intro-badge {
        position: absolute; top: 1.2rem; left: 1.2rem;
        background: rgba(255,255,255,.95); backdrop-filter: blur(8px);
        padding: .6rem 1.2rem; border-radius: 2rem;
        font-size: .72rem; font-weight: 700;
        color: var(--c-primary-dark); letter-spacing: 1.5px;
        text-transform: uppercase;
        display: inline-flex; align-items: center; gap: .4rem;
    }
    .corp-intro .intro-badge i { color: var(--c-primary); }
    .corp-intro .intro-content h2 {
        font-size: 2rem; font-weight: 800;
        line-height: 1.3; margin-bottom: 1.2rem;
    }
    .corp-intro .intro-content h2 span {
        color: var(--dark) !important;
    }
    .corp-intro .intro-content p {
        font-size: .95rem; color: #4b5563; line-height: 1.85; margin-bottom: 1rem;
    }
    .corp-intro .intro-cta {
        display: inline-flex; align-items: center; gap: .5rem;
        background: #89BFF3;
        color: #fff !important; padding: .85rem 2rem; border-radius: 2.5rem;
        font-weight: 700; font-size: .9rem; text-decoration: none;
        margin-top: 1rem;
        transition: all .3s ease;
        box-shadow: 0 8px 24px rgba(137,191,243,.4);
        border: none;
    }
    .corp-intro .intro-cta:hover {
        transform: translateY(-3px);
        background: #6aa8e5;
        box-shadow: 0 14px 30px rgba(137,191,243,.55);
    }

    /* ===== MODERN STATS BAND ===== */
    .corp-stats-band {
        position: relative;
        padding: 5rem 0; overflow: hidden;
        color: #fff;
    }
    .corp-stats-bg {
        position: absolute; inset: 0; z-index: 0;
    }
    .corp-stats-bg img {
        width: 100%; height: 100%; object-fit: cover; object-position: center;
        display: block;
    }
    .corp-stats-bg::after {
        content: ''; position: absolute; inset: 0;
        background: linear-gradient(135deg, rgba(15,23,42,.45), rgba(30,58,95,.35));
    }
    .corp-stats-band > .container { position: relative; z-index: 2; }
    .corp-stats-band::before {
        content: ''; position: absolute; top: -150px; left: -150px;
        width: 400px; height: 400px; border-radius: 50%;
        background: radial-gradient(circle, rgba(137,191,243,.2), transparent 70%);
    }
    .corp-stats-band::after {
        content: ''; position: absolute; bottom: -150px; right: -150px;
        width: 400px; height: 400px; border-radius: 50%;
        background: radial-gradient(circle, rgba(137,191,243,.15), transparent 70%);
    }
    .corp-stats-grid {
        position: relative; z-index: 2;
        display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem;
    }
    .corp-stat-card {
        background: rgba(255,255,255,.08);
        backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px);
        border: 1px solid rgba(255,255,255,.15);
        border-radius: 1.2rem;
        padding: 2.2rem 1.5rem;
        text-align: center;
        color: #fff;
        transition: all .4s cubic-bezier(.4,0,.2,1);
        position: relative;
        overflow: hidden;
    }
    .corp-stat-card::before {
        content: '';
        position: absolute; top: 0; left: -100%;
        width: 100%; height: 100%;
        background: linear-gradient(120deg, transparent, rgba(255,255,255,.08), transparent);
        transition: left .6s ease;
    }
    .corp-stat-card:hover {
        transform: translateY(-8px);
        background: rgba(137,191,243,.18);
        border-color: var(--c-primary);
        box-shadow: 0 20px 50px rgba(0,0,0,.3);
    }
    .corp-stat-card:hover::before { left: 100%; }
    .corp-stat-card .stat-icon {
        width: 64px; height: 64px; margin: 0 auto 1.2rem;
        border-radius: 1rem;
        background: rgba(137,191,243,.15);
        border: 1.5px solid rgba(137,191,243,.4);
        display: flex; align-items: center; justify-content: center;
        color: var(--c-primary); font-size: 1.6rem;
        transition: all .3s ease;
    }
    .corp-stat-card:hover .stat-icon {
        background: var(--c-primary); color: #0f172a;
        transform: scale(1.05);
    }
    .corp-stat-card .stat-num {
        font-size: 3rem; font-weight: 900; color: #fff !important;
        line-height: 1; margin-bottom: .4rem;
        font-family: 'Georgia', serif;
        letter-spacing: 1px;
    }
    .corp-stat-card .stat-dot {
        width: 6px; height: 6px; border-radius: 50%;
        background: var(--c-primary);
        margin: .8rem auto;
    }
    .corp-stat-card .stat-lbl {
        font-size: .72rem; font-weight: 700;
        letter-spacing: 2px; text-transform: uppercase;
        color: rgba(255,255,255,.85);
    }

    /* ===== SECTION DEFAULTS ===== */
    .corp-section { padding: 5rem 0; position: relative; }
    .corp-section-label {
        display: inline-block;
        font-size: .7rem;
        font-weight: 700;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: var(--dark) !important;
        margin-bottom: .8rem;
    }
    .corp-section-title,
    .corp-intro .intro-content h2,
    .corp-service-card .csc-body h4,
    .corp-why-item h6 {
        color: var(--dark) !important;
        font-family: inherit;
    }
    .corp-section-title {
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 1rem;
        line-height: 1.3;
    }
    .corp-section-sub {
        font-size: .95rem;
        color: var(--c-muted);
        max-width: 720px;
        margin: 0 auto 3rem;
        line-height: 1.8;
    }

    /* ===== SERVICE CARDS ===== */
    .corp-service-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.5rem;
    }
    .corp-service-card {
        background: #fff;
        border-radius: 1.2rem;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(15,23,42,.06);
        border: 1px solid #eef2f7;
        transition: all .4s cubic-bezier(.4,0,.2,1);
        display: flex; flex-direction: column;
    }
    .corp-service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 60px rgba(30,58,95,.15);
        border-color: var(--c-primary);
    }
    .corp-service-card .csc-img {
        position: relative; height: 180px; overflow: hidden;
    }
    .corp-service-card .csc-img img {
        width: 100%; height: 100%; object-fit: cover;
        transition: transform .6s ease;
    }
    .corp-service-card:hover .csc-img img { transform: scale(1.08); }
    .corp-service-card .csc-img::after {
        content: ''; position: absolute; inset: 0;
        background: linear-gradient(to top, rgba(15,23,42,.35), transparent 60%);
    }
    .corp-service-card .csc-icon {
        position: absolute; bottom: -25px; left: 25px;
        width: 55px; height: 55px; border-radius: 50%;
        background: linear-gradient(135deg, var(--c-primary), var(--c-primary-dark));
        display: flex; align-items: center; justify-content: center;
        color: #fff; font-size: 1.3rem;
        box-shadow: 0 8px 20px rgba(30,58,95,.25);
        z-index: 2;
    }
    .corp-service-card .csc-body {
        padding: 2rem 1.3rem 1.5rem;
    }
    .corp-service-card .csc-body h4 {
        font-size: 1rem; font-weight: 800; color: var(--dark) !important;
        margin-bottom: .6rem; line-height: 1.35;
    }
    .corp-service-card .csc-body p.intro {
        font-size: .8rem; color: #374151 !important; line-height: 1.65;
        margin-bottom: .9rem;
    }
    .corp-service-card ul.csc-list {
        list-style: none; padding: 0; margin: 0;
    }
    .corp-service-card ul.csc-list li {
        position: relative; padding: .4rem 0 .4rem 1.4rem;
        font-size: .78rem; color: #1f2937 !important;
        border-bottom: 1px dashed #eef2f7; font-weight: 500;
    }
    .corp-service-card ul.csc-list li:last-child { border-bottom: none; }
    .corp-service-card ul.csc-list li::before {
        content: '\F270'; /* bi-check2 */
        font-family: 'bootstrap-icons';
        position: absolute; left: 0; top: .4rem;
        color: var(--c-primary); font-weight: 700;
    }

    /* ===== WHY PARTNER ===== */
    .corp-why {
        background: linear-gradient(180deg, #f5f8fd 0%, #fff 100%);
        color: var(--c-ink);
        position: relative;
        overflow: hidden;
    }
    .corp-why::before {
        content: '';
        position: absolute; top: -120px; right: -120px;
        width: 380px; height: 380px; border-radius: 50%;
        background: radial-gradient(circle, rgba(137,191,243,.15), transparent 70%);
        pointer-events: none;
    }
    .corp-why::after {
        content: '';
        position: absolute; bottom: -150px; left: -150px;
        width: 450px; height: 450px; border-radius: 50%;
        background: radial-gradient(circle, rgba(30,58,95,.06), transparent 70%);
        pointer-events: none;
    }
    .corp-why .container { position: relative; z-index: 2; }
    .corp-why .corp-section-title { color: var(--dark) !important; }
    .corp-why .corp-section-sub { color: #4b5563 !important; }
    .corp-why-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.5rem;
    }
    .corp-why-item {
        background: #fff;
        border: 1px solid #e5ebf3;
        border-radius: 1rem;
        padding: 1.8rem 1.4rem;
        transition: all .4s cubic-bezier(.4,0,.2,1);
        position: relative;
        overflow: hidden;
        box-shadow: 0 6px 20px rgba(15,23,42,.04);
    }
    .corp-why-item::before {
        content: '';
        position: absolute; top: 0; left: 0;
        width: 100%; height: 3px;
        background: linear-gradient(90deg, var(--c-primary), var(--c-primary-dark));
        transform: scaleX(0); transform-origin: left;
        transition: transform .4s ease;
    }
    .corp-why-item:hover {
        transform: translateY(-8px);
        border-color: var(--c-primary);
        box-shadow: 0 18px 40px rgba(30,58,95,.15);
    }
    .corp-why-item:hover::before { transform: scaleX(1); }
    .corp-why-item .cwi-icon {
        width: 56px; height: 56px; border-radius: 1rem;
        background: linear-gradient(135deg, #e8f3ff 0%, #d1e5fb 100%);
        display: flex; align-items: center; justify-content: center;
        color: var(--c-primary-dark); font-size: 1.5rem;
        margin-bottom: 1.1rem;
        transition: all .3s ease;
        box-shadow: 0 4px 14px rgba(137,191,243,.25);
    }
    .corp-why-item:hover .cwi-icon {
        background: linear-gradient(135deg, var(--c-primary), var(--c-primary-dark));
        color: #fff;
    }
    .corp-why-item h6 {
        color: var(--dark) !important; font-size: .92rem; font-weight: 800;
        margin: 0 0 .4rem 0; line-height: 1.4;
    }
    .corp-why-item p {
        color: #6b7280 !important;
        font-size: .78rem; line-height: 1.6;
        margin: 0;
    }

    /* ===== INQUIRY FORM ===== */
    .corp-inquiry {
        background: var(--c-soft);
    }
    .corp-inquiry-wrap {
        background: #fff;
        border-radius: 1.5rem;
        box-shadow: 0 20px 60px rgba(15,23,42,.08);
        padding: 3rem;
        border: 1px solid #eef2f7;
    }
    .corp-inquiry .form-label {
        font-size: .78rem; font-weight: 600; color: #374151;
        text-transform: uppercase; letter-spacing: .5px;
        margin-bottom: .4rem;
    }
    .corp-inquiry .form-control,
    .corp-inquiry .form-select {
        border-radius: .6rem;
        border: 1.5px solid #e5e7eb;
        font-size: .88rem;
        padding: .7rem .9rem;
        transition: all .3s ease;
    }
    .corp-inquiry .form-control:focus,
    .corp-inquiry .form-select:focus {
        border-color: var(--c-primary);
        box-shadow: 0 0 0 4px rgba(137,191,243,.15);
    }
    .corp-inquiry .btn-proposal {
        background: linear-gradient(135deg, var(--c-primary-dark), #0f172a);
        color: #fff; border: none;
        padding: .95rem 2.5rem; border-radius: 2.5rem;
        font-weight: 700; font-size: .95rem;
        letter-spacing: .5px;
        transition: all .3s ease;
        display: inline-flex; align-items: center; gap: .6rem;
    }
    .corp-inquiry .btn-proposal:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(30,58,95,.3);
        background: linear-gradient(135deg, var(--c-primary), var(--c-primary-dark));
    }

    /* ===== BOTTOM CTA ===== */
    .corp-cta-wrap {
        padding: 4rem 1rem;
        background: transparent;
    }
    .corp-cta-banner {
        position: relative;
        max-width: 1180px; margin: 0 auto;
        background-color: #0f172a;
        background-image:
            linear-gradient(120deg, rgba(15,23,42,.7), rgba(30,58,95,.6)),
            url('https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        color: #fff;
        text-align: center;
        padding: 4.5rem 2rem;
        border-radius: 1.8rem;
        overflow: hidden;
        box-shadow: 0 30px 80px rgba(15,23,42,.25);
    }
    .corp-cta-banner::before {
        content: '';
        position: absolute; top: -80px; right: -80px;
        width: 280px; height: 280px; border-radius: 50%;
        background: radial-gradient(circle, rgba(137,191,243,.25), transparent 70%);
    }
    .corp-cta-banner::after {
        content: '';
        position: absolute; bottom: -100px; left: -100px;
        width: 320px; height: 320px; border-radius: 50%;
        background: radial-gradient(circle, rgba(137,191,243,.15), transparent 70%);
    }
    .corp-cta-banner > * { position: relative; z-index: 2; }
    .corp-cta-banner h2 {
        font-size: 2.3rem; font-weight: 900;
        color: #fff !important; margin-bottom: .7rem;
        text-shadow: 0 2px 10px rgba(0,0,0,.3);
    }
    .corp-cta-banner p {
        font-size: 1rem; color: #fff !important;
        opacity: .92;
        margin-bottom: 2rem; max-width: 660px; margin-left: auto; margin-right: auto;
    }
    .corp-cta-banner .cta-group {
        display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;
    }
    .corp-cta-banner .btn-primary-cta {
        background: var(--c-primary); color: #0f172a !important;
        padding: .95rem 2.2rem; border-radius: 2.5rem;
        font-weight: 700; font-size: .9rem;
        text-decoration: none; border: 2px solid var(--c-primary);
        transition: all .3s ease;
        box-shadow: 0 8px 24px rgba(137,191,243,.35);
    }
    .corp-cta-banner .btn-primary-cta:hover {
        background: #fff; border-color: #fff; transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(255,255,255,.3);
    }
    .corp-cta-banner .btn-outline-cta {
        background: rgba(255,255,255,.08);
        backdrop-filter: blur(8px);
        color: #fff !important;
        padding: .95rem 2.2rem; border-radius: 2.5rem;
        font-weight: 700; font-size: .9rem;
        text-decoration: none; border: 2px solid #fff;
        transition: all .3s ease;
    }
    .corp-cta-banner .btn-outline-cta:hover {
        background: #fff; color: #0f172a !important; border-color: #fff; transform: translateY(-3px);
    }

    /* ===== ANIMATIONS ===== */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeInLeft {
        from { opacity: 0; transform: translateX(-40px); }
        to { opacity: 1; transform: translateX(0); }
    }
    @keyframes fadeInRight {
        from { opacity: 0; transform: translateX(40px); }
        to { opacity: 1; transform: translateX(0); }
    }
    @keyframes scaleIn {
        from { opacity: 0; transform: scale(.9); }
        to { opacity: 1; transform: scale(1); }
    }

    .reveal { opacity: 0; transition: opacity .8s ease, transform .8s ease; }
    .reveal.revealed { opacity: 1; }
    .reveal-up { transform: translateY(40px); }
    .reveal-up.revealed { transform: translateY(0); }
    .reveal-left { transform: translateX(-40px); }
    .reveal-left.revealed { transform: translateX(0); }
    .reveal-right { transform: translateX(40px); }
    .reveal-right.revealed { transform: translateX(0); }
    .reveal-scale { transform: scale(.92); }
    .reveal-scale.revealed { transform: scale(1); }

    .corp-banner h1 { animation: fadeInUp .8s ease .1s both; }
    .corp-banner .breadcrumb { animation: fadeInUp .8s ease both; }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 1199px) {
        .corp-service-grid { grid-template-columns: repeat(2, 1fr); gap: 1.5rem; }
        .corp-stats-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 991px) {
        .corp-banner h1 { font-size: 1.8rem; }
        .corp-banner { min-height: 220px; }
        .corp-intro .intro-img-wrap img { height: 360px; }
        .corp-intro .intro-content h2 { font-size: 1.7rem; }
        .corp-why-grid { grid-template-columns: repeat(2, 1fr); }
        .corp-inquiry-wrap { padding: 2rem 1.5rem; }
        .corp-cta-banner h2 { font-size: 1.7rem; }
        .corp-section-title { font-size: 1.7rem; }
    }
    @media (max-width: 575px) {
        .corp-service-grid { grid-template-columns: 1fr; }
        .corp-why-grid { grid-template-columns: 1fr; }
        .corp-stats-grid { grid-template-columns: 1fr; }
        .corp-banner h1 { font-size: 1.4rem; }
        .corp-stat-card .stat-num { font-size: 2.4rem; }
    }
</style>
@endpush

@section('content')

{{-- ===== 1. PAGE BANNER + BREADCRUMB ===== --}}
<section class="corp-banner">
    <div class="corp-banner-bg">
        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1920&q=80" alt="Corporate banner">
    </div>
    <div class="container text-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">TravelTag</a></li>
                <li class="breadcrumb-item active">For Corporates</li>
            </ol>
        </nav>
        <h1>Corporate Offerings</h1>
    </div>
</section>

{{-- ===== 2. INTRO SPLIT (Image Left, Content Right) ===== --}}
<section class="corp-intro">
    <div class="container">
        <div class="row g-5 align-items-center">
            {{-- Image Left --}}
            <div class="col-lg-6 reveal reveal-left">
                <div class="intro-img-wrap">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80" alt="Corporate Travel Experience">
                    <span class="intro-badge"><i class="bi bi-briefcase-fill"></i> Enterprise Solutions</span>
                </div>
            </div>
            {{-- Content Right --}}
            <div class="col-lg-6 intro-content reveal reveal-right">
                <div class="corp-section-label">Corporate Offerings</div>
                <h2>Corporate Travel &amp; Experience Solutions</h2>
                <p>
                    At <strong>TravelTag</strong>, we deliver strategically designed corporate travel and experience solutions that support business objectives, strengthen team engagement, and elevate organizational culture.
                </p>
                <p>
                    From leadership offsites and annual retreats to conference mobility and incentive programs, we provide end-to-end travel management with <strong>precision, compliance, and on-ground excellence</strong>.
                </p>
                <p>
                    Our solutions are designed for organizations seeking a reliable partner to manage business travel experiences at scale.
                </p>
                <a href="#corp-inquiry" class="intro-cta">
                    <i class="bi bi-send-fill"></i> Request a Proposal
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ===== 3. MODERN STATS BAND ===== --}}
<section class="corp-stats-band">
    <div class="corp-stats-bg">
        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1920&q=80" alt="Corporate stats background">
    </div>
    <div class="container">
        <div class="corp-stats-grid">
            <div class="corp-stat-card reveal reveal-up">
                <div class="stat-icon"><i class="bi bi-people-fill"></i></div>
                <div class="stat-num">500+</div>
                <div class="stat-dot"></div>
                <div class="stat-lbl">Delegates Moved</div>
            </div>
            <div class="corp-stat-card reveal reveal-up">
                <div class="stat-icon"><i class="bi bi-building-fill"></i></div>
                <div class="stat-num">50+</div>
                <div class="stat-dot"></div>
                <div class="stat-lbl">Corporate Clients</div>
            </div>
            <div class="corp-stat-card reveal reveal-up">
                <div class="stat-icon"><i class="bi bi-headset"></i></div>
                <div class="stat-num">24/7</div>
                <div class="stat-dot"></div>
                <div class="stat-lbl">Travel Support</div>
            </div>
            <div class="corp-stat-card reveal reveal-up">
                <div class="stat-icon"><i class="bi bi-shield-check"></i></div>
                <div class="stat-num">100%</div>
                <div class="stat-dot"></div>
                <div class="stat-lbl">On-Ground Execution</div>
            </div>
        </div>
    </div>
</section>

{{-- ===== 2. ENTERPRISE SOLUTIONS ===== --}}
<section class="corp-section" style="background:#fff;">
    <div class="container">
        <div class="text-center reveal reveal-up">
            <div class="corp-section-label">Enterprise Solutions We Offer</div>
            <h2 class="corp-section-title">Built for Scale. Designed for Outcomes.</h2>
            <p class="corp-section-sub">
                Four purpose-built solution tracks that cover every corporate travel and experience need — from boardroom to destination.
            </p>
        </div>

        <div class="corp-service-grid">
            {{-- Card 1 --}}
            <div class="corp-service-card reveal reveal-up">
                <div class="csc-img">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=600&q=80" alt="Leadership Offsites">
                    <div class="csc-icon"><i class="bi bi-diagram-3-fill"></i></div>
                </div>
                <div class="csc-body">
                    <h4>Leadership Offsites & Strategic Retreats</h4>
                    <p class="intro">Curated experiences for leadership teams, business units, and cross-functional groups focused on planning, alignment, and team integration.</p>
                    <ul class="csc-list">
                        <li>Annual business planning meets</li>
                        <li>Leadership workshops</li>
                        <li>Management retreats</li>
                        <li>Strategy sessions</li>
                        <li>Board and stakeholder gatherings</li>
                    </ul>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="corp-service-card reveal reveal-up">
                <div class="csc-img">
                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=600&q=80" alt="MICE Conference Mobility">
                    <div class="csc-icon"><i class="bi bi-people-fill"></i></div>
                </div>
                <div class="csc-body">
                    <h4>MICE & Conference Mobility</h4>
                    <p class="intro">Comprehensive support for Meetings, Incentives, Conferences, and Exhibitions (MICE), ensuring seamless delegate movement and event logistics.</p>
                    <ul class="csc-list">
                        <li>Air, rail, and ground mobility</li>
                        <li>Accommodation management</li>
                        <li>Venue coordination</li>
                        <li>Delegate registration support</li>
                        <li>Airport and venue transfers</li>
                        <li>On-site helpdesk and concierge services</li>
                    </ul>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="corp-service-card reveal reveal-up">
                <div class="csc-img">
                    <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?auto=format&fit=crop&w=600&q=80" alt="Employee Engagement Travel">
                    <div class="csc-icon"><i class="bi bi-award-fill"></i></div>
                </div>
                <div class="csc-body">
                    <h4>Employee Engagement & Reward Travel</h4>
                    <p class="intro">High-impact domestic and international travel programs designed for employee recognition, channel partner rewards, and sales incentive initiatives.</p>
                    <ul class="csc-list">
                        <li>Reward top performers</li>
                        <li>Strengthen retention</li>
                        <li>Improve morale</li>
                        <li>Drive sales motivation</li>
                        <li>Build partner loyalty</li>
                    </ul>
                </div>
            </div>

            {{-- Card 4 --}}
            <div class="corp-service-card reveal reveal-up">
                <div class="csc-img">
                    <img src="https://images.unsplash.com/photo-1528605248644-14dd04022da1?auto=format&fit=crop&w=600&q=80" alt="Team Building Experiences">
                    <div class="csc-icon"><i class="bi bi-puzzle-fill"></i></div>
                </div>
                <div class="csc-body">
                    <h4>Team Building Experiences</h4>
                    <p class="intro">We design immersive team-building experiences that improve collaboration, leadership, and communication through curated travel-led engagements.</p>
                    <ul class="csc-list">
                        <li>Adventure and outdoor learning</li>
                        <li>Leadership activities</li>
                        <li>Collaboration workshops</li>
                        <li>Wellness retreats</li>
                        <li>Cultural immersion experiences</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== 3. WHY PARTNER ===== --}}
<section class="corp-section corp-why">
    <div class="container">
        <div class="text-center reveal reveal-up">
            <div class="corp-section-label">Why Choose TravelTag</div>
            <h2 class="corp-section-title">Why Leading Organizations<br>Partner With TravelTag</h2>
            <p class="corp-section-sub">
                We combine strategic planning, proven execution frameworks, and a 24/7 support model to deliver corporate travel at enterprise scale.
            </p>
        </div>

        <div class="corp-why-grid">
            <div class="corp-why-item reveal reveal-scale">
                <div class="cwi-icon"><i class="bi bi-bullseye"></i></div>
                <h6>Strategic Planning</h6>
                <p>Aligned precisely to your business objectives and KPIs.</p>
            </div>
            <div class="corp-why-item reveal reveal-scale">
                <div class="cwi-icon"><i class="bi bi-person-workspace"></i></div>
                <h6>Dedicated Account Manager</h6>
                <p>One expert point of contact for every engagement.</p>
            </div>
            <div class="corp-why-item reveal reveal-scale">
                <div class="cwi-icon"><i class="bi bi-graph-up-arrow"></i></div>
                <h6>Transparent Commercials</h6>
                <p>Clear pricing, no hidden costs, full cost visibility.</p>
            </div>
            <div class="corp-why-item reveal reveal-scale">
                <div class="cwi-icon"><i class="bi bi-bar-chart-line-fill"></i></div>
                <h6>Scalable Execution</h6>
                <p>From 20 to 2,000+ delegates — seamlessly managed.</p>
            </div>
            <div class="corp-why-item reveal reveal-scale">
                <div class="cwi-icon"><i class="bi bi-patch-check-fill"></i></div>
                <h6>Verified Vendor Network</h6>
                <p>Trusted hospitality &amp; mobility partners nationwide.</p>
            </div>
            <div class="corp-why-item reveal reveal-scale">
                <div class="cwi-icon"><i class="bi bi-headset"></i></div>
                <h6>24/7 Travel Support</h6>
                <p>Round-the-clock assistance during every trip.</p>
            </div>
            <div class="corp-why-item reveal reveal-scale">
                <div class="cwi-icon"><i class="bi bi-shield-lock-fill"></i></div>
                <h6>Risk &amp; Compliance</h6>
                <p>Safety-first execution with documented protocols.</p>
            </div>
            <div class="corp-why-item reveal reveal-scale">
                <div class="cwi-icon"><i class="bi bi-globe-americas"></i></div>
                <h6>Pan-India &amp; Global</h6>
                <p>Domestic and international destination coverage.</p>
            </div>
        </div>
    </div>
</section>

{{-- ===== 4. INQUIRY FORM ===== --}}
<section class="corp-section corp-inquiry" id="corp-inquiry">
    <div class="container">
        <div class="text-center reveal reveal-up">
            <div class="corp-section-label">Inquiry</div>
            <h2 class="corp-section-title">Plan Your Corporate Experience</h2>
            <p class="corp-section-sub">
                Tell us your requirements and our team will get back with a customized proposal tailored to your organization's objectives.
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="corp-inquiry-wrap reveal reveal-up">
                    @if(session('success'))
                        <div class="alert alert-success d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="source" value="Corporate Enquiry">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Company Name *</label>
                                <input type="text" name="company_name" class="form-control" placeholder="Your organization" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Contact Person *</label>
                                <input type="text" name="name" class="form-control" placeholder="Full name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Designation</label>
                                <input type="text" name="designation" class="form-control" placeholder="e.g. HR Head">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Mobile Number *</label>
                                <input type="tel" name="phone" class="form-control" placeholder="+91 XXXXX XXXXX" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Official Email ID *</label>
                                <input type="email" name="email" class="form-control" placeholder="name@company.com" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Number of Travelers</label>
                                <input type="number" name="travelers" class="form-control" placeholder="e.g. 50" min="1">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Preferred Destination</label>
                                <input type="text" name="destination" class="form-control" placeholder="e.g. Goa, Dubai">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Travel Dates</label>
                                <input type="text" name="travel_dates" class="form-control" placeholder="e.g. Jan 15 – 18, 2026">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Type of Requirement</label>
                                <select name="requirement_type" class="form-select">
                                    <option value="">Select type</option>
                                    <option>Offsite</option>
                                    <option>MICE</option>
                                    <option>Incentive</option>
                                    <option>Team Building</option>
                                    <option>Custom</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Budget Range</label>
                                <select name="budget" class="form-select">
                                    <option value="">Select budget</option>
                                    <option>Under 5 Lakhs</option>
                                    <option>5 – 15 Lakhs</option>
                                    <option>15 – 50 Lakhs</option>
                                    <option>50 Lakhs+</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Additional Requirements</label>
                                <textarea name="message" class="form-control" rows="4" placeholder="Tell us more about your objectives, expectations, special requests..."></textarea>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn-proposal">
                                <i class="bi bi-send-fill"></i> Request Proposal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== 5. BOTTOM CTA ===== --}}
<section class="corp-cta-wrap">
    <div class="container-fluid px-3">
        <div class="corp-cta-banner reveal reveal-up">
            <h2>Looking for an enterprise travel partner?</h2>
            <p>Reliable planning. Seamless execution. Exceptional experiences.</p>
            <div class="cta-group">
                <a href="#corp-inquiry" class="btn-primary-cta"><i class="bi bi-file-earmark-text me-1"></i> Get Custom Proposal</a>
                <a href="{{ route('contact') }}" class="btn-outline-cta"><i class="bi bi-telephone me-1"></i> Speak to Corporate Team</a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // ===== Scroll Reveal Animations =====
    (function(){
        const items = document.querySelectorAll('.reveal');
        if (!items.length) return;
        const io = new IntersectionObserver((entries) => {
            entries.forEach((e, i) => {
                if (e.isIntersecting) {
                    const el = e.target;
                    // stagger siblings
                    const delay = Array.from(el.parentElement.children).indexOf(el) * 100;
                    setTimeout(() => el.classList.add('revealed'), delay);
                    io.unobserve(el);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
        items.forEach(el => io.observe(el));
    })();
</script>
@endpush
