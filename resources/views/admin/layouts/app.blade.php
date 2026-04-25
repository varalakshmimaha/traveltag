<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') - TravelTag Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 240px;
            --sidebar-bg: #1a1a2e;
            --sidebar-bg-soft: #1a1a2e;
            --sidebar-border: rgba(255, 255, 255, 0.08);
            --brand: #10b981;
            --brand-dark: #059669;
            --brand-soft: #ecfdf5;
            --success-soft: #ecfdf3;
            --success-text: #047857;
            --danger-soft: #fef2f2;
            --danger-text: #b91c1c;
            --warning-soft: #fff7ed;
            --warning-text: #c2410c;
            --info-soft: #f0f9ff;
            --info-text: #0369a1;
            --surface: #ffffff;
            --surface-strong: #ffffff;
            --surface-muted: #f8fafc;
            --border: #e5e7eb;
            --border-strong: #d1d5db;
            --text: #111827;
            --muted: #6b7280;
            --shadow-lg: 0 1px 3px rgba(0,0,0,.08);
            --shadow-md: 0 1px 2px rgba(0,0,0,.05);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        html, body { min-height: 100%; }

        body {
            font-family: "Inter", "Segoe UI", -apple-system, BlinkMacSystemFont, sans-serif;
            color: var(--text);
            background: #f3f4f6;
            min-height: 100vh;
            position: relative;
        }

        body.sidebar-open {
            overflow: hidden;
        }

        h1, h2, h3, h4, h5, h6 { color: var(--text) !important; }
        .text-muted,
        small,
        .form-text {
            color: var(--muted) !important;
        }
        a { color: inherit; }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            z-index: 1040;
        }

        .sidebar-inner {
            height: 100%;
            display: flex;
            flex-direction: column;
            background: var(--sidebar-bg);
            padding: 0;
            overflow-y: auto;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1.25rem 1.25rem 1rem;
            margin-bottom: 0.25rem;
        }

        .brand-mark {
            width: 44px;
            height: 44px;
            border-radius: 0.6rem;
            background: rgba(255,255,255,.1);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .brand-mark img {
            width: 34px;
            height: auto;
            object-fit: contain;
            display: block;
        }

        .brand-mark i {
            font-size: 1.2rem;
            color: #fff;
        }

        .brand-copy strong {
            display: block;
            color: #ffffff;
            font-size: 1.1rem;
            font-weight: 700;
        }

        .brand-copy span {
            display: block;
            margin-top: 0.15rem;
            color: #9ca3af;
            font-size: 0.65rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.12em;
        }

        .sidebar-section-title {
            margin: 1rem 0 0.4rem;
            padding: 0 1.25rem;
            color: #6b7280;
            font-size: 0.65rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }

        .sidebar .nav {
            gap: 0.1rem;
            padding: 0 0.75rem;
        }

        .sidebar .nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: #9ca3af;
            padding: 0.65rem 0.75rem;
            border-radius: 0.5rem;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.15s ease;
            position: relative;
        }

        .sidebar .nav-link:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.06);
        }

        .sidebar .nav-link.active {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.1);
            font-weight: 600;
        }

        .sidebar .nav-link i {
            width: 1.1rem;
            font-size: 0.95rem;
            flex-shrink: 0;
        }

        .sidebar .nav-link .badge {
            margin-left: auto;
            border-radius: 999px;
            font-size: 0.68rem;
            padding: 0.25rem 0.45rem;
            background: var(--brand);
            color: #fff;
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 0.75rem;
            border-top: 1px solid var(--sidebar-border);
        }

        .main-content {
            position: relative;
            z-index: 1;
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            padding: 0;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            margin-bottom: 0;
            padding: 1rem 2rem;
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
        }

        .top-bar-copy {
            display: flex;
            align-items: center;
            gap: 0.95rem;
        }

        .top-bar-label {
            color: var(--muted);
            font-size: 0.68rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.16em;
            margin-bottom: 0.3rem;
        }

        .top-bar h1 {
            margin: 0;
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--muted) !important;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .top-bar p {
            margin: 0;
            color: var(--muted);
            font-size: 0.92rem;
        }

        .top-bar-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sidebar-toggle {
            width: 42px;
            height: 42px;
            padding: 0;
            border-radius: 0.95rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .user-chip {
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: var(--brand);
            color: #ffffff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            font-weight: 700;
            flex-shrink: 0;
            position: relative;
        }

        .user-avatar::after {
            content: '';
            position: absolute;
            bottom: 1px;
            right: 1px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #22c55e;
            border: 2px solid #fff;
        }

        .user-chip small {
            display: block;
            color: var(--muted) !important;
            font-size: 0.7rem;
            line-height: 1.1;
            margin-bottom: 0.08rem;
        }

        .user-chip strong {
            display: block;
            color: var(--text);
            font-size: 0.86rem;
            font-weight: 600;
            line-height: 1.1;
        }

        .page-toolbar {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1.25rem;
        }

        .page-toolbar-eyebrow {
            color: var(--muted);
            font-size: 0.68rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.14em;
            margin-bottom: 0.35rem;
        }

        .page-toolbar-title {
            margin: 0;
            font-size: 1.12rem;
            font-weight: 700;
        }

        .page-toolbar-meta {
            margin: 0.35rem 0 0;
            color: var(--muted);
            font-size: 0.92rem;
            max-width: 46rem;
        }

        .btn {
            border-radius: 0.5rem;
            font-weight: 600;
            padding: 0.55rem 1rem;
            border-width: 1px;
            font-size: 0.88rem;
            box-shadow: none !important;
        }

        .btn-sm {
            padding: 0.4rem 0.75rem;
            border-radius: 0.4rem;
            font-size: 0.82rem;
        }

        .btn-primary {
            background: var(--brand);
            border-color: var(--brand);
            color: #ffffff;
        }

        .btn-primary:hover {
            background: var(--brand-dark);
            border-color: var(--brand-dark);
            color: #ffffff;
        }

        .btn-outline-primary {
            color: var(--brand-dark);
            border-color: #bfdbfe;
            background: #ffffff;
        }

        .btn-outline-primary:hover {
            background: var(--brand-soft);
            border-color: #93c5fd;
            color: var(--brand-dark);
        }

        .btn-outline-danger {
            color: var(--danger-text);
            border-color: #fecaca;
            background: #ffffff;
        }

        .btn-outline-danger:hover {
            background: var(--danger-soft);
            border-color: #fca5a5;
            color: #991b1b;
        }

        .btn-outline-secondary {
            color: #475569;
            border-color: var(--border);
            background: rgba(255, 255, 255, 0.92);
        }

        .btn-outline-secondary:hover {
            background: #f8fafc;
            border-color: var(--border-strong);
            color: var(--text);
        }

        .btn-icon {
            width: 36px;
            height: 36px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border: 1px solid var(--border);
            border-radius: 0.75rem;
            background: #ffffff;
            box-shadow: var(--shadow-lg);
            overflow: hidden;
        }

        .card-header {
            background: #ffffff !important;
            border-bottom: 1px solid var(--border);
            padding: 1rem 1.25rem !important;
        }

        .card-header h6 {
            font-size: 1rem;
            font-weight: 700;
            margin: 0;
        }

        .card-body {
            padding: 1.35rem;
        }

        .stat-card {
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: 0.75rem;
            box-shadow: var(--shadow-md);
            padding: 1.25rem;
            position: relative;
            overflow: hidden;
            height: 100%;
        }

        .stat-card .number {
            font-size: 2rem;
            font-weight: 800;
            color: var(--text);
            line-height: 1;
            margin-bottom: 0.55rem;
            letter-spacing: -0.03em;
        }

        .stat-card .label {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            color: var(--muted);
            font-size: 0.82rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table {
            margin-bottom: 0;
        }

        .table > :not(caption) > * > * {
            padding: 0.95rem 1rem;
            vertical-align: middle;
            border-color: #edf2f7;
        }

        .table th {
            background: var(--surface-muted);
            color: #475569;
            font-size: 0.74rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .table td {
            color: var(--text);
            font-size: 0.94rem;
        }

        .table tbody tr {
            transition: background-color 0.18s ease;
        }

        .table tbody tr:hover > * {
            background: #fbfdff;
        }

        .table code {
            display: inline-block;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            color: #334155;
            border-radius: 0.7rem;
            padding: 0.28rem 0.48rem;
            font-size: 0.82rem;
        }

        .admin-thumb {
            width: 72px;
            height: 54px;
            object-fit: cover;
            border-radius: 0.9rem;
            border: 1px solid #e2e8f0;
            box-shadow: 0 14px 26px -24px rgba(15, 23, 42, 0.35);
            display: block;
        }

        .admin-thumb-square {
            width: 56px;
            height: 56px;
            object-fit: cover;
            border-radius: 0.95rem;
            border: 1px solid #e2e8f0;
            display: block;
        }

        .table-actions {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
        }

        .table-actions form {
            margin: 0;
        }

        .badge-active,
        .badge-inactive {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.42rem 0.72rem;
            border-radius: 999px;
            font-size: 0.76rem;
            font-weight: 700;
        }

        .badge-active {
            background: var(--success-soft);
            color: var(--success-text);
            border: 1px solid #a7f3d0;
        }

        .badge-inactive {
            background: var(--danger-soft);
            color: var(--danger-text);
            border: 1px solid #fecaca;
        }

        .badge.bg-info {
            background: var(--info-soft) !important;
            color: var(--info-text) !important;
            border: 1px solid #bae6fd;
            font-weight: 700;
        }

        .badge.bg-warning {
            background: var(--warning-soft) !important;
            color: var(--warning-text) !important;
            border: 1px solid #fed7aa;
            font-weight: 700;
        }

        .badge.bg-danger {
            background: var(--danger-soft) !important;
            color: var(--danger-text) !important;
            border: 1px solid #fecaca;
            font-weight: 700;
        }

        .badge.bg-secondary {
            background: #f1f5f9 !important;
            color: #475569 !important;
            border: 1px solid #dbe5ef;
            font-weight: 700;
        }

        button.badge {
            cursor: pointer;
        }

        .alert {
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: 0.5rem;
            color: var(--text);
            font-size: 0.9rem;
        }

        .list-group {
            border-radius: 0;
        }

        .list-group-item {
            border-color: #edf2f7;
            padding: 1rem 1.15rem;
            background: transparent;
        }

        .list-group-item-action:hover {
            background: #fbfdff;
        }

        .form-label {
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.5rem;
        }

        .form-control,
        .form-select,
        .form-control-color {
            min-height: 42px;
            border-radius: 0.5rem;
            border: 1px solid #d1d5db;
            background: #ffffff;
            color: var(--text);
            padding: 0.5rem 0.75rem;
            font-size: 0.9rem;
            box-shadow: none !important;
        }

        textarea.form-control {
            min-height: auto;
        }

        .form-control:focus,
        .form-select:focus,
        .form-control-color:focus {
            border-color: #93c5fd;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.08) !important;
        }

        .form-check-input {
            cursor: pointer;
            box-shadow: none !important;
        }

        .nav-tabs {
            border-bottom: 1px solid var(--border);
            gap: 0;
        }

        .nav-tabs .nav-link {
            border: none;
            border-bottom: 2px solid transparent;
            background: transparent;
            color: var(--muted);
            border-radius: 0;
            padding: 0.75rem 1.25rem;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .nav-tabs .nav-link.active {
            background: transparent;
            color: var(--brand);
            border-bottom-color: var(--brand);
        }

        .progress {
            height: 0.5rem !important;
            border-radius: 999px;
            background: #e2e8f0;
            overflow: hidden;
        }

        .progress-bar {
            border-radius: 999px;
        }

        .pagination {
            gap: 0.35rem;
        }

        .page-link {
            border: 1px solid var(--border);
            border-radius: 0.4rem !important;
            color: #475569;
            background: #ffffff;
            padding: 0.45rem 0.75rem;
            font-size: 0.85rem;
        }

        .page-item.active .page-link {
            background: var(--brand);
            color: #ffffff;
        }

        .page-item.disabled .page-link {
            background: #f8fafc;
            color: #94a3b8;
        }

        .empty-row,
        .empty-state {
            color: var(--muted) !important;
            text-align: center;
        }

        .empty-row {
            padding: 2.35rem 1rem !important;
            font-weight: 500;
        }

        .separator {
            border-top: 1px solid var(--sidebar-border);
            margin: 0.5rem 0.75rem;
        }

        .sidebar-backdrop {
            display: none;
        }

        .main-content-inner {
            padding: 1.5rem 2rem;
        }

        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-110%);
                transition: transform 0.24s ease;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .sidebar-backdrop {
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, 0.4);
                z-index: 1035;
            }

            .sidebar-backdrop.show {
                display: block;
            }

            .main-content {
                margin-left: 0;
            }

            .main-content-inner {
                padding: 1rem;
            }

            .page-toolbar {
                flex-direction: column;
                align-items: stretch;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: min(85vw, 240px);
            }

            .main-content-inner {
                padding: 0.75rem;
            }

            .table > :not(caption) > * > * {
                padding: 0.7rem 0.6rem;
                font-size: 0.82rem;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    @php
        $pageTitle = trim($__env->yieldContent('title', 'Dashboard'));
        $pageDescriptions = [
            'Dashboard' => 'Monitor content, enquiries, and recent website activity from one place.',
            'Banners' => 'Manage homepage banners, ordering, and publishing status.',
            'Categories' => 'Organize program categories and keep the content structure clean.',
            'Programs' => 'Create, update, and publish student travel programs.',
            'Blogs' => 'Maintain blog content, publishing, and editorial updates.',
            'Gallery' => 'Upload and manage visual assets shown across the website.',
            'Enquiries' => 'Review incoming leads and keep follow-ups under control.',
            'Site Settings' => 'Control branding, contact details, social links, and global appearance.',
            'Add Program' => 'Create a new travel program with details, itinerary, and media.',
            'Edit Program' => 'Refine the selected program details, itinerary, and publishing status.',
            'Add Category' => 'Create a new category to organize programs clearly.',
            'Edit Category' => 'Update the selected category name, slug, and status.',
            'Add Banner' => 'Create a new banner for key website messaging.',
            'Edit Banner' => 'Update the selected banner content and visibility.',
            'Add Blog' => 'Write and publish a new blog article.',
            'Edit Blog' => 'Update blog content, metadata, and publishing status.',
            'Upload Gallery Images' => 'Add fresh gallery images for the frontend.',
            'View Enquiry' => 'Read the enquiry details and take action quickly.',
        ];
        $pageDescription = $pageDescriptions[$pageTitle] ?? 'Manage site content, assets, and settings with a consistent admin workspace.';
        $adminUser = Auth::guard('admin')->user();
        $adminInitial = strtoupper(substr($adminUser->name ?? 'A', 0, 1));
    @endphp

    <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

    <nav class="sidebar" id="sidebar">
        <div class="sidebar-inner">
            <div class="brand">
                <div class="brand-mark">
                    @if(setting('logo'))
                        <img src="{{ asset('storage/' . setting('logo')) }}" alt="TravelTag logo">
                    @else
                        <i class="bi bi-compass"></i>
                    @endif
                </div>
                <div class="brand-copy">
                    <strong>TravelTag</strong>
                    <span>Admin Console</span>
                </div>
            </div>

            <div class="sidebar-section-title">Workspace</div>

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                {{-- Banners hidden --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                        <i class="bi bi-tags"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.programs.*') ? 'active' : '' }}" href="{{ route('admin.programs.index') }}">
                        <i class="bi bi-globe-americas"></i>
                        <span>Programs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}" href="{{ route('admin.blogs.index') }}">
                        <i class="bi bi-pencil-square"></i>
                        <span>Blogs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}" href="{{ route('admin.gallery.index') }}">
                        <i class="bi bi-image"></i>
                        <span>Gallery</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}" href="{{ route('admin.contacts.index') }}">
                        <i class="bi bi-envelope"></i>
                        <span>Enquiries</span>
                        @php $unread = \App\Models\Contact::where('is_read', false)->count(); @endphp
                        @if($unread > 0)
                            <span class="badge bg-danger">{{ $unread }}</span>
                        @endif
                    </a>
                </li>
                <div class="separator"></div>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" href="{{ route('admin.settings.edit') }}">
                        <i class="bi bi-gear"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-footer">
                <a class="nav-link" href="{{ route('home') }}" target="_blank">
                    <i class="bi bi-box-arrow-up-right"></i>
                    <span>View Website</span>
                </a>
            </div>
        </div>
    </nav>

    <div class="main-content">
        <div class="top-bar">
            <div class="top-bar-copy">
                <button class="btn btn-outline-secondary sidebar-toggle d-lg-none me-2" type="button" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <h1>{{ strtoupper(now()->format('l, d M Y')) }}</h1>
            </div>

            <div class="top-bar-actions">
                <div class="user-chip">
                    <div>
                        <strong>{{ $adminUser->name }}</strong>
                        <small>Super Admin</small>
                    </div>
                    <div class="user-avatar">{{ $adminInitial }}</div>
                </div>

                <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-sm btn-outline-danger" type="submit">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <div class="main-content-inner">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-3">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mb-3">
                    <i class="bi bi-exclamation-circle me-2"></i><strong>Errors:</strong>
                    <ul class="mb-0 mt-2 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarBackdrop = document.getElementById('sidebarBackdrop');
        const sidebarToggle = document.getElementById('sidebarToggle');

        function closeSidebar() {
            sidebar.classList.remove('show');
            sidebarBackdrop.classList.remove('show');
            document.body.classList.remove('sidebar-open');
        }

        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', function () {
                sidebar.classList.toggle('show');
                sidebarBackdrop.classList.toggle('show');
                document.body.classList.toggle('sidebar-open');
            });
        }

        if (sidebarBackdrop) {
            sidebarBackdrop.addEventListener('click', closeSidebar);
        }

        window.addEventListener('resize', function () {
            if (window.innerWidth > 991) {
                closeSidebar();
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
