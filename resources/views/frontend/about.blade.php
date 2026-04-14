@extends('frontend.layouts.app')
@section('title', 'About Us')

@push('styles')
<style>
    /* ===== SCROLL ANIMATIONS ===== */
    @keyframes fadeInUp { from { opacity:0; transform:translateY(50px); } to { opacity:1; transform:translateY(0); } }
    @keyframes fadeInLeft { from { opacity:0; transform:translateX(-60px); } to { opacity:1; transform:translateX(0); } }
    @keyframes fadeInRight { from { opacity:0; transform:translateX(60px); } to { opacity:1; transform:translateX(0); } }
    @keyframes scaleIn { from { opacity:0; transform:scale(.85); } to { opacity:1; transform:scale(1); } }
    @keyframes slideUp { from { opacity:0; transform:translateY(30px); } to { opacity:1; transform:translateY(0); } }
    @keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
    @keyframes drawLine { from { width:0; } to { width:50px; } }
    @keyframes countPulse { 0%,100% { transform:scale(1); } 50% { transform:scale(1.05); } }

    .anim { opacity:0; }
    .anim.visible { animation-fill-mode:both; }
    .anim.visible.fade-up { animation:fadeInUp .8s ease forwards; }
    .anim.visible.fade-left { animation:fadeInLeft .8s ease forwards; }
    .anim.visible.fade-right { animation:fadeInRight .8s ease forwards; }
    .anim.visible.scale-in { animation:scaleIn .7s ease forwards; }
    .anim.visible.slide-up { animation:slideUp .6s ease forwards; }
    .anim.visible.fade-in { animation:fadeIn .8s ease forwards; }

    .anim-delay-1 { animation-delay:.1s !important; }
    .anim-delay-2 { animation-delay:.2s !important; }
    .anim-delay-3 { animation-delay:.3s !important; }
    .anim-delay-4 { animation-delay:.4s !important; }
    .anim-delay-5 { animation-delay:.5s !important; }
    .anim-delay-6 { animation-delay:.6s !important; }
    .anim-delay-7 { animation-delay:.7s !important; }
    .anim-delay-6 { animation-delay:.6s !important; }

    /* ===== ABOUT HERO ===== */
    .about-hero {
        position:relative; min-height:360px; display:flex; align-items:center; justify-content:center;
        background:url('https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=1600&h=500&fit=crop') center/cover no-repeat;
    }
    .about-hero::before { content:''; position:absolute; inset:0; background:linear-gradient(135deg,rgba(15,23,42,.8),rgba(30,58,138,.7)); }
    .about-hero .container { position:relative; z-index:2; text-align:center; color:#fff; }
    .about-hero h1 { font-size:2.8rem; font-weight:900; text-transform:uppercase; letter-spacing:2px; color:#fff !important; }
    .about-hero p { color:rgba(255,255,255,.7); font-size:.9rem; }
    .about-hero .breadcrumb { justify-content:center; margin-bottom:.8rem; }
    .about-hero .breadcrumb-item a { color:rgba(255,255,255,.65); text-decoration:none; font-size:.85rem; }
    .about-hero .breadcrumb-item.active { color:#fff; font-size:.85rem; }
    .about-hero .breadcrumb-item+.breadcrumb-item::before { color:rgba(255,255,255,.4); }

    /* ===== SECTION SPACING ===== */
    .abt-sec { padding:5.5rem 0; overflow:hidden; }

    /* ===== INTRO IMAGE ===== */
    .intro-img-wrap {
        position:relative; min-height:auto; width:100%; max-width:417px;
        margin:0 auto; display:flex; align-items:center; justify-content:center;
    }
    .intro-img-wrap .img-back {
        position:relative; width:100%; height:auto;
        object-fit:contain; border-radius: 0;
        box-shadow:none; z-index:1; display:block;
    }
    .intro-img-wrap .img-front {
        display:none;
    }
    .intro-img-wrap .pop-badge {
        display:none;
    }
    .intro-img-wrap .pop-badge i { font-size:1.1rem; color: #2dd4bf; }
    
    .intro-img-wrap .cam-badge {
        display:none;
    }
    .intro-img-wrap .cam-badge i { color: #64748b; font-size: 1.2rem; }

    /* ===== MISSION CARDS ===== */
    .mission-card {
        text-align:center; padding:2rem 1.5rem; border-radius:1rem;
        border:1px solid #f0f0f0; background:#fff; transition:all .4s ease; height:100%;
        position:relative; overflow:hidden;
    }
    .mission-card::after {
        content:''; position:absolute; bottom:0; left:0; width:100%; height:3px;
        background:var(--primary); transform:scaleX(0); transition:transform .4s ease;
    }
    .mission-card:hover::after { transform:scaleX(1); }
    .mission-card:hover { transform:translateY(-8px); box-shadow:0 15px 40px rgba(0,0,0,.08); }
    .mission-card .mc-icon {
        width:65px; height:65px; border-radius:50%; margin:0 auto 1.2rem;
        display:flex; align-items:center; justify-content:center; transition:transform .3s ease;
    }
    .mission-card:hover .mc-icon { transform:scale(1.1) rotate(5deg); }
    .mission-card .mc-icon i { font-size:1.5rem; color:#fff; }
    .mission-card h6 { font-weight:700; color:#000; font-size:.9rem; margin-bottom:.4rem; }
    .mission-card p { font-size:.8rem; color:#6b7280; margin:0; line-height:1.6; }

    /* ===== WHAT WE DO ===== */
    .wwd-card {
        display:flex; align-items:flex-start; gap:1.2rem; padding:1.5rem;
        background:#fff; border-radius:.75rem; border:1px solid #f0f0f0;
        transition:all .4s ease; height:100%; position:relative; overflow:hidden;
    }
    .wwd-card::before {
        content:''; position:absolute; top:0; left:0; width:4px; height:0;
        background:var(--primary); transition:height .4s ease;
    }
    .wwd-card:hover::before { height:100%; }
    .wwd-card:hover { box-shadow:0 8px 25px rgba(0,0,0,.06); transform:translateX(5px); }
    .wwd-num {
        width:46px; height:46px; border-radius:.6rem; background:var(--light-blue-bg);
        display:flex; align-items:center; justify-content:center; flex-shrink:0;
        font-weight:800; font-size:1rem; color:var(--primary-dark); transition:all .3s ease;
    }
    .wwd-card:hover .wwd-num { background:var(--primary); color:#fff; }
    .wwd-card h6 { font-weight:700; color:#000; font-size:.9rem; margin-bottom:.3rem; }
    .wwd-card p { font-size:.8rem; color:#6b7280; margin:0; line-height:1.6; }

    /* ===== APPROACH ===== */
    .approach-img { position:relative; }
    .approach-img img { width:100%; height:500px; object-fit:cover; border-radius:1rem; box-shadow:0 20px 50px rgba(0,0,0,.1); }
    .approach-overlay {
        position:absolute; bottom:20px; left:20px; right:20px;
        background:rgba(255,255,255,.95); backdrop-filter:blur(10px);
        border-radius:.75rem; padding:1rem 1.5rem;
        display:flex; gap:1.5rem; justify-content:center;
    }
    .approach-tag { text-align:center; }
    .approach-tag i { font-size:1.3rem; color:var(--primary-dark); display:block; margin-bottom:.2rem; }
    .approach-tag span { font-size:.72rem; font-weight:700; color:#000; text-transform:uppercase; letter-spacing:.5px; }
    .approach-list { list-style:none; padding:0; margin:0; }
    .approach-list li {
        display:flex; align-items:center; gap:.8rem; padding:.75rem 1rem;
        border-radius:.5rem; margin-bottom:.4rem; font-size:.85rem; color:#6b7280;
        transition:all .3s ease; cursor:default;
    }
    .approach-list li:hover { background:var(--light-blue-bg); color:#000; transform:translateX(5px); }
    .approach-list li i { color:var(--primary-dark); font-size:.9rem; flex-shrink:0; }

    /* ===== SAFETY ===== */
    /* ===== SAFETY CIRCULAR LAYOUT ===== */
    .safety-circle-wrap {
        position:relative; display:flex; align-items:center; justify-content:center; min-height:760px;
    }
    .safety-center-img {
        width:470px; height:470px; border-radius:50%; object-fit:cover; box-shadow:0 20px 60px rgba(0,0,0,.15);
        position:relative; z-index:3;
    }
    .safety-card {
        position:absolute; width:250px; text-align:center; padding:1.35rem 1.15rem;
        background:linear-gradient(135deg, #fff 0%, #f8fbff 100%);
        border-radius:1.05rem; box-shadow:0 8px 24px rgba(0,0,0,.08);
        transition:all .5s cubic-bezier(.4, 0, .2, 1);
        border:1px solid rgba(137,191,243,.1);
    }
    .safety-card:hover {
        box-shadow:0 20px 48px rgba(137,191,243,.2);
        border-color:var(--primary); transform:translateY(-12px) scale(1.05);
        background:linear-gradient(135deg, #e3f2fd 0%, #e8f4fd 100%);
    }
    .safety-card .sc-icon {
        width:54px; height:54px; border-radius:50%; margin:0 auto .85rem;
        display:flex; align-items:center; justify-content:center; font-size:1.35rem;
        background:rgba(137,191,243,.15); color:var(--primary); transition:all .3s ease;
        box-shadow:0 8px 16px rgba(137,191,243,.2);
    }
    .safety-card:hover .sc-icon {
        background:var(--primary); color:#fff; transform:scale(1.15); box-shadow:0 12px 28px rgba(137,191,243,.4);
    }
    .safety-card h5 { font-size:.92rem; font-weight:700; color:#1a1a1a; margin-bottom:.5rem; }
    .safety-card p { font-size:.8rem; color:#6b7280; line-height:1.55; margin:0; }
    
    /* Card positioning */
    .safety-card.top-left { top:-45px; left:5px; }
    .safety-card.top-right { top:-45px; right:5px; }
    .safety-card.bottom-left { bottom:-45px; left:5px; }
    .safety-card.bottom-right { bottom:-45px; right:5px; }
    
    @media(max-width:1200px) {
        .safety-circle-wrap { min-height:820px; }
        .safety-center-img { width:380px; height:380px; }
        .safety-card { width:220px; padding:1.2rem 1rem; }
        .safety-card .sc-icon { width:48px; height:48px; font-size:1.2rem; }
        .safety-card h5 { font-size:.86rem; }
        .safety-card p { font-size:.76rem; }
        .safety-card.top-left { top:-55px; left:0; }
        .safety-card.top-right { top:-55px; right:0; }
        .safety-card.bottom-left { bottom:-55px; left:0; }
        .safety-card.bottom-right { bottom:-55px; right:0; }
    }
    @media(max-width:768px) {
        .safety-circle-wrap { min-height:1200px; flex-wrap:wrap; }
        .safety-center-img { width:280px; height:280px; }
        .safety-card {
            position:static; width:100%; min-width:280px; margin:1rem auto;
        }
    }

    /* ===== TECHNOLOGY ===== */
    .tech-card {
        text-align:center; padding:0; border-radius:1rem; overflow:hidden;
        background:#fff; border:1px solid #f0f0f0; height:100%; transition:all .4s ease;
    }
    .tech-card:hover { transform:translateY(-8px); box-shadow:0 15px 40px rgba(0,0,0,.1); }
    .tech-card .tc-img { position:relative; overflow:hidden; }
    .tech-card .tc-img img { width:100%; height:200px; object-fit:cover; transition:transform .5s ease; }
    .tech-card:hover .tc-img img { transform:scale(1.08); }
    .tech-card .tc-num {
        position:absolute; top:14px; left:14px; width:38px; height:38px; border-radius:50%;
        background:linear-gradient(135deg,#22c55e,#16a34a); color:#fff;
        font-weight:800; font-size:.8rem; display:flex; align-items:center; justify-content:center;
        box-shadow:0 4px 12px rgba(34,197,94,.3);
    }
    .tech-card .tc-body { padding:1.3rem; }
    .tech-card h6 { font-weight:700; color:#000; font-size:.9rem; margin-bottom:.4rem; }
    .tech-card p { font-size:.8rem; color:#6b7280; margin:0; line-height:1.6; }

    /* ===== STRUCTURED ===== */
    .struct-grid { display:grid; grid-template-columns:repeat(auto-fit, minmax(320px, 1fr)); gap:1.8rem; margin-top:2rem; }
    .struct-card {
        background:linear-gradient(135deg, #fff 0%, #f8fbff 100%);
        border:2px solid transparent; border-radius:1.2rem;
        padding:2rem; transition:all .5s cubic-bezier(.4, 0, .2, 1);
        position:relative; overflow:hidden; cursor:pointer;
        box-shadow:0 8px 24px rgba(0,0,0,.06);
    }
    .struct-card::before {
        content:''; position:absolute; top:-40%; right:-40%; width:200px; height:200px;
        background:radial-gradient(circle, rgba(137,191,243,.1) 0%, transparent 70%);
        transition:all .5s ease;
    }
    .struct-card:hover::before { top:-20%; right:-20%; }
    .struct-card:hover {
        border-color:var(--primary); transform:translateY(-8px); box-shadow:0 20px 48px rgba(137,191,243,.2);
        background:linear-gradient(135deg, #f0f8ff 0%, #e3f2fd 100%);
    }
    .struct-card .sc-icon {
        width:56px; height:56px; border-radius:1rem; margin-bottom:1.2rem;
        display:flex; align-items:center; justify-content:center; font-size:1.6rem;
        position:relative; z-index:2; transition:all .3s ease;
        color:#89BFF3; background:rgba(137,191,243,.12);
    }
    .struct-card:hover .sc-icon {
        background:var(--primary); color:#fff; transform:scale(1.1) rotate(5deg);
        box-shadow:0 12px 24px rgba(137,191,243,.3);
    }
    .struct-card h5 {
        font-size:1.1rem; font-weight:700; color:#1a1a1a; margin-bottom:.6rem; position:relative; z-index:2;
    }
    .struct-card p {
        font-size:.85rem; color:#6b7280; line-height:1.7; margin:0; position:relative; z-index:2;
    }
    .struct-card .number {
        position:absolute; top:1.5rem; right:1.5rem; font-size:2.4rem; font-weight:900;
        color:rgba(137,191,243,.15); font-family:system-ui, -apple-system, sans-serif;
    }

    /* ===== PARTNERSHIP ===== */
    .partner-sec {
        position:relative; padding:5.5rem 0;
        background:url('https://images.unsplash.com/photo-1521737711867-e3b97375f902?w=1600&h=600&fit=crop') center/cover no-repeat fixed;
    }
    .partner-sec::before { content:''; position:absolute; inset:0; background:linear-gradient(135deg,rgba(15,23,42,.9),rgba(30,58,138,.85)); }
    .partner-sec .container { position:relative; z-index:2; }
    .partner-glass {
        background:rgba(255,255,255,.06); backdrop-filter:blur(16px);
        border:1px solid rgba(255,255,255,.1); border-radius:1rem;
        padding:2.5rem; color:#fff;
    }
    .partner-glass h3 { font-weight:800; color:#fff !important; margin-bottom:.5rem; font-size:1.5rem; }
    .partner-glass p { font-size:.85rem; color:rgba(255,255,255,.75); line-height:1.7; }
    .partner-glass h6 { color:#fff !important; }
    .partner-glass .pc { display:flex; align-items:center; gap:.6rem; margin-bottom:.5rem; }
    .partner-glass .pc i { color:var(--primary); font-size:1rem; flex-shrink:0; }
    .partner-glass .pc span { font-size:.85rem; color:rgba(255,255,255,.9); }

    /* ===== VISION ===== */
    .vision-card {
        text-align:center; padding:2rem 1.5rem; border-radius:1rem;
        background:#fff; border:1px solid #f0f0f0; height:100%; transition:all .4s ease;
    }
    .vision-card:hover { transform:translateY(-8px); box-shadow:0 15px 40px rgba(0,0,0,.08); }
    .vision-card .vc-num {
        width:44px; height:44px; border-radius:50%; background:var(--primary);
        color:#fff; font-weight:800; font-size:.85rem;
        display:inline-flex; align-items:center; justify-content:center;
        margin-bottom:.8rem;
    }
    .vision-card img { width:100%; height:180px; object-fit:cover; border-radius:.75rem; margin-bottom:1rem; }
    .vision-card h6 { font-weight:700; color:#000; font-size:.9rem; margin-bottom:.4rem; }
    .vision-card p { font-size:.8rem; color:#6b7280; line-height:1.7; margin:0; }

    /* ===== PHILOSOPHY ===== */
    .philo-card {
        padding:2rem; border-radius:1rem; height:100%; transition:all .4s ease;
        position:relative; overflow:hidden;
    }
    .philo-card::before {
        content:''; position:absolute; top:0; right:0; width:80px; height:80px;
        border-radius:0 0 0 80px; opacity:.15; transition:all .4s ease;
    }
    .philo-card:hover { transform:translateY(-6px); box-shadow:0 12px 35px rgba(0,0,0,.08); }
    .philo-card .phi-icon {
        width:52px; height:52px; border-radius:.7rem; display:flex; align-items:center;
        justify-content:center; margin-bottom:1rem; transition:transform .3s ease;
    }
    .philo-card:hover .phi-icon { transform:rotate(8deg) scale(1.1); }
    .philo-card .phi-icon i { font-size:1.3rem; color:#fff; }
    .philo-card h6 { font-weight:700; color:#000; font-size:.92rem; margin-bottom:.5rem; }
    .philo-card p { font-size:.82rem; color:#6b7280; margin:0; line-height:1.7; }

    /* ===== FOUNDER CTA SECTION ===== */
    .founder-cta-section {
        background:linear-gradient(135deg,#d4eaf7 0%, #b8d8f0 40%, #89BFF3 100%);
        border-radius:2rem; padding:5rem 3rem; position:relative; overflow:hidden;
        text-align:center;
    }
    .founder-cta-section::before {
        content:''; position:absolute; top:-100px; right:-100px; width:300px; height:300px;
        background:radial-gradient(circle,rgba(255,255,255,.2),transparent); border-radius:50%;
    }
    .founder-cta-section::after {
        content:''; position:absolute; bottom:-100px; left:-100px; width:350px; height:350px;
        background:radial-gradient(circle,rgba(255,255,255,.15),transparent); border-radius:50%;
    }
    .founder-cta-label {
        display:inline-block; background:rgba(255,255,255,.2); color:#fff; padding:.5rem 1.2rem;
        border-radius:2rem; font-size:.75rem; font-weight:700; text-transform:uppercase;
        letter-spacing:1px; margin-bottom:1.5rem; backdrop-filter:blur(8px);
    }
    .founder-cta-title {
        color:#fff !important; font-size:3rem; font-weight:900; line-height:1.2;
        margin-bottom:1rem; position:relative; z-index:2;
    }
    .founder-cta-subtitle {
        color:rgba(255,255,255,.9); font-size:1.1rem; margin-bottom:1rem; position:relative; z-index:2;
    }
    .founder-cta-desc {
        color:rgba(255,255,255,.8); font-size:.95rem; max-width:600px; margin:1rem auto 2rem;
        line-height:1.8; position:relative; z-index:2;
    }
    .founder-cta-buttons {
        display:flex; gap:1.5rem; justify-content:center; flex-wrap:wrap;
        margin:2.5rem 0; position:relative; z-index:2;
    }
    .founder-cta-btn-primary {
        background:#fff; color:#13a0fa; border:none; padding:.9rem 2.5rem;
        border-radius:2.5rem; font-weight:700; font-size:.95rem; text-decoration:none;
        transition:all .3s ease; box-shadow:0 10px 30px rgba(0,0,0,.15);
        cursor:pointer; display:inline-flex; align-items:center; gap:.6rem;
    }
    .founder-cta-btn-primary:hover {
        background:rgba(255,255,255,.95); color:#0066cc; transform:translateY(-3px);
        box-shadow:0 15px 40px rgba(0,0,0,.2);
    }
    .founder-cta-btn-secondary {
        background:rgba(0,0,0,.2); color:#fff; border:2px solid rgba(255,255,255,.3);
        padding:.85rem 2.5rem; border-radius:2.5rem; font-weight:700; font-size:.95rem;
        text-decoration:none; transition:all .3s ease; backdrop-filter:blur(8px);
        cursor:pointer; display:inline-flex; align-items:center; gap:.6rem;
    }
    .founder-cta-btn-secondary:hover {
        background:rgba(255,255,255,.15); border-color:#fff;
        box-shadow:0 8px 20px rgba(0,0,0,.1);
    }
    .founder-cta-features {
        display:flex; gap:2rem; justify-content:center; flex-wrap:wrap;
        margin-top:2.5rem; padding-top:2.5rem; border-top:1px solid rgba(255,255,255,.2);
        position:relative; z-index:2;
    }
    .founder-cta-feature {
        display:flex; align-items:center; gap:.8rem; color:rgba(255,255,255,.9);
        font-size:.9rem; font-weight:600;
    }
    .founder-cta-feature i {
        font-size:1.2rem; color:#fff;
    }
    @media(max-width:768px) {
        .founder-cta-section { padding:3rem 1.5rem; }
        .founder-cta-title { font-size:1.8rem; }
        .founder-cta-subtitle { font-size:.95rem; }
        .founder-cta-buttons { flex-direction:column; }
        .founder-cta-btn-primary,
        .founder-cta-btn-secondary { width:100%; justify-content:center; }
        .founder-cta-features { flex-direction:column; gap:1rem; }
    }

    @media(max-width:991px) {
        .about-hero h1 { font-size:2rem; }
        .abt-sec { padding:3.5rem 0; }
        .approach-img img { height:350px; }
        .intro-img-wrap { min-height: auto; max-width: 417px; margin-bottom: 2rem; }
        .intro-img-wrap .img-back { height: auto; width: 100%; max-width: 100%; }
        .intro-img-wrap .img-front { display:none; }
        .intro-img-wrap .pop-badge { right: -10px; }
        .founder-cta-title { font-size:2.2rem; }
    }
    @media(max-width:768px) {
        .about-hero h1 { font-size:1.6rem; }
        .founder-cta-section { padding:2.5rem 1.5rem; }
        .founder-cta-title { font-size:1.6rem; }
        .founder-cta-subtitle { font-size:.9rem; }
        .founder-cta-buttons { flex-direction:column; }
        .founder-cta-btn-primary,
        .founder-cta-btn-secondary { width:100%; justify-content:center; }
        .founder-cta-features { flex-direction:column; gap:1rem; }
    }
</style>
@endpush

@section('content')

{{-- ===== HERO ===== --}}
<section class="about-hero">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">About Us</li>
            </ol>
        </nav>
        <h1 class="anim fade-up visible">About Us</h1>
        <p class="anim fade-up visible anim-delay-2">India's Most Structured Student Travel Platform</p>
    </div>
</section>

{{-- ===== 1. ABOUT TRAVELTAG (Image Right) ===== --}}
<section class="abt-sec">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 anim fade-left">
                <div class="section-label">About Us</div>
                <h2 class="section-title">We Are Redefining<br>Student Travel in India</h2>
                <div class="section-line"></div>
                <p style="font-size:.88rem;color:#6b7280;line-height:1.85;margin-bottom:.8rem;">TravelTag is building India's most structured and technology-driven student travel platform, designed exclusively for schools and educational institutions.</p>
                <p style="font-size:.88rem;color:#6b7280;line-height:1.85;margin-bottom:.8rem;">At its core, TravelTag was created to solve a fundamental problem — school travel in India is largely unorganized, vendor-driven, and operationally risky. Trips are often managed through fragmented coordination, limited visibility, and inconsistent safety standards.</p>
                <p style="font-size:.9rem;color:#000;font-weight:700;font-style:italic;margin-bottom:1.2rem;">TravelTag exists to change this.</p>
                <div class="about-check"><i class="bi bi-check-circle-fill"></i><span>All places and activities are carefully picked by us.</span></div>
                <div class="about-check"><i class="bi bi-check-circle-fill"></i><span>End-to-end visibility and control for schools.</span></div>
                <div class="about-check"><i class="bi bi-check-circle-fill"></i><span>Trusted partner for institutional travel programs.</span></div>
                <a href="{{ route('programs.index') }}" class="btn btn-dark rounded-1 px-4 mt-3" style="font-size:.85rem;font-weight:600;">Read More</a>
            </div>
            <div class="col-lg-6 anim fade-right">
                <div class="intro-img-wrap">
                      <img src="{{ asset('storage/aboutusimage.png') }}" alt="Students on cultural trip" class="img-back">
                      <img src="{{ asset('storage/aboutusimage.png') }}" alt="Students at beach destination" class="img-front">
                      
                      <div class="pop-badge">
                          <i class="bi bi-geo-alt-fill"></i> Paradise on Earth
                      </div>
                      
                      <div class="cam-badge">
                          <i class="bi bi-camera-fill"></i>
                      </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== 2. OUR MISSION (Cards, Center) ===== --}}
<section class="abt-sec" style="background:var(--light-blue-bg);">
    <div class="container">
        <div class="text-center mb-5 anim fade-up">
            <div class="section-label">Our Mission</div>
            <h2 class="section-title">To make every school trip</h2>
            <div class="section-line section-line-center"></div>
            <p style="font-size:.88rem;color:#6b7280;max-width:600px;margin:0 auto;">We aim to shift school travel from an operational burden to a well-managed institutional program.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-3 col-6 anim scale-in anim-delay-1">
                <div class="mission-card">
                    <div class="mc-icon" style="background:linear-gradient(135deg,#3b82f6,#1d4ed8);"><i class="bi bi-shield-check"></i></div>
                    <h6>Safe by Design</h6>
                    <p>Safety embedded into the system itself, not left to chance or individuals</p>
                </div>
            </div>
            <div class="col-md-3 col-6 anim scale-in anim-delay-3">
                <div class="mission-card">
                    <div class="mc-icon" style="background:linear-gradient(135deg,#22c55e,#16a34a);"><i class="bi bi-diagram-3"></i></div>
                    <h6>Structured in Execution</h6>
                    <p>Process-driven operating model ensuring consistency in every journey</p>
                </div>
            </div>
            <div class="col-md-3 col-6 anim scale-in anim-delay-5">
                <div class="mission-card">
                    <div class="mc-icon" style="background:linear-gradient(135deg,#f59e0b,#d97706);"><i class="bi bi-eye"></i></div>
                    <h6>Transparent for Stakeholders</h6>
                    <p>Full visibility for schools & parents at every stage of the trip</p>
                </div>
            </div>
            <div class="col-md-3 col-6 anim scale-in anim-delay-7">
                <div class="mission-card">
                    <div class="mc-icon" style="background:linear-gradient(135deg,#8b5cf6,#6d28d9);"><i class="bi bi-mortarboard"></i></div>
                    <h6>Meaningful for Students</h6>
                    <p>Learning-focused travel experiences that go far beyond classrooms</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== 3. WHAT WE DO (Text Left, Cards Right) ===== --}}
<section class="abt-sec">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5 anim fade-left">
                <div class="section-label">What We Do</div>
                <h2 class="section-title">End-to-End Educational Travel for Learning & Growth</h2>
                <div class="section-line"></div>
                <p style="font-size:.88rem;color:#6b7280;line-height:1.85;">TravelTag partners with schools to design and execute end-to-end travel programs across domestic and international destinations. Each program is developed with a clear intent — to combine learning, exposure, and structured execution into one seamless experience.</p>
            </div>
            <div class="col-lg-7">
                <div class="row g-3">
                    <div class="col-md-6 anim fade-up anim-delay-1">
                        <div class="wwd-card">
                            <div class="wwd-num">01</div>
                            <div><h6>Educational Tours</h6><p>Aligned with academic themes and curriculum goals</p></div>
                        </div>
                    </div>
                    <div class="col-md-6 anim fade-up anim-delay-2">
                        <div class="wwd-card">
                            <div class="wwd-num">02</div>
                            <div><h6>Industrial Visits</h6><p>Real-world exposure through industry interactions</p></div>
                        </div>
                    </div>
                    <div class="col-md-6 anim fade-up anim-delay-3">
                        <div class="wwd-card">
                            <div class="wwd-num">03</div>
                            <div><h6>Experiential Journeys</h6><p>Outdoor and activity-based learning experiences</p></div>
                        </div>
                    </div>
                    <div class="col-md-6 anim fade-up anim-delay-4">
                        <div class="wwd-card">
                            <div class="wwd-num">04</div>
                            <div><h6>International Programs</h6><p>Global student mobility for broader perspectives</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== 4. OUR APPROACH (Image Left, Text Right) ===== --}}
<section class="abt-sec" style="background:var(--bg);">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 anim fade-left">
                <div class="approach-img">
                    <img src="https://images.unsplash.com/photo-1527631746610-bca00a040d60?w=700&h=550&fit=crop" alt="System approach">
                    <div class="approach-overlay">
                        <div class="approach-tag"><i class="bi bi-check-circle-fill"></i><span>Consistent</span></div>
                        <div class="approach-tag"><i class="bi bi-clipboard-check"></i><span>Accountable</span></div>
                        <div class="approach-tag"><i class="bi bi-arrow-up-right-circle"></i><span>Scalable</span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 anim fade-right">
                <div class="section-label">Our Approach</div>
                <h2 class="section-title">System Over Vendor</h2>
                <div class="section-line"></div>
                <p style="font-size:.88rem;color:#6b7280;line-height:1.85;margin-bottom:1rem;">Traditional school trips depend heavily on individual vendors and manual coordination. TravelTag replaces this with a system-driven operating model.</p>
                <p style="font-size:.85rem;font-weight:700;color:#000;margin-bottom:.6rem;">We take complete ownership of:</p>
                <ul class="approach-list">
                    <li><i class="bi bi-arrow-right-circle-fill"></i> Requirement mapping and program design</li>
                    <li><i class="bi bi-arrow-right-circle-fill"></i> Vendor selection, verification, and coordination</li>
                    <li><i class="bi bi-arrow-right-circle-fill"></i> Detailed itinerary planning with time discipline</li>
                    <li><i class="bi bi-arrow-right-circle-fill"></i> On-ground execution and supervision</li>
                    <li><i class="bi bi-arrow-right-circle-fill"></i> Continuous communication with schools and parents</li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- ===== 5. SAFETY AS A SYSTEM (Circular Layout) ===== --}}
<section class="abt-sec" style="background:#fff;">
    <div class="container">
        <div class="text-center mb-5 anim fade-up">
            <div class="section-label">Safety As A System</div>
            <h2 class="section-title">Get The Best Travel Experience</h2>
            <div class="section-line section-line-center"></div>
            <p style="font-size:.88rem;color:#6b7280;max-width:650px;margin:1rem auto 0;">Safety is embedded at every stage of the journey. Every trip operates on clearly defined protocols, making safety not just an assurance, but a guarantee.</p>
        </div>
        
        <div class="safety-circle-wrap">
            <!-- Center Image -->
            <img src="{{ asset('storage/programs/kerala-backwaters-culture.jpg') }}" alt="Students on travel" class="safety-center-img anim scale-in">
            
            <!-- Top Left Card -->
            <div class="safety-card top-left anim fade-up anim-delay-1">
                <div class="sc-icon"><i class="bi bi-patch-check"></i></div>
                <h5>Verified and audited travel partners</h5>
                <p>We work only with partners who meet our safety benchmarks, checked and re-checked before every engagement</p>
            </div>
            
            <!-- Top Right Card -->
            <div class="safety-card top-right anim fade-up anim-delay-2">
                <div class="sc-icon"><i class="bi bi-person-badge"></i></div>
                <h5>Trained & Accountable Trip Coordinators</h5>
                <p>Our coordinators are not just guides. They are trained responders, equipped to act with clarity under pressure.</p>
            </div>
            
            <!-- Bottom Left Card -->
            <div class="safety-card bottom-left anim fade-up anim-delay-3">
                <div class="sc-icon"><i class="bi bi-file-earmark-check"></i></div>
                <h5>Standard Operating Procedures</h5>
                <p>Every stage of the journey follows documented protocols, so nothing is left to chance or memory.</p>
            </div>
            
            <!-- Bottom Right Card -->
            <div class="safety-card bottom-right anim fade-up anim-delay-4">
                <div class="sc-icon"><i class="bi bi-exclamation-triangle"></i></div>
                <h5>Defined Escalation & Emergency Response</h5>
                <p>Clear chains of action exist for every scenario, so decisions are never delayed when it matters most.</p>
            </div>
        </div>
    </div>
</section>

{{-- ===== 6. TECHNOLOGY (Cards with Images, Center) ===== --}}
<section class="abt-sec" style="background:var(--bg);">
    <div class="container">
        <div class="text-center mb-5 anim fade-up">
            <div class="section-label">Technology-Enabled Travel Ecosystem</div>
            <h2 class="section-title">TravelTag makes school trips easy, safe,<br>and well-coordinated.</h2>
            <div class="section-line section-line-center"></div>
            <p style="font-size:.88rem;color:#6b7280;max-width:620px;margin:0 auto;">Our platform-driven approach transforms school travel from a manual, fragmented process into a connected and transparent ecosystem.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-4 anim fade-up anim-delay-1">
                <div class="tech-card">
                    <div class="tc-img">
                        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=500&h=300&fit=crop" alt="Real-time updates">
                        <div class="tc-num">01</div>
                    </div>
                    <div class="tc-body">
                        <h6>Real-time updates during trips</h6>
                        <p>Track every moment of the trip instantly. Stay informed about routes, locations, and safety.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 anim fade-up anim-delay-3">
                <div class="tech-card">
                    <div class="tc-img">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=500&h=300&fit=crop" alt="Communication">
                        <div class="tc-num">02</div>
                    </div>
                    <div class="tc-body">
                        <h6>Centralized communication</h6>
                        <p>Schools, parents, and coordinators stay connected in real-time. No more missed messages.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 anim fade-up anim-delay-5">
                <div class="tech-card">
                    <div class="tc-img">
                        <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=500&h=300&fit=crop" alt="Documentation">
                        <div class="tc-num">03</div>
                    </div>
                    <div class="tc-body">
                        <h6>Structured documentation</h6>
                        <p>Trip records, reports, and forms are organized and easy to access for all stakeholders.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== 7. STRUCTURED, MEASURABLE, REPEATABLE (Grid Cards) ===== --}}
    <section class="abt-sec" style="background:var(--bg);">
        <div class="container">
            <div class="text-center mb-5 anim fade-up">
                <div class="section-label">Our Standards</div>
                <h2 class="section-title">Structured, Measurable, Repeatable</h2>
                <div class="section-line section-line-center"></div>
                <p style="font-size:.95rem;color:#6b7280;line-height:1.85;max-width:650px;margin:1.5rem auto 0;">One of the biggest gaps in school travel today is inconsistency. TravelTag focuses on building systems that deliver the same quality every single time. Every trip is designed to be <strong style="color:#000;">structured in planning, disciplined in execution, and reliable in outcome.</strong></p>
            </div>
            
            <div class="struct-grid">
                <div class="struct-card anim fade-up anim-delay-1">
                    <div class="number">01</div>
                    <div class="sc-icon"><i class="bi bi-file-earmark-ruled"></i></div>
                    <h5>Standardized Program Formats</h5>
                    <p>Every trip follows a defined template ensuring consistency across all programs and institutions.</p>
                </div>
                <div class="struct-card anim fade-up anim-delay-2">
                    <div class="number">02</div>
                    <div class="sc-icon"><i class="bi bi-clipboard2-data"></i></div>
                    <h5>Defined Execution Frameworks</h5>
                    <p>Clear SOPs, checklists, and coordination protocols for every stage of the journey.</p>
                </div>
                <div class="struct-card anim fade-up anim-delay-3">
                    <div class="number">03</div>
                    <div class="sc-icon"><i class="bi bi-arrow-repeat"></i></div>
                    <h5>Repeatable Travel Models</h5>
                    <p>Scalable programs designed to be replicated reliably across schools and destinations.</p>
                </div>
                <div class="struct-card anim fade-up anim-delay-4">
                    <div class="number">04</div>
                    <div class="sc-icon"><i class="bi bi-check2-square"></i></div>
                    <h5>Structured in Planning</h5>
                    <p>Comprehensive pre-trip coordination ensuring all stakeholders are aligned and prepared.</p>
                </div>
                <div class="struct-card anim fade-up anim-delay-5">
                    <div class="number">05</div>
                    <div class="sc-icon"><i class="bi bi-bullseye"></i></div>
                    <h5>Disciplined in Execution</h5>
                    <p>Professional on-ground management with real-time monitoring and seamless coordination.</p>
                </div>
                <div class="struct-card anim fade-up anim-delay-6">
                    <div class="number">06</div>
                    <div class="sc-icon"><i class="bi bi-trophy"></i></div>
                    <h5>Reliable in Outcome</h5>
                    <p>Continuous feedback collection and improvement ensuring consistently excellent results.</p>
            </div>
        </div>
    </div>
</section>

{{-- ===== 8. PARTNERSHIP PHILOSOPHY (Dark BG, Parallax) ===== --}}
<section class="partner-sec">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5 anim fade-left">
                <h2 style="font-size:2.5rem;font-weight:900;color:#fff !important;line-height:1.2;">Our Partnership<br>Philosophy</h2>
                <p style="font-size:.9rem;color:rgba(255,255,255,.65);line-height:1.8;margin-top:1rem;">TravelTag is built on the belief that schools need a long-term travel partner, not a one-time service provider.</p>
            </div>
            <div class="col-lg-7 anim fade-right">
                <div class="partner-glass">
                    <h3>Our Partnership Philosophy</h3>
                    <p>Our goal is to become an extension of the school's ecosystem — handling travel with the same level of responsibility and structure.</p>
                    <h6 style="font-weight:700;margin:1.2rem 0 .8rem;">We collaborate with institutions to:</h6>
                    <div class="pc"><i class="bi bi-check-circle-fill"></i><span>Design annual travel plans</span></div>
                    <div class="pc"><i class="bi bi-check-circle-fill"></i><span>Align programs with grade levels and objectives</span></div>
                    <div class="pc"><i class="bi bi-check-circle-fill"></i><span>Maintain consistency across multiple trips</span></div>
                    <div class="d-flex gap-1 mt-3">
                        <span style="width:10px;height:10px;border-radius:50%;background:#22c55e;"></span>
                        <span style="width:10px;height:10px;border-radius:50%;background:#f59e0b;"></span>
                        <span style="width:10px;height:10px;border-radius:50%;background:#ef4444;"></span>
                        <span style="width:10px;height:10px;border-radius:50%;background:#3b82f6;"></span>
                        <span style="width:10px;height:10px;border-radius:50%;background:#8b5cf6;"></span>
                        <span style="width:10px;height:10px;border-radius:50%;background:#ec4899;"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== 9. OUR VISION (Cards with Images, Center) ===== --}}
<section class="abt-sec" style="background:var(--bg);">
    <div class="container">
        <div class="text-center mb-5 anim fade-up">
            <div class="section-label">Our Vision</div>
            <h2 class="section-title">Empowering students through structured<br>educational travel</h2>
            <div class="section-line section-line-center"></div>
            <p style="font-size:.88rem;color:#6b7280;max-width:600px;margin:0 auto;">To build India's most trusted and widely adopted student travel platform.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-4 anim fade-up anim-delay-1">
                <div class="vision-card">
                    <div class="vc-num">01</div>
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=500&h=350&fit=crop" alt="Partner schools">
                    <h6>Hundreds of partner schools</h6>
                    <p>A strong and growing network of partner schools that trust and collaborate with us to deliver meaningful student travel experiences.</p>
                </div>
            </div>
            <div class="col-md-4 anim fade-up anim-delay-3">
                <div class="vision-card">
                    <div class="vc-num">02</div>
                    <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=500&h=350&fit=crop" alt="Students">
                    <h6>Thousands of students annually</h6>
                    <p>Serving thousands of students through safe, structured, and enriching travel programs to diverse destinations.</p>
                </div>
            </div>
            <div class="col-md-4 anim fade-up anim-delay-5">
                <div class="vision-card">
                    <div class="vc-num">03</div>
                    <img src="https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=500&h=350&fit=crop" alt="Journeys">
                    <h6>Standardized educational journeys</h6>
                    <p>Consistent, well-structured educational journeys across the country, ensuring quality, safety, and learning outcomes.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== 10. OUR PHILOSOPHY (Colored Cards) ===== --}}
<section class="abt-sec">
    <div class="container">
        <div class="text-center mb-5 anim fade-up">
            <div class="section-label">Our Philosophy</div>
            <h2 class="section-title">We Believe</h2>
            <div class="section-line section-line-center"></div>
        </div>
        <div class="row g-4">
            <div class="col-md-3 col-6 anim fade-up anim-delay-1">
                <div class="philo-card" style="background:#eff6ff;">
                    <div class="phi-icon" style="background:linear-gradient(135deg,#3b82f6,#1d4ed8);"><i class="bi bi-book"></i></div>
                    <h6>Travel is Education</h6>
                    <p>Travel is not a leisure activity — it is an extension of education that transforms perspectives and understanding.</p>
                </div>
            </div>
            <div class="col-md-3 col-6 anim fade-up anim-delay-3">
                <div class="philo-card" style="background:#f0fdf4;">
                    <div class="phi-icon" style="background:linear-gradient(135deg,#22c55e,#16a34a);"><i class="bi bi-lightning-charge"></i></div>
                    <h6>Exposure Accelerates</h6>
                    <p>Exposure accelerates learning beyond classrooms, creating real-world understanding and lasting empathy.</p>
                </div>
            </div>
            <div class="col-md-3 col-6 anim fade-up anim-delay-5">
                <div class="philo-card" style="background:#fefce8;">
                    <div class="phi-icon" style="background:linear-gradient(135deg,#f59e0b,#d97706);"><i class="bi bi-building-check"></i></div>
                    <h6>Structure Builds Trust</h6>
                    <p>Structure builds trust at scale — when processes are clear, confidence follows naturally at every step.</p>
                </div>
            </div>
            <div class="col-md-3 col-6 anim fade-up anim-delay-7">
                <div class="philo-card" style="background:#faf5ff;">
                    <div class="phi-icon" style="background:linear-gradient(135deg,#8b5cf6,#6d28d9);"><i class="bi bi-gear-wide-connected"></i></div>
                    <h6>Systems Create Consistency</h6>
                    <p>Systems create consistency where individuals cannot — ensuring quality and reliability every single time.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== 11. FOUNDER'S NOTE & CTA ===== --}}
<section class="abt-sec" style="padding:5rem 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 anim fade-up">
                <div class="founder-cta-section">
                    <div class="founder-cta-label"><i class="bi bi-star-fill me-2"></i>Founder's Note</div>
                    
                    <h2 class="founder-cta-title">Connect With TravelTag</h2>
                    <h3 class="founder-cta-subtitle">Structured Travel. Complete Safety. Total Transparency.</h3>
                    
                    <p class="founder-cta-desc">
                        TravelTag is founded with a vision to bring structure, safety, and accountability into school travel. If schools are structured, their travel programs should be too. Let's build the travel program your institution deserves.
                    </p>
                    
                    <div class="founder-cta-buttons">
                        <a href="{{ route('about') . '#commitment' }}" class="founder-cta-btn-secondary">
                            <i class="bi bi-info-circle"></i> Learn Our Commitment
                        </a>
                        <a href="{{ route('contact') }}" class="founder-cta-btn-primary">
                            <i class="bi bi-arrow-right"></i> Book School Consultation
                        </a>
                    </div>
                    
                    <div class="founder-cta-features">
                        <div class="founder-cta-feature">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>3+ Years Experience</span>
                        </div>
                        <div class="founder-cta-feature">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Verified Safety Protocols</span>
                        </div>
                        <div class="founder-cta-feature">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Full Accountability</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });

    document.querySelectorAll('.anim:not(.visible)').forEach(el => observer.observe(el));
});
</script>
@endpush
