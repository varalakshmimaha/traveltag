@extends('admin.layouts.app')
@section('title', 'Site Settings')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h6 class="mb-0"><i class="bi bi-gear text-primary me-2"></i>Site Settings</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Nav Tabs -->
                    <ul class="nav nav-tabs mb-4" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="basic-tab" data-bs-toggle="tab" data-bs-target="#basic" type="button" role="tab">
                                <i class="bi bi-info-circle me-2"></i>Basic Information
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab">
                                <i class="bi bi-telephone me-2"></i>Contact Information
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="social-tab" data-bs-toggle="tab" data-bs-target="#social" type="button" role="tab">
                                <i class="bi bi-share me-2"></i>Social Media
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="theme-tab" data-bs-toggle="tab" data-bs-target="#theme" type="button" role="tab">
                                <i class="bi bi-palette me-2"></i>Theme & Appearance
                            </button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content">
                        <!-- Basic Information Tab -->
                        <div class="tab-pane fade show active" id="basic" role="tabpanel">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label"><i class="bi bi-fonts me-2"></i>Site Name *</label>
                                    <input type="text" name="site_name" class="form-control @error('site_name') is-invalid @enderror" 
                                           value="{{ old('site_name', $settings['site_name']['value'] ?? 'TravelTag') }}" required>
                                    @error('site_name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label"><i class="bi bi-type me-2"></i>Site Title *</label>
                                    <input type="text" name="site_title" class="form-control @error('site_title') is-invalid @enderror"
                                           value="{{ old('site_title', $settings['site_title']['value'] ?? 'Travel Tag') }}" required>
                                    @error('site_title') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><i class="bi bi-chat-dots me-2"></i>Tagline *</label>
                                    <input type="text" name="tagline" class="form-control @error('tagline') is-invalid @enderror"
                                           value="{{ old('tagline', $settings['tagline']['value'] ?? 'Explore the World') }}" required>
                                    @error('tagline') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label"><i class="bi bi-image me-2"></i>Logo (PNG/JPG)</label>
                                    <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" accept="image/*">
                                    @if($settings['logo']['value'] ?? null)
                                        <small class="text-muted d-block mt-2">
                                            <i class="bi bi-check-circle text-success me-1"></i>Current logo uploaded
                                        </small>
                                    @endif
                                    @error('logo') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label"><i class="bi bi-image me-2"></i>Favicon (ICO/PNG)</label>
                                    <input type="file" name="favicon" class="form-control @error('favicon') is-invalid @enderror" accept="image/*">
                                    @if($settings['favicon']['value'] ?? null)
                                        <small class="text-muted d-block mt-2">
                                            <i class="bi bi-check-circle text-success me-1"></i>Current favicon uploaded
                                        </small>
                                    @endif
                                    @error('favicon') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><i class="bi bi-file-text me-2"></i>Footer Text (Copyright) *</label>
                                    <textarea name="footer_text" class="form-control @error('footer_text') is-invalid @enderror" rows="2" required>{{ old('footer_text', $settings['footer_text']['value'] ?? '© 2024 TravelTag. All rights reserved.') }}</textarea>
                                    @error('footer_text') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information Tab -->
                        <div class="tab-pane fade" id="contact" role="tabpanel">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label"><i class="bi bi-telephone me-2"></i>Phone Number *</label>
                                    <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                           value="{{ old('phone', $settings['phone']['value'] ?? '+1234567890') }}" required>
                                    @error('phone') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label"><i class="bi bi-chat-left-text me-2"></i>WhatsApp Number *</label>
                                    <input type="tel" name="whatsapp" class="form-control @error('whatsapp') is-invalid @enderror"
                                           value="{{ old('whatsapp', $settings['whatsapp']['value'] ?? '+1234567890') }}" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><i class="bi bi-envelope me-2"></i>Email Address *</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email', $settings['email']['value'] ?? 'contact@traveltag.com') }}" required>
                                    @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><i class="bi bi-geo-alt me-2"></i>Address *</label>
                                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="3" required>{{ old('address', $settings['address']['value'] ?? 'Your address here') }}</textarea>
                                    @error('address') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><i class="bi bi-map me-2"></i>Google Map Embed Code</label>
                                    <textarea name="map_embed" class="form-control @error('map_embed') is-invalid @enderror" rows="3" placeholder="Paste Google Maps embed iframe code">{{ old('map_embed', $settings['map_embed']['value'] ?? '') }}</textarea>
                                    <small class="text-muted">Paste the full iframe code from Google Maps embed option</small>
                                    @error('map_embed') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Social Media Tab -->
                        <div class="tab-pane fade" id="social" role="tabpanel">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label"><i class="bi bi-facebook me-2"></i>Facebook URL</label>
                                    <input type="url" name="facebook_url" class="form-control @error('facebook_url') is-invalid @enderror"
                                           value="{{ old('facebook_url', $settings['facebook_url']['value'] ?? 'https://facebook.com') }}"
                                           placeholder="https://facebook.com/yourpage">
                                    @error('facebook_url') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label"><i class="bi bi-instagram me-2"></i>Instagram URL</label>
                                    <input type="url" name="instagram_url" class="form-control @error('instagram_url') is-invalid @enderror"
                                           value="{{ old('instagram_url', $settings['instagram_url']['value'] ?? 'https://instagram.com') }}"
                                           placeholder="https://instagram.com/yourprofile">
                                    @error('instagram_url') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label"><i class="bi bi-youtube me-2"></i>YouTube URL</label>
                                    <input type="url" name="youtube_url" class="form-control @error('youtube_url') is-invalid @enderror"
                                           value="{{ old('youtube_url', $settings['youtube_url']['value'] ?? 'https://youtube.com') }}"
                                           placeholder="https://youtube.com/yourchannel">
                                    @error('youtube_url') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label"><i class="bi bi-twitter me-2"></i>Twitter (X) URL</label>
                                    <input type="url" name="twitter_url" class="form-control @error('twitter_url') is-invalid @enderror"
                                           value="{{ old('twitter_url', $settings['twitter_url']['value'] ?? 'https://twitter.com') }}"
                                           placeholder="https://twitter.com/yourhandle">
                                    @error('twitter_url') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label"><i class="bi bi-linkedin me-2"></i>LinkedIn URL</label>
                                    <input type="url" name="linkedin_url" class="form-control @error('linkedin_url') is-invalid @enderror"
                                           value="{{ old('linkedin_url', $settings['linkedin_url']['value'] ?? 'https://linkedin.com') }}"
                                           placeholder="https://linkedin.com/company/yourcompany">
                                    @error('linkedin_url') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Theme & Appearance Tab -->
                        <div class="tab-pane fade" id="theme" role="tabpanel">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label"><i class="bi bi-palette me-2"></i>Primary Color *</label>
                                    <div class="input-group">
                                        <input type="color" name="primary_color" id="primary_color" class="form-control form-control-color @error('primary_color') is-invalid @enderror"
                                               value="{{ old('primary_color', $settings['primary_color']['value'] ?? '#0066cc') }}" style="max-width: 100px;" required>
                                        <input type="text" class="form-control @error('primary_color') is-invalid @enderror" id="primary_color_text"
                                               value="{{ old('primary_color', $settings['primary_color']['value'] ?? '#0066cc') }}" readonly>
                                    </div>
                                    <small class="text-muted">Used for buttons, links, highlights, and navbar active state</small>
                                    @error('primary_color') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label"><i class="bi bi-palette-fill me-2"></i>Secondary Color *</label>
                                    <div class="input-group">
                                        <input type="color" name="secondary_color" id="secondary_color" class="form-control form-control-color @error('secondary_color') is-invalid @enderror"
                                               value="{{ old('secondary_color', $settings['secondary_color']['value'] ?? '#10b981') }}" style="max-width: 100px;" required>
                                        <input type="text" class="form-control @error('secondary_color') is-invalid @enderror" id="secondary_color_text"
                                               value="{{ old('secondary_color', $settings['secondary_color']['value'] ?? '#10b981') }}" readonly>
                                    </div>
                                    <small class="text-muted">Used for backgrounds, cards, and hover effects</small>
                                    @error('secondary_color') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label"><i class="bi bi-fonts me-2"></i>Font Family *</label>
                                    <select name="font_family" class="form-select @error('font_family') is-invalid @enderror" required>
                                        <option value="Poppins" {{ (old('font_family', $settings['font_family']['value'] ?? 'Poppins') == 'Poppins') ? 'selected' : '' }}>Poppins</option>
                                        <option value="Roboto" {{ (old('font_family', $settings['font_family']['value'] ?? 'Poppins') == 'Roboto') ? 'selected' : '' }}>Roboto</option>
                                        <option value="Open Sans" {{ (old('font_family', $settings['font_family']['value'] ?? 'Poppins') == 'Open Sans') ? 'selected' : '' }}>Open Sans</option>
                                        <option value="Lato" {{ (old('font_family', $settings['font_family']['value'] ?? 'Poppins') == 'Lato') ? 'selected' : '' }}>Lato</option>
                                        <option value="Montserrat" {{ (old('font_family', $settings['font_family']['value'] ?? 'Poppins') == 'Montserrat') ? 'selected' : '' }}>Montserrat</option>
                                    </select>
                                    <small class="text-muted">Fonts are loaded from Google Fonts</small>
                                    @error('font_family') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label"><i class="bi bi-moon-stars me-2"></i>Dark Mode</label>
                                    <div class="form-check form-switch mt-2" style="padding-top: 0.5rem;">
                                        <input class="form-check-input" type="checkbox" name="dark_mode_enabled" id="dark_mode_enabled" 
                                               value="1" {{ (old('dark_mode_enabled', $settings['dark_mode_enabled']['value'] ?? '0') == '1') ? 'checked' : '' }}
                                               style="width: 3rem; height: 1.5rem; cursor: pointer;">
                                        <label class="form-check-label" for="dark_mode_enabled">
                                            Enable dark theme globally
                                        </label>
                                    </div>
                                    <small class="text-muted d-block mt-2">When enabled, applies dark background (#121212) and light text (#ffffff) across the site</small>
                                </div>
                            </div>

                            <!-- Color Preview -->
                            <div class="row g-3 mt-4">
                                <div class="col-12">
                                    <label class="form-label fw-bold">Color Preview</label>
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <div style="background: #f8f9fa; padding: 1rem; border-radius: 0.5rem;">
                                                <p class="mb-2 text-muted">Primary Color (Buttons, Links)</p>
                                                <button class="btn" id="primary_preview" style="background-color: #0066cc; border-color: #0066cc; color: white;">Sample Button</button>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div style="background: #f8f9fa; padding: 1rem; border-radius: 0.5rem;">
                                                <p class="mb-2 text-muted">Secondary Color (Cards, Accents)</p>
                                                <div id="secondary_preview" style="background-color: #10b981; padding: 1rem; border-radius: 0.5rem; color: white;">Sample Card</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-4 pt-3 border-top">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-check-lg me-2"></i>Save Settings</button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-lg">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .nav-tabs .nav-link {
        color: #64748b;
        border-bottom: 3px solid transparent;
        margin-bottom: -3px;
        font-weight: 500;
        transition: all 0.2s;
    }

    .nav-tabs .nav-link:hover {
        border-color: #0066cc;
        color: #0066cc;
    }

    .nav-tabs .nav-link.active {
        color: #0066cc;
        background-color: transparent;
        border-color: #0066cc;
    }

    .form-label {
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.5rem;
    }

    .form-control, .form-select {
        border-color: #e2e8f0;
        border-radius: 0.5rem;
        transition: all 0.2s;
    }

    .form-control:focus, .form-select:focus {
        border-color: #0066cc;
        box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.1);
    }
</style>

<script>
    // Sync color inputs with text display
    const primaryInput = document.getElementById('primary_color');
    const primaryText = document.getElementById('primary_color_text');
    const primaryPreview = document.getElementById('primary_preview');

    const secondaryInput = document.getElementById('secondary_color');
    const secondaryText = document.getElementById('secondary_color_text');
    const secondaryPreview = document.getElementById('secondary_preview');

    if (primaryInput) {
        primaryInput.addEventListener('change', function() {
            primaryText.value = this.value;
            primaryPreview.style.backgroundColor = this.value;
            primaryPreview.style.borderColor = this.value;
        });

        secondaryInput.addEventListener('change', function() {
            secondaryText.value = this.value;
            secondaryPreview.style.backgroundColor = this.value;
        });

        // Initialize previews
        primaryPreview.style.backgroundColor = primaryInput.value;
        primaryPreview.style.borderColor = primaryInput.value;
        secondaryPreview.style.backgroundColor = secondaryInput.value;
    }
</script>
@endsection
