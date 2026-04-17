@extends('frontend.layouts.app')
@section('title', 'Leisure Travel & Holiday Experiences')
@section('meta_description', 'Curated leisure travel experiences by TravelTag — family holidays, weekend getaways, domestic and international vacations, and fully customized itineraries.')
@section('meta_keywords', 'leisure travel, family holidays, weekend getaways, vacation packages, honeymoon, holiday planner, customized itineraries, domestic tours, international holidays')

@push('styles')
<style>
    :root {
        --l-primary: #89BFF3;
        --l-primary-dark: #1e3a5f;
        --l-accent: #ff8c61;
        --l-ink: #0f172a;
        --l-muted: #6b7280;
        --l-soft: #f5f8fd;
    }

    /* ===== PAGE BANNER + BREADCRUMB ===== */
    .leis-banner {
        position: relative;
        min-height: 360px;
        display: flex; align-items: center; justify-content: center;
        color: #fff;
        padding: 3rem 0;
        overflow: hidden;
    }
    .leis-banner-bg { position: absolute; inset: 0; z-index: 0; }
    .leis-banner-bg img {
        width: 100%; height: 100%; object-fit: cover; object-position: center 40%;
        display: block;
    }
    .leis-banner-bg::after {
        content: ''; position: absolute; inset: 0;
        background: linear-gradient(180deg, rgba(15,23,42,.35) 0%, rgba(15,23,42,.6) 100%);
    }
    .leis-banner > .container { position: relative; z-index: 2; }
    .leis-banner .breadcrumb { justify-content: center; margin-bottom: .6rem; }
    .leis-banner .breadcrumb-item a {
        color: rgba(255,255,255,.65); text-decoration: none;
        font-size: .78rem; text-transform: uppercase; letter-spacing: 1.5px; font-weight: 600;
    }
    .leis-banner .breadcrumb-item.active {
        color: #fff; font-size: .78rem; text-transform: uppercase; letter-spacing: 1.5px; font-weight: 600;
    }
    .leis-banner .breadcrumb-item + .breadcrumb-item::before {
        color: rgba(255,255,255,.4); content: '\203A';
    }
    .leis-banner h1 {
        font-size: 2.4rem; font-weight: 900; color: #fff !important;
        text-transform: uppercase; letter-spacing: 1px; margin: 0;
        text-shadow: 0 4px 20px rgba(0,0,0,.5);
    }

    /* ===== DEFAULTS ===== */
    .leis-section { padding: 5rem 0; position: relative; }
    .leis-section-label {
        display: inline-block; font-size: .7rem; font-weight: 700;
        letter-spacing: 3px; text-transform: uppercase;
        color: var(--dark) !important; margin-bottom: .8rem;
    }
    .leis-section-title {
        font-size: 2rem; font-weight: 800; color: var(--dark) !important;
        margin-bottom: 1rem; line-height: 1.3; font-family: inherit;
    }
    .leis-section-sub {
        font-size: .95rem; color: var(--l-muted);
        max-width: 760px; margin: 0 auto 3rem; line-height: 1.8;
    }

    /* ===== INTRO SPLIT ===== */
    .leis-intro { padding: 5rem 0; background: #fff; }
    .leis-intro .intro-img-wrap {
        position: relative; border-radius: 1.2rem; overflow: hidden;
        box-shadow: 0 20px 60px rgba(15,23,42,.12);
    }
    .leis-intro .intro-img-wrap img {
        width: 100%; height: 520px; object-fit: cover; display: block;
        transition: transform .6s ease;
    }
    .leis-intro .intro-img-wrap:hover img { transform: scale(1.04); }
    .leis-intro .intro-img-wrap::after {
        content: ''; position: absolute; inset: 0;
        background: linear-gradient(to top right, rgba(137,191,243,.15), transparent 60%);
        pointer-events: none;
    }
    .leis-intro .intro-badge {
        position: absolute; top: 1.2rem; left: 1.2rem;
        background: rgba(255,255,255,.95); backdrop-filter: blur(8px);
        padding: .6rem 1.2rem; border-radius: 2rem;
        font-size: .72rem; font-weight: 700;
        color: var(--l-primary-dark); letter-spacing: 1.5px;
        text-transform: uppercase;
        display: inline-flex; align-items: center; gap: .4rem;
    }
    .leis-intro .intro-badge i { color: var(--l-primary); }
    .leis-intro .intro-content h2 {
        font-size: 2rem; font-weight: 800; color: var(--dark) !important;
        line-height: 1.3; margin-bottom: 1.2rem; font-family: inherit;
    }
    .leis-intro .intro-content p {
        font-size: .95rem; color: #4b5563; line-height: 1.85; margin-bottom: 1rem;
    }
    .leis-intro .intro-cta {
        display: inline-flex; align-items: center; gap: .5rem;
        background: #89BFF3; color: #fff !important;
        padding: .85rem 2rem; border-radius: 2.5rem;
        font-weight: 700; font-size: .9rem; text-decoration: none;
        margin-top: 1rem;
        transition: all .3s ease;
        box-shadow: 0 8px 24px rgba(137,191,243,.4);
    }
    .leis-intro .intro-cta:hover {
        transform: translateY(-3px); background: #6aa8e5;
        box-shadow: 0 14px 30px rgba(137,191,243,.55);
    }

    /* ===== SOLUTION CARDS ===== */
    .leis-solutions-grid {
        display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem;
    }
    .leis-solution-card {
        background: #fff; border-radius: 1.2rem; overflow: hidden;
        box-shadow: 0 10px 40px rgba(15,23,42,.06);
        border: 1px solid #eef2f7;
        transition: all .4s cubic-bezier(.4,0,.2,1);
        display: flex; flex-direction: column;
    }
    .leis-solution-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 60px rgba(30,58,95,.15);
        border-color: var(--l-primary);
    }
    .leis-solution-card .lsc-img {
        position: relative; width: 100%; height: 200px; overflow: hidden;
    }
    .leis-solution-card .lsc-img img {
        width: 100%; height: 100%; object-fit: cover;
        transition: transform .6s ease;
    }
    .leis-solution-card:hover .lsc-img img { transform: scale(1.08); }
    .leis-solution-card .lsc-img::after {
        content: ''; position: absolute; inset: 0;
        background: linear-gradient(to top, rgba(15,23,42,.25), transparent 60%);
    }
    .leis-solution-card .lsc-body {
        padding: 1.4rem 1.3rem; flex: 1; display: flex; flex-direction: column;
    }
    .leis-solution-card .lsc-icon {
        width: 44px; height: 44px; border-radius: .7rem;
        background: linear-gradient(135deg, #e8f3ff 0%, #d1e5fb 100%);
        display: flex; align-items: center; justify-content: center;
        color: var(--l-primary-dark); font-size: 1.2rem;
        margin-bottom: .9rem;
        box-shadow: 0 4px 12px rgba(137,191,243,.3);
    }
    .leis-solution-card h4 {
        font-size: 1.1rem; font-weight: 800; color: var(--dark) !important;
        margin-bottom: .6rem; line-height: 1.35; font-family: inherit;
    }
    .leis-solution-card p.intro {
        font-size: .82rem; color: #4b5563; line-height: 1.7;
        margin-bottom: .9rem;
    }
    .leis-solution-card ul.lsc-list {
        list-style: none; padding: 0; margin: 0;
    }
    .leis-solution-card ul.lsc-list li {
        position: relative; padding: .3rem 0 .3rem 1.4rem;
        font-size: .78rem; color: #1f2937;
        font-weight: 500;
    }
    .leis-solution-card ul.lsc-list li::before {
        content: '\F270'; /* bi-check2 */
        font-family: 'bootstrap-icons';
        position: absolute; left: 0; top: .3rem;
        color: var(--l-primary); font-weight: 700;
    }

    /* ===== WHY CHOOSE ===== */
    .leis-why {
        background: linear-gradient(180deg, #f5f8fd 0%, #fff 100%);
        position: relative; overflow: hidden;
    }
    .leis-why::before {
        content: ''; position: absolute; top: -120px; right: -120px;
        width: 380px; height: 380px; border-radius: 50%;
        background: radial-gradient(circle, rgba(137,191,243,.15), transparent 70%);
        pointer-events: none;
    }
    .leis-why::after {
        content: ''; position: absolute; bottom: -150px; left: -150px;
        width: 450px; height: 450px; border-radius: 50%;
        background: radial-gradient(circle, rgba(30,58,95,.06), transparent 70%);
        pointer-events: none;
    }
    .leis-why .container { position: relative; z-index: 2; }
    .leis-why-grid {
        display: grid; grid-template-columns: repeat(5, 1fr); gap: 1.2rem;
    }
    .leis-why-item {
        background: #fff; border: 1px solid #e5ebf3; border-radius: 1rem;
        padding: 1.8rem 1.2rem; text-align: center;
        transition: all .4s cubic-bezier(.4,0,.2,1);
        box-shadow: 0 6px 20px rgba(15,23,42,.04);
        position: relative; overflow: hidden;
    }
    .leis-why-item::before {
        content: ''; position: absolute; top: 0; left: 0;
        width: 100%; height: 3px;
        background: linear-gradient(90deg, var(--l-primary), var(--l-primary-dark));
        transform: scaleX(0); transform-origin: left;
        transition: transform .4s ease;
    }
    .leis-why-item:hover {
        transform: translateY(-8px);
        border-color: var(--l-primary);
        box-shadow: 0 18px 40px rgba(30,58,95,.15);
    }
    .leis-why-item:hover::before { transform: scaleX(1); }
    .leis-why-item .lwi-icon {
        width: 60px; height: 60px; border-radius: 1rem;
        background: linear-gradient(135deg, #e8f3ff 0%, #d1e5fb 100%);
        display: flex; align-items: center; justify-content: center;
        color: var(--l-primary-dark); font-size: 1.5rem;
        margin: 0 auto 1rem;
        transition: all .3s ease;
        box-shadow: 0 4px 14px rgba(137,191,243,.25);
    }
    .leis-why-item:hover .lwi-icon {
        background: linear-gradient(135deg, var(--l-primary), var(--l-primary-dark));
        color: #fff;
    }
    .leis-why-item h6 {
        font-size: .9rem; font-weight: 800;
        color: var(--dark) !important; margin: 0 0 .5rem 0;
        font-family: inherit;
    }
    .leis-why-item p {
        font-size: .78rem; color: #6b7280; margin: 0; line-height: 1.6;
    }

    /* ===== CTA BANNER ===== */
    .leis-cta-wrap { padding: 4rem 1rem; background: transparent; }
    .leis-cta-banner {
        position: relative; max-width: 1180px; margin: 0 auto;
        color: #fff;
        padding: 4.5rem 2rem; text-align: center;
        border-radius: 1.8rem; overflow: hidden;
        box-shadow: 0 30px 80px rgba(15,23,42,.25);
    }
    .leis-cta-bg { position: absolute; inset: 0; z-index: 0; }
    .leis-cta-bg img {
        width: 100%; height: 100%; object-fit: cover; display: block;
    }
    .leis-cta-bg::after {
        content: ''; position: absolute; inset: 0;
        background: linear-gradient(120deg, rgba(15,23,42,.7), rgba(30,58,95,.6));
    }
    .leis-cta-banner::before {
        content: ''; position: absolute; top: -80px; right: -80px;
        width: 280px; height: 280px; border-radius: 50%;
        background: radial-gradient(circle, rgba(137,191,243,.3), transparent 70%);
        z-index: 1;
    }
    .leis-cta-banner > *:not(.leis-cta-bg) { position: relative; z-index: 2; }
    .leis-cta-banner h2 {
        font-size: 2.3rem; font-weight: 900; color: #fff !important;
        margin-bottom: .7rem; font-family: inherit;
        text-shadow: 0 2px 10px rgba(0,0,0,.3);
    }
    .leis-cta-banner p {
        font-size: 1rem; color: #fff !important; opacity: .92;
        margin-bottom: 2rem; max-width: 660px; margin-left: auto; margin-right: auto;
    }
    .leis-cta-banner .cta-group {
        display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;
    }
    .leis-cta-banner .btn-primary-cta {
        background: var(--l-primary); color: #0f172a !important;
        padding: .95rem 2.2rem; border-radius: 2.5rem;
        font-weight: 700; font-size: .9rem;
        text-decoration: none; border: 2px solid var(--l-primary);
        transition: all .3s ease;
        box-shadow: 0 8px 24px rgba(137,191,243,.35);
    }
    .leis-cta-banner .btn-primary-cta:hover {
        background: #fff; border-color: #fff; transform: translateY(-3px);
    }
    .leis-cta-banner .btn-outline-cta {
        background: rgba(255,255,255,.08); backdrop-filter: blur(8px);
        color: #fff !important;
        padding: .95rem 2.2rem; border-radius: 2.5rem;
        font-weight: 700; font-size: .9rem;
        text-decoration: none; border: 2px solid #fff;
        transition: all .3s ease;
    }
    .leis-cta-banner .btn-outline-cta:hover {
        background: #fff; color: #0f172a !important; transform: translateY(-3px);
    }

    /* ===== ANIMATIONS ===== */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
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

    .leis-banner h1 { animation: fadeInUp .8s ease .1s both; }
    .leis-banner .breadcrumb { animation: fadeInUp .8s ease both; }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 1199px) {
        .leis-why-grid { grid-template-columns: repeat(3, 1fr); }
    }
    @media (max-width: 1199px) {
        .leis-solutions-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 991px) {
        .leis-banner h1 { font-size: 1.8rem; }
        .leis-banner { min-height: 220px; }
        .leis-intro .intro-img-wrap img { height: 380px; }
        .leis-section-title, .leis-intro .intro-content h2 { font-size: 1.7rem; }
        .leis-why-grid { grid-template-columns: repeat(2, 1fr); }
        .leis-cta-banner h2 { font-size: 1.7rem; }
    }
    @media (max-width: 640px) {
        .leis-solutions-grid { grid-template-columns: 1fr; }
    }
    @media (max-width: 575px) {
        .leis-why-grid { grid-template-columns: 1fr; }
        .leis-banner h1 { font-size: 1.4rem; }
    }
</style>
@endpush

@section('content')

{{-- ===== 1. PAGE BANNER + BREADCRUMB ===== --}}
<section class="leis-banner">
    <div class="leis-banner-bg">
        <img src="{{ asset('storage/2Q0A2781.JPG') }}" alt="Leisure banner">
    </div>
    <div class="container text-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">TravelTag</a></li>
                <li class="breadcrumb-item active">Plan Your Leisure</li>
            </ol>
        </nav>
        <h1>Leisure Offerings</h1>
    </div>
</section>

{{-- ===== 2. INTRO SPLIT ===== --}}
<section class="leis-intro">
    <div class="container">
        <div class="row g-5 align-items-center">
            {{-- Image Left --}}
            <div class="col-lg-6 reveal reveal-left">
                <div class="intro-img-wrap">
                    <img src="{{ asset('storage/2Q0A2992.JPG') }}" alt="Curated Leisure Travel">
                    <span class="intro-badge"><i class="bi bi-compass-fill"></i> Leisure Offerings</span>
                </div>
            </div>
            {{-- Content Right --}}
            <div class="col-lg-6 intro-content reveal reveal-right">
                <div class="leis-section-label">Leisure Offerings</div>
                <h2>Curated Leisure Travel Experiences</h2>
                <p>
                    At <strong>TravelTag</strong>, we believe leisure travel is more than just visiting a destination — it is about creating meaningful experiences, cherished memories, and moments of relaxation. Our leisure travel solutions are thoughtfully curated to offer seamless, comfortable, and enriching journeys for families, friends, couples, and individual travelers.
                </p>
                <p>
                    From short weekend escapes to long international vacations, we manage every aspect of the trip with <strong>precision and care</strong>, ensuring that our clients enjoy a stress-free and memorable travel experience from start to finish.
                </p>
                <p>
                    Whether you are planning a family holiday, a romantic getaway, a friends' reunion, or a personalized vacation, TravelTag brings together destination expertise, reliable travel management, and dedicated support to make every journey exceptional.
                </p>
                <a href="#leis-cta" class="intro-cta">
                    <i class="bi bi-send-fill"></i> Plan My Holiday
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ===== 3. OUR SOLUTIONS ===== --}}
<section class="leis-section" style="background:var(--l-soft);">
    <div class="container">
        <div class="text-center reveal reveal-up">
            <div class="leis-section-label">Our Leisure Travel Solutions</div>
            <h2 class="leis-section-title">Journeys Crafted Around You</h2>
            <p class="leis-section-sub">
                Four thoughtfully designed solution tracks that cover every kind of getaway — from quick weekend breaks to fully customized international holidays.
            </p>
        </div>

        <div class="leis-solutions-grid">
            {{-- Card 1 --}}
            <div class="leis-solution-card reveal reveal-up">
                <div class="lsc-img">
                    <img src="{{ asset('storage/2Q0A3081.JPG') }}" alt="Family Holidays">
                </div>
                <div class="lsc-body">
                    <div class="lsc-icon"><i class="bi bi-people-fill"></i></div>
                    <h4>Family Holidays &amp; Group Vacations</h4>
                    <p class="intro">Customized family holidays and group vacations that cater to diverse age groups and travel preferences — safe, comfortable, and enjoyable for all.</p>
                    <ul class="lsc-list">
                        <li>Family holidays</li>
                        <li>Multi-generational trips</li>
                        <li>Friends' getaways</li>
                        <li>Reunion trips</li>
                        <li>Festive &amp; seasonal vacations</li>
                    </ul>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="leis-solution-card reveal reveal-up">
                <div class="lsc-img">
                    <img src="{{ asset('storage/2Q0A3175.JPG') }}" alt="Weekend Getaways">
                </div>
                <div class="lsc-body">
                    <div class="lsc-icon"><i class="bi bi-sun-fill"></i></div>
                    <h4>Weekend Getaways &amp; Short Breaks</h4>
                    <p class="intro">Quick breaks from routine — designed to maximize experience within a limited timeframe. Perfect for busy professionals, families, and groups.</p>
                    <ul class="lsc-list">
                        <li>Hill station retreats</li>
                        <li>Beach holidays</li>
                        <li>Nature escapes</li>
                        <li>Heritage city tours</li>
                        <li>Wellness &amp; spa retreats</li>
                    </ul>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="leis-solution-card reveal reveal-up">
                <div class="lsc-img">
                    <img src="{{ asset('storage/2Q0A3199.JPG') }}" alt="Domestic and International Holidays">
                </div>
                <div class="lsc-body">
                    <div class="lsc-icon"><i class="bi bi-airplane-fill"></i></div>
                    <h4>Domestic &amp; International Holidays</h4>
                    <p class="intro">End-to-end holiday planning for destinations worldwide — from flights and hotels to visas, transfers, and guided experiences.</p>
                    <ul class="lsc-list">
                        <li>Flight &amp; rail reservations</li>
                        <li>Premium hotel &amp; resort bookings</li>
                        <li>Visa assistance &amp; travel insurance</li>
                        <li>Airport transfers &amp; transportation</li>
                        <li>Guided sightseeing tours</li>
                    </ul>
                </div>
            </div>

            {{-- Card 4 --}}
            <div class="leis-solution-card reveal reveal-up">
                <div class="lsc-img">
                    <img src="{{ asset('storage/2Q0A3460.JPG') }}" alt="Customized Itineraries">
                </div>
                <div class="lsc-body">
                    <div class="lsc-icon"><i class="bi bi-stars"></i></div>
                    <h4>Customized Leisure Itineraries</h4>
                    <p class="intro">Tailor-made journeys based on your interests, duration, budget, and travel style — adventure, culture, relaxation, or luxury.</p>
                    <ul class="lsc-list">
                        <li>Flexible day-wise itineraries</li>
                        <li>Customized accommodations</li>
                        <li>Special occasion trips</li>
                        <li>Theme-based vacations</li>
                        <li>Luxury travel experiences</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== 4. WHY CHOOSE ===== --}}
<section class="leis-section leis-why">
    <div class="container">
        <div class="text-center reveal reveal-up">
            <div class="leis-section-label">Why Choose TravelTag</div>
            <h2 class="leis-section-title">Why Travel With Us</h2>
            <p class="leis-section-sub">
                We combine personalized planning with trusted partners and round-the-clock support to deliver journeys that leave lasting impressions.
            </p>
        </div>

        <div class="leis-why-grid">
            <div class="leis-why-item reveal reveal-scale">
                <div class="lwi-icon"><i class="bi bi-person-heart"></i></div>
                <h6>Personalized Planning</h6>
                <p>Every trip curated to suit your objectives, budget, and preferences.</p>
            </div>
            <div class="leis-why-item reveal reveal-scale">
                <div class="lwi-icon"><i class="bi bi-headset"></i></div>
                <h6>End-to-End Support</h6>
                <p>From inquiry to return journey, we manage every travel detail.</p>
            </div>
            <div class="leis-why-item reveal reveal-scale">
                <div class="lwi-icon"><i class="bi bi-building-check"></i></div>
                <h6>Trusted Hospitality</h6>
                <p>Reliable hotels, transport partners, and destination experts.</p>
            </div>
            <div class="leis-why-item reveal reveal-scale">
                <div class="lwi-icon"><i class="bi bi-shield-check"></i></div>
                <h6>Safe &amp; Hassle-Free</h6>
                <p>Traveler comfort and 24/7 support ensure total peace of mind.</p>
            </div>
            <div class="leis-why-item reveal reveal-scale">
                <div class="lwi-icon"><i class="bi bi-stars"></i></div>
                <h6>Memorable Experiences</h6>
                <p>We go beyond bookings to create journeys that stay with you.</p>
            </div>
        </div>
    </div>
</section>

{{-- ===== 5. CTA BANNER ===== --}}
<section class="leis-cta-wrap" id="leis-cta">
    <div class="container-fluid px-3">
        <div class="leis-cta-banner reveal reveal-up">
            <div class="leis-cta-bg">
                <img src="{{ asset('storage/2Q0A3514.JPG') }}" alt="Holiday background">
            </div>
            <h2>Ready for your next getaway?</h2>
            <p>Discover curated leisure experiences designed around you. Let us help you plan a journey that is seamless, memorable, and tailored just for you.</p>
            <div class="cta-group">
                <a href="{{ route('contact') }}?source=leisure" class="btn-primary-cta"><i class="bi bi-map me-1"></i> Plan My Holiday</a>
                <a href="{{ route('contact') }}" class="btn-outline-cta"><i class="bi bi-telephone me-1"></i> Talk to Our Travel Expert</a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    (function(){
        const items = document.querySelectorAll('.reveal');
        if (!items.length) return;
        const io = new IntersectionObserver((entries) => {
            entries.forEach((e) => {
                if (e.isIntersecting) {
                    const el = e.target;
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
