@extends('frontend.layouts.app')
@section('title', 'Home')

@push('styles')
<style>
    /* ===== HERO OVERRIDES ===== */
    .hero-section {
        background: url('/storage/hero_background.png') center/cover no-repeat;
        min-height: 620px; position: relative; overflow: hidden; padding: 3rem 0 4rem;
        width: 100%;
    }
    .hero-section .hero-right-img {
        position: absolute; top: 0; right: 0; bottom: 0; width: 55%;
        background: url('/storage/HERO.png') right center/contain no-repeat;
        z-index: 1;
    }
    .hero-section::before {
        content: ''; position: absolute; inset: 0;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.4) 0%, rgba(240, 248, 255, 0.3) 100%);
        z-index: 0;
    }
    @media(max-width:991px) {
        .hero-section { min-height: 450px; padding: 2rem 0 3rem; }
        .hero-section .hero-right-img { opacity: .12; width: 100%; }
        .hero-section h1 { font-size: 1.6rem !important; }
        .hero-section p { font-size: .85rem !important; }
    }
    @media(max-width:576px) {
        .hero-section { min-height: 380px; padding: 1.5rem 0 2rem; }
        .hero-section h1 { font-size: 1.3rem !important; letter-spacing: 0 !important; }
        .hero-section p { font-size: .8rem !important; max-width: 100% !important; }
        .hero-section a { padding: .6rem 1.8rem !important; font-size: .85rem !important; }
    }

    /* ===== TESTIMONIAL CAROUSEL ===== */
    .testimonial-carousel-wrap { max-width: 760px; margin: 0 auto; }
    .testimonial-carousel-wrap .carousel-item { padding: .2rem; }
    .testimonial-carousel-wrap .test-card {
        min-height: 320px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .testimonial-carousel-wrap .test-quote { margin-bottom: 1.25rem; }
    .testimonial-carousel-wrap .carousel-indicators {
        position: static;
        margin: 1.2rem 0 0;
        gap: .45rem;
    }
    .testimonial-carousel-wrap .carousel-indicators [data-bs-target] {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        border: 0;
        background: rgba(0,0,0,.2);
    }
    .testimonial-carousel-wrap .carousel-indicators .active {
        background: var(--primary);
    }

    .home-about-image-wrap {
        position: relative;
        text-align: left;
        max-width: 417px;
        margin: 0;
    }
    .home-about-image {
        display: block;
        width: 100%;
        max-width: 100%;
        height: auto;
        object-fit: contain;
    }
    @media(max-width:576px) {
        .home-about-image-wrap { max-width: 300px; margin: 0 auto; }
    }
</style>
@endpush

@section('content')

{{-- ===== 1. HERO SECTION ===== --}}
<section class="hero-section d-flex align-items-center">
    <div class="hero-right-img"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div style="position:relative;z-index:5;">
                    <h1 style="font-size:2rem;font-weight:900;color:#1a1a1a;line-height:1.15;text-transform:uppercase;letter-spacing:1px;margin-bottom:1.2rem;">
                        Student Travel<br>Platform
                    </h1>
                    <p style="font-size:.9rem;color:#555;line-height:1.8;max-width:480px;margin-bottom:1.8rem;">
                        TravelTag enables schools to plan and manage student travel through structured processes, safety frameworks, and technology—ensuring complete control, transparency, and seamless execution.
                    </p>
                    <a href="{{ route('programs.index') }}" style="display:inline-block;background:#89BFF3;color:#fff;border-radius:1.5rem;padding:.7rem 2.2rem;font-weight:600;font-size:.9rem;text-decoration:none;transition:.3s;">Read More →</a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== 2. ABOUT US ===== --}}
<section class="section">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-5 pe-0">
                <div class="home-about-image-wrap">
                    <img src="{{ asset('storage/aboutusimage.png') }}" alt="Students learning" class="home-about-image">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="section-label">About Us</div>
                <div class="d-flex align-items-start gap-3 mb-3">
                    <h2 class="section-title" style="margin-bottom:0;">The Future of Student Travel Starts Here</h2>
                    <div class="dot-pattern flex-shrink-0 mt-2"></div>
                </div>
                <div class="section-line"></div>
                <p style="font-size:1rem;color:var(--charcoal);line-height:1.8;margin-bottom:1.5rem;">
                    TravelTag is a technology-driven platform for schools to design, manage, and execute structured travel programs with complete safety and accountability.
                </p>
                <div class="about-check"><i class="bi bi-check-circle-fill"></i><span>Combine learning, exposure, and structured execution into one seamless experience.</span></div>
                <div class="about-check"><i class="bi bi-check-circle-fill"></i><span>Safety first approach with defined protocols and verified partners.</span></div>
                <div class="about-check"><i class="bi bi-check-circle-fill"></i><span>Structured, scalable, and fully managed travel programs.</span></div>
                <a href="{{ route('about') }}" class="btn btn-primary rounded-pill px-4 mt-3" style="font-size:.95rem;">Learn More</a>
            </div>
        </div>
    </div>
</section>

{{-- ===== 3. VALUES STRIP ===== --}}
<section class="values-strip">
    <div class="container">
        <div class="text-center mb-4">
            <div class="section-label">Our Mission</div>
            <h2 class="section-title">Safe, Structured, Transparent, Meaningful School Trips</h2>
            <div class="section-line section-line-center"></div>
        </div>
        <div class="row g-4">
            <div class="col-md-3 col-6">
                <div class="value-item">
                    <div class="v-icon" style="background:#89BFF3; border-radius:1rem; box-shadow:0 10px 30px rgba(137,191,243,.3); width:80px; height:80px; display:flex; align-items:center; justify-content:center; margin:0 auto 1.5rem;"><i class="bi bi-person-check" style="font-size:2.2rem; color:#fff;"></i></div>
                    <h6>Safe by Design</h6>
                    <p>Safety is built into every stage of the journey through defined protocols and verified partners</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="value-item">
                    <div class="v-icon" style="background:#89BFF3; border-radius:1rem; box-shadow:0 10px 30px rgba(137,191,243,.3); width:80px; height:80px; display:flex; align-items:center; justify-content:center; margin:0 auto 1.5rem;"><i class="bi bi-map" style="font-size:2.2rem; color:#fff;"></i></div>
                    <h6>Structured Execution</h6>
                    <p>Process-driven planning and disciplined execution ensure smooth and reliable travel programs</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="value-item">
                    <div class="v-icon" style="background:#89BFF3; border-radius:1rem; box-shadow:0 10px 30px rgba(137,191,243,.3); width:80px; height:80px; display:flex; align-items:center; justify-content:center; margin:0 auto 1.5rem;"><i class="bi bi-triangle-half" style="font-size:2.2rem; color:#fff;"></i></div>
                    <h6>Transparent for Stakeholders</h6>
                    <p>Clear communication and visibility for schools, parents, and coordinators at every step</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="value-item">
                    <div class="v-icon" style="background:#89BFF3; border-radius:1rem; box-shadow:0 10px 30px rgba(137,191,243,.3); width:80px; height:80px; display:flex; align-items:center; justify-content:center; margin:0 auto 1.5rem;"><i class="bi bi-clock" style="font-size:2.2rem; color:#fff;"></i></div>
                    <h6>Meaningful for Students</h6>
                    <p>Travel experiences designed to deliver learning, exposure, and real-world engagement</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== 4. HOW WE OPERATE ===== --}}
<section class="hwo-section" style="position:relative; min-height:700px; background:url('https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=1600&h=900&fit=crop') center/cover no-repeat fixed;">
    <div style="position:absolute;inset:0;background:linear-gradient(135deg,rgba(15,23,42,.75),rgba(30,58,138,.6));"></div>
    <div class="container" style="position:relative;z-index:2;padding:4rem 0;">
        <div class="row align-items-start g-5">
            {{-- Left: Branding --}}
            <div class="col-lg-5" style="color:#fff;">
                <div style="margin-bottom:1.5rem;">
                    <span style="font-size:.72rem;font-weight:600;text-transform:uppercase;letter-spacing:3px;color:rgba(255,255,255,.6);">How We Operate</span>
                </div>
                <h2 style="font-size:2.4rem;font-weight:900;color:#fff !important;line-height:1.2;margin-bottom:1.2rem;">Our Step-By-Step<br>Process</h2>
                <div style="width:50px;height:3px;background:var(--primary);border-radius:2px;margin-bottom:1.5rem;"></div>
                <p style="font-size:.88rem;color:rgba(255,255,255,.8);line-height:1.8;margin-bottom:2rem;">
                    At TravelTag, every journey follows a structured 7-step framework — from understanding the school's vision to post-trip engagement. This ensures every program is safe, meaningful, and professionally executed.
                </p>
                <a href="{{ route('about') }}" style="display:inline-block;background:var(--primary);color:#fff;border-radius:2rem;padding:.6rem 1.8rem;font-weight:600;font-size:.85rem;text-decoration:none;transition:.3s;">Learn More <i class="bi bi-arrow-right ms-1"></i></a>
            </div>

            {{-- Right: Accordion --}}
            <div class="col-lg-7">
                <div class="accordion hwo-accordion" id="hwoAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#hwo1" aria-expanded="true">
                                Requirement Mapping
                            </button>
                        </h2>
                        <div id="hwo1" class="accordion-collapse collapse show" data-bs-parent="#hwoAccordion">
                            <div class="accordion-body">
                                Every successful program begins with a deep understanding of the school's intent. We work closely with educators to identify learning objectives, student profiles, budget considerations, and preferred destinations. This ensures that every journey is purpose-driven, relevant, and aligned with institutional goals — not a one-size-fits-all itinerary.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hwo2" aria-expanded="false">
                                Program Design & Itinerary Creation
                            </button>
                        </h2>
                        <div id="hwo2" class="accordion-collapse collapse" data-bs-parent="#hwoAccordion">
                            <div class="accordion-body">
                                Based on the requirements, our team designs a carefully curated itinerary that integrates learning outcomes with engaging experiences. From site visits and activities to logistics and safety planning, every element is thoughtfully structured. The result is a program that delivers the right balance of education, exploration, and student engagement.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hwo3" aria-expanded="false">
                                Planning & Approvals
                            </button>
                        </h2>
                        <div id="hwo3" class="accordion-collapse collapse" data-bs-parent="#hwoAccordion">
                            <div class="accordion-body">
                                We manage all backend coordination to ensure a smooth planning phase. This includes vendor finalisation, safety checks, risk assessments, and supporting schools with necessary documentation and approvals. Our approach eliminates operational burden, enabling schools to experience a hassle-free and professionally managed process.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hwo4" aria-expanded="false">
                                Pre-Trip Coordination
                            </button>
                        </h2>
                        <div id="hwo4" class="accordion-collapse collapse" data-bs-parent="#hwoAccordion">
                            <div class="accordion-body">
                                Before departure, we ensure complete readiness across all stakeholders. Students and teachers are briefed, final itineraries are shared, and communication protocols are clearly established. With all details in place, participants begin the journey with clarity, preparedness, and confidence.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hwo5" aria-expanded="false">
                                On-Ground Execution
                            </button>
                        </h2>
                        <div id="hwo5" class="accordion-collapse collapse" data-bs-parent="#hwoAccordion">
                            <div class="accordion-body">
                                During the trip, our experienced team manages every aspect of execution. Dedicated coordinators oversee schedules, activities, and logistics while maintaining real-time monitoring. This ensures that the entire experience runs smoothly, safely, and exactly as planned, allowing students to focus on learning and exploration.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hwo6" aria-expanded="false">
                                Safety & Support
                            </button>
                        </h2>
                        <div id="hwo6" class="accordion-collapse collapse" data-bs-parent="#hwoAccordion">
                            <div class="accordion-body">
                                Safety is embedded into every stage of our operations. We work only with verified partners, implement strict safety protocols, and provide continuous on-ground and remote support. Our systems are designed to meet and exceed school-level safety expectations, ensuring peace of mind for institutions and parents alike.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hwo7" aria-expanded="false">
                                Post-Trip Engagement
                            </button>
                        </h2>
                        <div id="hwo7" class="accordion-collapse collapse" data-bs-parent="#hwoAccordion">
                            <div class="accordion-body">
                                Our engagement continues even after the journey concludes. We gather feedback, evaluate program effectiveness, and identify areas for enhancement. This continuous loop allows us to refine our offerings and consistently deliver better, more impactful experiences with every program.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== 5. WHY CHOOSE US ===== --}}
<section class="section" style="background:var(--bg);">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-label">Why Choose Us</div>
            <h2 class="section-title">Get The Best Travel Experience</h2>
            <div class="section-line section-line-center"></div>
        </div>
        <div class="row g-4">
            <div class="col-md-3 col-6">
                <div class="why-card">
                    <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=400&h=300&fit=crop" alt="Experiential Learning">
                    <div class="why-body"><h6>Experiential Learning</h6><p>Hands-on experiences that bring textbook concepts to life through real-world exploration.</p></div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="why-card">
                    <img src="https://images.unsplash.com/photo-1526772662000-3f88f10405ff?w=400&h=300&fit=crop" alt="Real-World Exposure">
                    <div class="why-body"><h6>Real-World Exposure</h6><p>Students interact with diverse cultures, industries, and environments beyond the classroom.</p></div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="why-card">
                    <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=400&h=300&fit=crop" alt="Collaboration & Teamwork">
                    <div class="why-body"><h6>Collaboration & Teamwork</h6><p>Programs designed to build teamwork, leadership, and collaborative skills.</p></div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="why-card">
                    <img src="https://images.unsplash.com/photo-1544531586-fde5298cdd40?w=400&h=300&fit=crop" alt="Structured & Safe">
                    <div class="why-body"><h6>Structured & Safe Execution</h6><p>Every trip follows defined protocols with verified partners and trained coordinators.</p></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== 6. TRAVEL POINT ===== --}}
<section class="section travel-point">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div style="position:relative;">
                    <img src="https://images.unsplash.com/photo-1527631746610-bca00a040d60?w=600&h=450&fit=crop" alt="Travel experience" style="width:100%;height:420px;object-fit:cover;border-radius:.75rem;box-shadow:0 15px 40px rgba(0,0,0,.12);">
                    <img src="https://images.unsplash.com/photo-1501555088652-021faa106b9b?w=300&h=200&fit=crop" alt="Adventure" style="position:absolute;bottom:-30px;right:-20px;width:200px;height:150px;object-fit:cover;border-radius:.75rem;border:4px solid #fff;box-shadow:0 8px 25px rgba(0,0,0,.15);">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-label">Travel Point</div>
                <h2 style="font-weight:800;font-size:2.2rem;color:var(--dark);line-height:1.3;margin-bottom:1rem;">Structured Travel,<br>Powered by Trust</h2>
                <div class="section-line"></div>
                <p style="font-size:.88rem;color:var(--charcoal);line-height:1.8;margin-bottom:2rem;">We take complete ownership of requirement mapping, vendor verification, itinerary planning, on-ground execution, and continuous communication with schools and parents.</p>
                <div class="row g-3">
                    <div class="col-6"><div class="stat-box" style="background:var(--light-blue-bg);border-radius:.5rem;"><div class="stat-num">5+</div><div class="stat-lbl">Years</div></div></div>
                    <div class="col-6"><div class="stat-box" style="background:var(--light-blue-bg);border-radius:.5rem;"><div class="stat-num">80+</div><div class="stat-lbl">Tours</div></div></div>
                    <div class="col-6"><div class="stat-box" style="background:var(--light-blue-bg);border-radius:.5rem;"><div class="stat-num">30+</div><div class="stat-lbl">Schools</div></div></div>
                    <div class="col-6"><div class="stat-box" style="background:var(--light-blue-bg);border-radius:.5rem;"><div class="stat-num">2,000+</div><div class="stat-lbl">Students Traveled</div></div></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== 7. STRUCTURED, MEASURABLE, REPEATABLE ===== --}}
<section class="section structured-section">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-label">Why TravelTag Is The Right Choice</div>
            <h2 class="section-title">Structured, Measurable, Repeatable</h2>
            <div class="section-line section-line-center"></div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="struct-card">
                    <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=500&h=300&fit=crop" alt="Standardized formats">
                    <div class="struct-body"><h6>Standardized Program Formats</h6><p>Every trip follows a defined template ensuring consistency across all programs and institutions.</p></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="struct-card">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=500&h=300&fit=crop" alt="Execution frameworks">
                    <div class="struct-body"><h6>Defined Execution Frameworks</h6><p>Clear SOPs, checklists, and coordination protocols for every stage of the journey.</p></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="struct-card">
                    <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?w=500&h=300&fit=crop" alt="Repeatable models">
                    <div class="struct-body"><h6>Repeatable Travel Models</h6><p>Scalable programs designed to be replicated reliably across schools and destinations.</p></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== 8. GALLERY / PORTFOLIO ===== --}}
<section class="section" style="background:var(--white);">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-label">Our Portfolio</div>
            <h2 class="section-title">Explore our photos</h2>
            <div class="section-line section-line-center"></div>
        </div>
        <div class="row g-3">
            @php $galleryImages = \App\Models\Gallery::orderBy('order')->take(8)->get(); @endphp
            @forelse($galleryImages as $img)
            <div class="col-md-3 col-6">
                <div class="gallery-item"><img src="{{ asset('storage/' . $img->image) }}" alt="{{ $img->caption }}"></div>
            </div>
            @empty
            @php
            $placeholders = [
                'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=400&h=350&fit=crop',
                'https://images.unsplash.com/photo-1506929562872-bb421503ef21?w=400&h=350&fit=crop',
                'https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=400&h=350&fit=crop',
                'https://images.unsplash.com/photo-1433838552652-f9a46b332c40?w=400&h=350&fit=crop',
                'https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?w=400&h=350&fit=crop',
                'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=400&h=350&fit=crop',
                'https://images.unsplash.com/photo-1519046904884-53103b34b206?w=400&h=350&fit=crop',
                'https://images.unsplash.com/photo-1502602898657-3e91760cbb34?w=400&h=350&fit=crop',
            ];
            @endphp
            @for($i = 0; $i < 8; $i++)
            <div class="col-md-3 col-6">
                <div class="gallery-item"><img src="{{ $placeholders[$i] }}" alt="Gallery photo {{ $i+1 }}"></div>
            </div>
            @endfor
            @endforelse
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('gallery') }}" class="btn btn-outline-primary rounded-pill px-4" style="font-size:.88rem;">View Full Gallery</a>
        </div>
    </div>
</section>

{{-- ===== 9. POPULAR DESTINATIONS ===== --}}
<section class="section" style="background:var(--bg);">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-label">Popular Destination</div>
            <h2 class="section-title">Popular Destinations</h2>
            <div class="section-line section-line-center"></div>
        </div>
        <div class="row g-4">
            @php $destPrograms = \App\Models\Program::active()->with('category')->latest()->take(4)->get(); @endphp
            @forelse($destPrograms as $index => $prog)
            <div class="col-lg-3 col-md-6 col-6">
                <div class="dest-card">
                    <div class="dest-img">
                        @if($prog->thumbnail && file_exists(public_path('storage/' . $prog->thumbnail)))
                            <img src="{{ asset('storage/' . $prog->thumbnail) }}" alt="{{ $prog->title }}">
                        @else
                            <img src="https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=600&h=400&fit=crop" alt="{{ $prog->title }}">
                        @endif
                    </div>
                    <div class="dest-body">
                        <div class="dest-title-row">
                            <span class="dest-badge">{{ $index + 1 }}</span>
                            <h5>{{ $prog->title }}</h5>
                        </div>
                        <div class="dest-sub">{{ $prog->category->name ?? '' }}</div>
                        <p class="dest-desc">{{ Str::limit($prog->short_description ?? $prog->description ?? 'Explore this amazing destination with our structured student travel programs.', 120) }}</p>
                        <div class="dest-divider"></div>
                        <div class="dest-btns">
                            <a href="{{ route('programs.show', $prog->slug) }}" class="btn-explore">Explore</a>
                            <a href="{{ route('contact') }}" class="btn-plan">{{ $loop->odd ? 'Book School Consultation' : 'Talk to Trip Expert' }}</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            @php
            $dests = [
                ['name'=>'Goa','img'=>'https://images.unsplash.com/photo-1512343879784-a960bf40e7f2?w=600&h=400&fit=crop','sub'=>'Beach & Culture','desc'=>'Goa offers pristine beaches and rich Portuguese heritage. A perfect blend of culture, history, and coastal beauty for students.'],
                ['name'=>'Rajasthan','img'=>'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=600&h=400&fit=crop','sub'=>'Heritage & History','desc'=>'Discover royal palaces, ancient forts, and vibrant culture. Rajasthan brings history to life for young learners.'],
                ['name'=>'Kerala','img'=>'https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=600&h=400&fit=crop','sub'=>'Nature & Backwaters','desc'=>'Lush backwaters, tea plantations, and diverse wildlife. Kerala is a paradise for nature-loving students.'],
                ['name'=>'Himachal','img'=>'https://images.unsplash.com/photo-1626621341517-bbf3d9990a23?w=600&h=400&fit=crop','sub'=>'Mountains & Adventure','desc'=>'Snow-capped mountains and thrilling adventures await. Himachal offers unforgettable experiences in nature.'],
            ];
            @endphp
            @foreach($dests as $index => $dest)
            <div class="col-lg-3 col-md-6 col-6">
                <div class="dest-card">
                    <div class="dest-img">
                        <img src="{{ $dest['img'] }}" alt="{{ $dest['name'] }}">
                    </div>
                    <div class="dest-body">
                        <div class="dest-title-row">
                            <span class="dest-badge">{{ $index + 1 }}</span>
                            <h5>{{ $dest['name'] }}</h5>
                        </div>
                        <div class="dest-sub">{{ $dest['sub'] }}</div>
                        <p class="dest-desc">{{ $dest['desc'] }}</p>
                        <div class="dest-divider"></div>
                        <div class="dest-btns">
                            <a href="{{ route('programs.index') }}" class="btn-explore">Explore</a>
                            <a href="{{ route('contact') }}" class="btn-plan">{{ $index % 2 === 0 ? 'Book School Consultation' : 'Talk to Trip Expert' }}</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endforelse
        </div>
    </div>
</section>

{{-- ===== 10. TESTIMONIALS ===== --}}
<section class="section testimonial-section" style="padding-bottom:6rem;">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-label">Testimonials</div>
            <h2 class="section-title">What Our Partners Say About Us</h2>
            <div class="section-line section-line-center"></div>
            <p style="font-size:.88rem;color:#6b7280;max-width:550px;margin:.5rem auto 0;">Trusted by schools and educators across India for safe, structured, and meaningful student travel.</p>
        </div>
        @php
            $testimonials = [
                [
                    'quote' => 'TravelTag gives us a structured travel framework for students. It helps create discipline and keeps safety the number one priority for all stakeholders.',
                    'name' => 'Ananya Reddy',
                    'role' => 'School Coordinator',
                    'img' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=120&h=120&fit=crop',
                    'rating' => 5,
                ],
                [
                    'quote' => 'The way they manage planning to execution is very professional. Students come back with amazing experiences. Highly recommend for any school.',
                    'name' => 'Riya Sharma',
                    'role' => 'Vice Principal, Delhi Public School',
                    'img' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=120&h=120&fit=crop',
                    'rating' => 5,
                ],
                [
                    'quote' => 'TravelTag has consistently delivered safe, well-coordinated trips that create real impact on students. Their structured approach sets them apart.',
                    'name' => 'Manila Carvalho',
                    'role' => 'Principal, St. Mary\'s Academy',
                    'img' => 'https://images.unsplash.com/photo-1546961329-78bef0414d7c?w=120&h=120&fit=crop',
                    'rating' => 5,
                ],
                [
                    'quote' => 'Our school has partnered with TravelTag for two years. The consistency and safety protocols they follow give us complete confidence every trip.',
                    'name' => 'Priya Menon',
                    'role' => 'Academic Head, Greenfield School',
                    'img' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=120&h=120&fit=crop',
                    'rating' => 5,
                ],
            ];
            $chunks = array_chunk($testimonials, 2);
        @endphp

        <div id="homeTestimonials" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4500" data-bs-pause="hover" data-bs-touch="true">
            <div class="carousel-inner">
                @foreach($chunks as $ci => $pair)
                    <div class="carousel-item {{ $ci === 0 ? 'active' : '' }}">
                        <div class="row g-4 justify-content-center">
                            @foreach($pair as $t)
                            <div class="col-md-6">
                                <div class="test-card">
                                    <div class="test-stars">
                                        @for($s = 0; $s < $t['rating']; $s++)
                                            <i class="bi bi-star-fill"></i>
                                        @endfor
                                    </div>
                                    <div class="test-quote">"{{ $t['quote'] }}"</div>
                                    <div class="test-divider"></div>
                                    <div class="test-author">
                                        <div class="test-avatar">
                                            <img src="{{ $t['img'] }}" alt="{{ $t['name'] }}">
                                        </div>
                                        <div>
                                            <div class="test-name">{{ $t['name'] }}</div>
                                            <div class="test-role">{{ $t['role'] }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="carousel-indicators">
                @foreach($chunks as $ci => $pair)
                    <button type="button" data-bs-target="#homeTestimonials" data-bs-slide-to="{{ $ci }}" class="{{ $ci === 0 ? 'active' : '' }}" aria-label="Slide {{ $ci + 1 }}"></button>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ===== 11. BLOGS / NEWS ===== --}}
<section class="section" style="background:var(--bg);">
    <div class="container">
        <div class="text-center mb-2">
            <div class="section-label">News & Blogs</div>
            <h2 class="section-title">School Travel Insights</h2>
            <div class="section-line section-line-center"></div>
        </div>
        <div class="row g-4 mt-3">
            @php $recentBlogs = \App\Models\Blog::active()->latest()->take(3)->get(); @endphp
            @forelse($recentBlogs as $blog)
            <div class="col-md-4">
                <div class="blog-card">
                    @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}">
                    @else
                        <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=500&h=300&fit=crop" alt="{{ $blog->title }}">
                    @endif
                    <div class="blog-body">
                        <small style="color:var(--primary-dark);font-weight:600;font-size:.75rem;"><i class="bi bi-calendar3 me-1"></i>{{ $blog->created_at->format('M d, Y') }}</small>
                        <h6 class="fw-bold mt-2" style="font-size:.95rem;color:var(--dark);">{{ $blog->title }}</h6>
                        <p style="font-size:.82rem;color:var(--charcoal);">{{ Str::limit(strip_tags($blog->content), 90) }}</p>
                        <a href="{{ route('blogs.show', $blog->slug) }}" style="font-size:.82rem;color:var(--primary-dark);font-weight:600;text-decoration:none;">Read More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @empty
            @php
            $blogPlaceholders = [
                ['img'=>'https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=500&h=300&fit=crop','title'=>'The Future of Student Travel Starts Here','desc'=>'Discover how structured travel transforms the student learning experience.'],
                ['img'=>'https://images.unsplash.com/photo-1544531586-fde5298cdd40?w=500&h=300&fit=crop','title'=>'Safety & Technology: The Backbone of Modern Student Travel','desc'=>'How technology and SOPs are redefining safety in school trips.'],
                ['img'=>'https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?w=500&h=300&fit=crop','title'=>'Why Structured Planning is Essential for Student Travel','desc'=>'Planning frameworks that ensure every school trip delivers value.'],
            ];
            @endphp
            @foreach($blogPlaceholders as $bp)
            <div class="col-md-4">
                <div class="blog-card">
                    <img src="{{ $bp['img'] }}" alt="{{ $bp['title'] }}">
                    <div class="blog-body">
                        <small style="color:var(--primary-dark);font-weight:600;font-size:.75rem;"><i class="bi bi-calendar3 me-1"></i>Apr 08, 2026</small>
                        <h6 class="fw-bold mt-2" style="font-size:.95rem;color:var(--dark);">{{ $bp['title'] }}</h6>
                        <p style="font-size:.82rem;color:var(--charcoal);">{{ $bp['desc'] }}</p>
                        <span style="font-size:.82rem;color:var(--primary-dark);font-weight:600;">Read More <i class="bi bi-arrow-right"></i></span>
                    </div>
                </div>
            </div>
            @endforeach
            @endforelse
        </div>
    </div>
</section>

@endsection
