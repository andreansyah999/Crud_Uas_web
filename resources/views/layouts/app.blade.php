<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Andreansyah - Portfolio & Pemain Olahraga')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome for Premium Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS for Premium Design -->
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            --secondary-gradient: linear-gradient(135deg, #06b6d4 0%, #3b82f6 100%);
            --bg-primary: #ffffff;
            --bg-secondary: #f8fafc;
            --text-primary: #0f172a;
            --text-secondary: #475569;
            --border-color: #cbd5e1;
            --navbar-bg: rgba(255, 255, 255, 0.85);
            --card-bg: rgba(255, 255, 255, 0.9);
            --card-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.02);
            --card-shadow-hover: 0 20px 40px -5px rgba(79, 70, 229, 0.12), 0 8px 16px -2px rgba(79, 70, 229, 0.06);
            --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --wave-fill: #f8fafc;
            --hero-bg: linear-gradient(100deg, #e0f2fe 0%, #e8ecfc 50%, #f3e8ff 100%);
            --footer-bg: #0f172a;
            --footer-text: #94a3b8;
            --close-btn-filter: none;
            --input-bg: #ffffff;
        }

        [data-theme="dark"] {
            --bg-primary: #0b0f19;
            --bg-secondary: #020617;
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --border-color: #1e293b;
            --navbar-bg: rgba(11, 15, 25, 0.85);
            --card-bg: rgba(17, 24, 39, 0.85);
            --card-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.3), 0 4px 6px -2px rgba(0, 0, 0, 0.2);
            --card-shadow-hover: 0 20px 40px -5px rgba(79, 70, 229, 0.25), 0 8px 16px -2px rgba(79, 70, 229, 0.15);
            --wave-fill: #020617;
            --hero-bg: linear-gradient(100deg, #070a12 0%, #111428 50%, #1d0a2a 100%);
            --footer-bg: #020617;
            --footer-text: #64748b;
            --close-btn-filter: invert(1) grayscale(1) brightness(2);
            --input-bg: #0b0f19;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Outfit', sans-serif;
            background-color: var(--bg-secondary);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Navbar Styling */
        .navbar {
            background: var(--navbar-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-color);
            padding: 0.8rem 0;
            transition: var(--transition-smooth);
            z-index: 1050;
        }

        .navbar-brand {
            font-family: 'Outfit', sans-serif;
            transition: var(--transition-smooth);
        }

        .nav-link {
            font-weight: 500;
            color: var(--text-secondary);
            transition: var(--transition-smooth);
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
        }

        .nav-link:hover {
            color: #4f46e5;
            background: rgba(79, 70, 229, 0.05);
        }

        .nav-link.active {
            color: #4f46e5 !important;
            font-weight: 600;
            background: rgba(79, 70, 229, 0.08);
        }

        /* Premium Buttons */
        .btn-premium {
            background: var(--primary-gradient);
            color: white;
            border: none;
            font-weight: 600;
            padding: 0.6rem 1.5rem;
            border-radius: 10px;
            transition: var(--transition-smooth);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25);
        }

        .btn-premium:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.4);
            color: white;
            opacity: 0.95;
        }

        .btn-premium:active {
            transform: translateY(0);
        }

        .btn-premium-outline {
            background: transparent;
            color: #4f46e5;
            border: 2px solid #4f46e5;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            border-radius: 10px;
            transition: var(--transition-smooth);
        }

        .btn-premium-outline:hover {
            background: var(--primary-gradient);
            color: white;
            border-color: transparent;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.2);
        }

        /* Card Styling */
        .premium-card {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            transition: var(--transition-smooth);
            overflow: hidden;
            color: var(--text-primary);
        }

        .premium-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--card-shadow-hover);
            border-color: rgba(79, 70, 229, 0.2);
        }

        /* Modal Styling */
        .modal-content {
            background-color: var(--bg-primary) !important;
            color: var(--text-primary) !important;
            border: 1px solid var(--border-color);
        }

        .modal-header {
            background-color: var(--bg-secondary) !important;
            border-bottom: 1px solid var(--border-color) !important;
        }

        .modal-header .btn-close {
            filter: var(--close-btn-filter);
        }

        /* Page Footer */
        footer {
            margin-top: auto;
            background: var(--footer-bg);
            color: var(--footer-text);
            border-top: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .footer-brand {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--text-primary);
        }

        .footer-link {
            color: var(--text-secondary);
            text-decoration: none;
            transition: var(--transition-smooth);
        }

        .footer-link:hover {
            color: #4f46e5;
        }

        /* Form Controls */
        .form-control, .form-select {
            background-color: var(--input-bg) !important;
            color: var(--text-primary) !important;
            border: 1.5px solid var(--border-color);
            padding: 0.75rem 1rem;
            border-radius: 12px;
            font-weight: 500;
            transition: var(--transition-smooth);
        }

        .form-control:focus, .form-select:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        /* Custom Badges */
        .badge-premium {
            background: rgba(79, 70, 229, 0.1);
            color: #4f46e5;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 30px;
        }

        /* Responsive spacing */
        .main-content {
            padding: 3rem 0;
        }

        /* Theme Switch Toggle Styling */
        .theme-switch-wrapper {
            display: flex;
            align-items: center;
        }
        .theme-switch {
            display: inline-block;
            height: 28px;
            position: relative;
            width: 52px;
            margin: 0;
        }
        .theme-switch input {
            display: none;
        }
        .slider {
            background-color: #cbd5e1;
            bottom: 0;
            cursor: pointer;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            transition: .4s;
            border-radius: 34px;
        }
        .slider:before {
            background-color: white;
            bottom: 4px;
            content: "";
            height: 20px;
            left: 4px;
            position: absolute;
            transition: .4s;
            width: 20px;
            border-radius: 50%;
            box-shadow: 0 2px 4px rgba(0,0,0,0.15);
        }
        input:checked + .slider {
            background: var(--primary-gradient);
        }
        input:checked + .slider:before {
            transform: translateX(24px);
        }
    </style>
    @yield('styles')
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
                <div style="background: var(--primary-gradient); width: 38px; height: 38px; border-radius: 10px;" class="d-flex align-items-center justify-content-center text-white shadow-sm">
                    <i class="fa-solid fa-code" style="font-size: 1.1rem;"></i>
                </div>
                <div>
                    <span style="font-weight: 800; font-size: 1.1rem; color: var(--text-primary); display: block; line-height: 1.1; letter-spacing: -0.5px;">Andreansyah</span>
                    <span style="font-weight: 600; font-size: 0.75rem; color: var(--text-secondary); display: block; opacity: 0.85;">tech & athlete</span>
                </div>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-lg-3 gap-1">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('experience') ? 'active' : '' }}" href="{{ route('experience') }}">
                            Experience
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('projects') ? 'active' : '' }}" href="{{ route('projects') }}">
                            Projects
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('about') ? 'active' : '' }}" href="{{ route('about') }}">
                            About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                            Contact
                        </a>
                    </li>
                    @auth
                    <li class="nav-item ms-lg-2">
                        <a class="nav-link py-1 px-3 bg-indigo-subtle border border-indigo rounded text-indigo" href="{{ route('admin.index') }}" style="background: rgba(79, 70, 229, 0.08); border: 1px solid rgba(79, 70, 229, 0.2); color: #4f46e5 !important; font-weight: 600;">
                            <i class="fa-solid fa-gauge me-1"></i> CRUD
                        </a>
                    </li>
                    @endauth
                </ul>
                <div class="d-flex align-items-center gap-3">
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-premium-outline px-3 py-1.5 fs-7" style="font-size: 0.9rem; padding: 0.4rem 1.2rem;">
                            <i class="fa-solid fa-right-to-bracket me-1"></i>Login Admin
                        </a>
                    @else
                        <div class="dropdown">
                            <button class="btn btn-premium dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 0.9rem; padding: 0.4rem 1.2rem;">
                                <i class="fa-regular fa-circle-user me-1"></i>{{ Auth::user()->username }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg mt-2 rounded-4" aria-labelledby="userMenu" style="background: var(--bg-primary);">
                                <li>
                                    <a class="dropdown-item py-2 px-3 fw-semibold text-secondary" href="{{ route('admin.index') }}">
                                        <i class="fa-solid fa-table-list me-2 text-primary"></i>Kelola Event
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider" style="border-color: var(--border-color)"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item py-2 px-3 fw-semibold text-danger">
                                            <i class="fa-solid fa-power-off me-2"></i>Keluar
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endguest

                    <!-- Light/Dark Mode Switcher -->
                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox" />
                            <div class="slider round"></div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Dynamic Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="py-5 mt-auto">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
                    <span class="footer-brand"><i class="fa-solid fa-trophy me-2 text-warning"></i>PORTAL-PEMAIN</span>
                    <p class="mt-2 mb-0 text-secondary-emphasis" style="color: var(--text-secondary) !important;">Sistem Informasi &amp; Manajemen Data Pemain Olahraga Terpadu. Dibangun untuk memenuhi tugas UAS pemrograman web Laravel 12.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0" style="color: var(--text-secondary);">&copy; {{ date('Y') }} PORTAL-PEMAIN. NIM: 241011750024. All rights reserved.</p>
                    <p class="small mt-1 mb-0" style="color: var(--text-secondary);">Dibuat dengan <i class="fa-solid fa-heart text-danger"></i> &amp; Laravel 12 oleh <span class="fw-bold" style="color: var(--text-primary);">Andreansyah</span></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Dark Mode Script -->
    <script>
        const checkbox = document.getElementById('checkbox');
        const currentTheme = localStorage.getItem('theme') || 'light';

        document.documentElement.setAttribute('data-theme', currentTheme);
        if (currentTheme === 'dark') {
            checkbox.checked = true;
        }

        checkbox.addEventListener('change', function() {
            if (this.checked) {
                document.documentElement.setAttribute('data-theme', 'dark');
                localStorage.setItem('theme', 'dark');
            } else {
                document.documentElement.setAttribute('data-theme', 'light');
                localStorage.setItem('theme', 'light');
            }
        });
    </script>
    @yield('scripts')
</body>
</html>

