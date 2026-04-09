@extends('frontend.layouts.app')
@section('title', 'Contact Us')

@push('styles')
<style>
    .contact-hero {
        position:relative; min-height:340px; display:flex; align-items:center; justify-content:center;
        background:url('https://images.unsplash.com/photo-1534536281715-e28d76689b4d?w=1600&h=500&fit=crop') center/cover no-repeat fixed;
    }
    .contact-hero::before { content:''; position:absolute; inset:0; background:linear-gradient(135deg,rgba(15,23,42,.8),rgba(30,58,138,.65)); }
    .contact-hero .container { position:relative; z-index:2; text-align:center; color:#fff; }
    .contact-hero h1 { font-size:2.6rem; font-weight:900; text-transform:uppercase; letter-spacing:1px; color:#fff !important; }
    .contact-hero p { color:rgba(255,255,255,.8); font-size:1.1rem; margin-top:0.5rem; }
    
    .map-container { display: block; width: 100%; line-height: 0; }
    .map-container iframe { width: 100% !important; height: 450px !important; border: 0 !important; display: block; }
</style>
@endpush

@section('content')
<section class="contact-hero">
    <div class="container">
        <h1>Contact Us</h1>
        <p>Get in touch with {{ setting('site_name', 'TravelTag') }}</p>
    </div>
</section>

<section class="section" style="background:var(--white);">
    <div class="container">
        <div class="row g-5">
            {{-- Contact Info Card --}}
            <div class="col-lg-5">
                <div style="background:var(--primary);border-radius:.75rem;padding:2.5rem;color:var(--white);height:100%;">
                    <h4 class="fw-bold mb-4">Contact Information</h4>
                    <p style="font-size:.9rem;opacity:.9;margin-bottom:2rem;">Reach out and we'll get back to you within 24 hours.</p>

                    @if(setting('address'))
                    <div class="d-flex align-items-start mb-4">
                        <i class="bi bi-geo-alt-fill fs-5 me-3" style="margin-top:2px;"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Address</h6>
                            <p style="font-size:.88rem;opacity:.85;margin-bottom:0;">{{ nl2br(e(setting('address'))) }}</p>
                        </div>
                    </div>
                    @endif

                    @if(setting('email'))
                    <div class="d-flex align-items-start mb-4">
                        <i class="bi bi-envelope-fill fs-5 me-3" style="margin-top:2px;"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Email</h6>
                            <p style="font-size:.88rem;opacity:.85;margin-bottom:0;">
                                <a href="mailto:{{ setting('email') }}" style="color:#fff;">{{ setting('email') }}</a>
                            </p>
                        </div>
                    </div>
                    @endif

                    @if(setting('phone'))
                    <div class="d-flex align-items-start mb-4">
                        <i class="bi bi-telephone-fill fs-5 me-3" style="margin-top:2px;"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Phone</h6>
                            <p style="font-size:.88rem;opacity:.85;margin-bottom:0;">
                                <a href="tel:{{ setting('phone') }}" style="color:#fff;">{{ setting('phone') }}</a>
                                @if(setting('whatsapp'))
                                    <br><a href="https://wa.me/{{ setting('whatsapp') }}" style="color:#fff;">WhatsApp: {{ setting('whatsapp') }}</a>
                                @endif
                            </p>
                        </div>
                    </div>
                    @endif

                    <div class="d-flex gap-2 mt-4">
                        @if(setting('facebook_url'))
                            <a href="{{ setting('facebook_url') }}" target="_blank" style="width:36px;height:36px;border-radius:50%;background:rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;color:#fff;text-decoration:none;"><i class="bi bi-facebook"></i></a>
                        @endif
                        @if(setting('instagram_url'))
                            <a href="{{ setting('instagram_url') }}" target="_blank" style="width:36px;height:36px;border-radius:50%;background:rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;color:#fff;text-decoration:none;"><i class="bi bi-instagram"></i></a>
                        @endif
                        @if(setting('twitter_url'))
                            <a href="{{ setting('twitter_url') }}" target="_blank" style="width:36px;height:36px;border-radius:50%;background:rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;color:#fff;text-decoration:none;"><i class="bi bi-twitter-x"></i></a>
                        @endif
                        @if(setting('linkedin_url'))
                            <a href="{{ setting('linkedin_url') }}" target="_blank" style="width:36px;height:36px;border-radius:50%;background:rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;color:#fff;text-decoration:none;"><i class="bi bi-linkedin"></i></a>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Contact Form --}}
            <div class="col-lg-7">
                <h4 class="fw-bold mb-4" style="color:var(--dark);">Send Us a Message</h4>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" style="font-size:.85rem;font-weight:500;color:var(--charcoal);">Your Name *</label>
                            <input type="text" name="name" class="form-control form-control-lg" value="{{ old('name') }}" required style="font-size:.9rem;border-color:var(--taupe);">
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" style="font-size:.85rem;font-weight:500;color:var(--charcoal);">Email Address *</label>
                            <input type="email" name="email" class="form-control form-control-lg" value="{{ old('email') }}" required style="font-size:.9rem;border-color:var(--taupe);">
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label" style="font-size:.85rem;font-weight:500;color:var(--charcoal);">Phone Number</label>
                            <input type="text" name="phone" class="form-control form-control-lg" value="{{ old('phone') }}" style="font-size:.9rem;border-color:var(--taupe);">
                            @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label" style="font-size:.85rem;font-weight:500;color:var(--charcoal);">Message *</label>
                            <textarea name="message" class="form-control form-control-lg" rows="5" required style="font-size:.9rem;border-color:var(--taupe);">{{ old('message') }}</textarea>
                            @error('message') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5" style="font-size:.9rem;">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- Google Map --}}
<section class="map-container">
    @if(setting('map_embed'))
        {!! setting('map_embed') !!}
    @else
        <div style="background: var(--bg); padding: 4rem 0; text-align: center;">
            <div class="container">
                <p style="color: var(--charcoal); margin: 0;">
                    <i class="bi bi-map" style="font-size: 2rem; margin-bottom: 1rem; display: block;"></i>
                    Map location will be displayed here. Add Google Maps embed code in Site Settings.
                </p>
            </div>
        </div>
    @endif
</section>
@endsection
