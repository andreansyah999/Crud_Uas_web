<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Admin Dashboard - SKOTE')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom Skote styling -->
    <style>
        :root {
            --bs-sidebar-bg: #2a3042;
            --bs-sidebar-text: #79829c;
            --bs-sidebar-hover: #ffffff;
            --bs-sidebar-active: #ffffff;
            --bs-sidebar-active-bg: #32394e;
            --primary-color: #556ee6;
            --primary-hover: #4458be;
            --body-bg: #f8f8fb;
            --card-shadow: 0 0.75rem 1.5rem rgba(18, 38, 63, 0.03);
            --transition-smooth: all 0.2s ease-out;
        }

        body {
            font-family: 'Inter', 'Outfit', sans-serif;
            background-color: var(--body-bg);
            color: #495057;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

        #layout-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .vertical-menu {
            width: 250px;
            background: var(--bs-sidebar-bg);
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1001;
            box-shadow: 0 0.75rem 1.5rem rgba(18, 38, 63, 0.05);
            transition: var(--transition-smooth);
            display: flex;
            flex-direction: column;
        }

        /* Logo Brand Box */
        .navbar-brand-box {
            height: 70px;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            background: var(--bs-sidebar-bg);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .navbar-brand-box a {
            display: flex;
            align-items: center;
            text-decoration: none;
            gap: 10px;
        }

        .logo-icon-svg {
            width: 26px;
            height: 26px;
            fill: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-txt {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: 21px;
            color: #ffffff;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        /* Navigation menu scroll wrapper */
        .sidebar-menu-scroll {
            flex-grow: 1;
            overflow-y: auto;
            padding-top: 15px;
        }

        /* Custom Scrollbar for Sidebar */
        .sidebar-menu-scroll::-webkit-scrollbar {
            width: 5px;
        }
        .sidebar-menu-scroll::-webkit-scrollbar-track {
            background: transparent;
        }
        .sidebar-menu-scroll::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        #sidebar-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        #sidebar-menu ul li.menu-title {
            padding: 12px 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            color: #6a7187;
            letter-spacing: .05em;
        }

        #sidebar-menu ul li a {
            display: flex;
            align-items: center;
            padding: 12.5px 20px;
            color: var(--bs-sidebar-text);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: var(--transition-smooth);
            gap: 12px;
        }

        #sidebar-menu ul li a i {
            font-size: 17px;
            min-width: 20px;
            text-align: center;
            transition: color 0.2s;
        }

        #sidebar-menu ul li a .menu-arrow {
            margin-left: auto;
            font-size: 11px;
            transition: transform 0.2s;
        }

        #sidebar-menu ul li a:hover {
            color: var(--bs-sidebar-hover);
        }

        #sidebar-menu ul li a:hover i {
            color: var(--bs-sidebar-hover);
        }

        #sidebar-menu ul li.active > a {
            color: var(--bs-sidebar-active);
            font-weight: 600;
        }

        #sidebar-menu ul li.active > a i {
            color: var(--bs-sidebar-active);
        }

        #sidebar-menu ul li.active {
            background-color: var(--bs-sidebar-active-bg);
            border-left: 3px solid var(--primary-color);
        }

        #sidebar-menu ul li.active a {
            padding-left: 17px; /* Adjust for border */
        }

        /* Topbar Header */
        #page-topbar {
            position: fixed;
            top: 0;
            right: 0;
            left: 250px;
            height: 70px;
            z-index: 1000;
            background-color: #ffffff;
            border-bottom: 1px solid #eff2f7;
            box-shadow: 0 2px 4px rgba(18, 38, 63, 0.02);
            transition: var(--transition-smooth);
        }

        .navbar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100%;
            padding: 0 20px;
        }

        .navbar-header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        #vertical-menu-btn {
            border: none;
            background: transparent;
            color: #555555;
            font-size: 20px;
            cursor: pointer;
            padding: 8px 12px;
            border-radius: 4px;
            transition: var(--transition-smooth);
        }

        #vertical-menu-btn:hover {
            background-color: #f3f3f9;
            color: var(--primary-color);
        }

        /* Search input style */
        .app-search {
            position: relative;
            display: block;
        }

        .app-search input {
            border: none;
            height: 38px;
            padding-left: 40px;
            padding-right: 20px;
            background-color: #f3f3f9;
            border-radius: 30px;
            width: 240px;
            outline: none;
            color: #495057;
            font-size: 13px;
            transition: var(--transition-smooth);
        }

        .app-search input:focus {
            width: 260px;
            background-color: #eef2f7;
        }

        .app-search i {
            position: absolute;
            left: 15px;
            top: 12.5px;
            color: #74788d;
            font-size: 13px;
        }

        .navbar-header-right {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .header-item {
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 12px;
            color: #6f767e;
            border: none;
            background: transparent;
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .header-item:hover {
            background-color: #f8f9fa;
        }

        .header-item i {
            font-size: 18px;
            color: #555555;
        }

        /* User Profile Dropdown */
        .header-profile-user {
            height: 32px;
            width: 32px;
            border-radius: 50%;
            object-fit: cover;
            border: 1px solid #e2e8f0;
        }

        .user-name-text {
            font-size: 13.5px;
            font-weight: 600;
            color: #495057;
        }

        /* Main Content Container */
        .main-content {
            margin-left: 250px;
            width: calc(100% - 250px);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: var(--transition-smooth);
            padding-top: 70px; /* offset topbar height */
        }

        .page-content {
            padding: 24px;
            flex-grow: 1;
        }

        /* Breadcrumbs and Dashboard Title */
        .page-title-box {
            padding-bottom: 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .page-title-box h4 {
            text-transform: uppercase;
            font-weight: 700;
            font-size: 16px;
            margin: 0;
            font-family: 'Outfit', sans-serif;
            letter-spacing: 0.5px;
            color: #495057;
        }

        .breadcrumb {
            margin: 0;
            padding: 0;
            background: transparent;
            font-size: 13px;
        }

        .breadcrumb-item a {
            color: #74788d;
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: #495057;
            font-weight: 500;
        }

        /* Cards styles */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            margin-bottom: 24px;
            background-color: #ffffff;
            border: 1px solid #eff2f7;
        }

        .card-body {
            padding: 24px;
        }

        /* Page Footer styling */
        .footer {
            height: 60px;
            background-color: #f2f2f6;
            border-top: 1px solid #eff2f7;
            display: flex;
            align-items: center;
            padding: 0 24px;
            color: #74788d;
            font-size: 13px;
            margin-top: auto;
        }

        /* Collapse Toggle Classes */
        body.vertical-collapsified .vertical-menu {
            width: 70px;
        }

        body.vertical-collapsified .navbar-brand-box {
            padding: 0;
            justify-content: center;
        }

        body.vertical-collapsified .logo-txt {
            display: none;
        }

        body.vertical-collapsified #page-topbar {
            left: 70px;
        }

        body.vertical-collapsified .main-content {
            margin-left: 70px;
            width: calc(100% - 70px);
        }

        body.vertical-collapsified #sidebar-menu ul li.menu-title {
            display: none;
        }

        body.vertical-collapsified #sidebar-menu ul li a span {
            display: none;
        }

        body.vertical-collapsified #sidebar-menu ul li a .menu-arrow {
            display: none;
        }

        body.vertical-collapsified #sidebar-menu ul li a {
            padding: 15px 0;
            justify-content: center;
        }

        body.vertical-collapsified #sidebar-menu ul li.active {
            border-left: none;
            background-color: var(--bs-sidebar-active-bg);
        }
        
        body.vertical-collapsified #sidebar-menu ul li.active a {
            padding-left: 0;
            color: var(--primary-color);
        }

        body.vertical-collapsified #sidebar-menu ul li.active a i {
            color: var(--primary-color);
        }

        /* Responsive Sidebar overlay */
        @media (max-width: 992px) {
            .vertical-menu {
                left: -250px;
            }
            #page-topbar {
                left: 0;
            }
            .main-content {
                margin-left: 0;
                width: 100%;
            }
            body.sidebar-enable .vertical-menu {
                left: 0;
                width: 250px;
            }
            body.sidebar-enable .vertical-overlay {
                display: block;
            }
            body.vertical-collapsified .vertical-menu {
                left: -70px;
            }
        }

        .vertical-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1000;
            background-color: rgba(15, 23, 42, 0.4);
            backdrop-filter: blur(2px);
        }

        /* Common Elements Button style */
        .btn-skote-blue {
            background-color: var(--primary-color);
            color: #ffffff;
            border: none;
            font-weight: 500;
            border-radius: 4px;
            padding: 8px 16px;
            font-size: 13.5px;
            transition: var(--transition-smooth);
        }

        .btn-skote-blue:hover {
            background-color: var(--primary-hover);
            color: #ffffff;
        }

        .btn-skote-secondary {
            background-color: #74788d;
            color: #ffffff;
            border: none;
            font-weight: 500;
            border-radius: 4px;
            padding: 8px 16px;
            font-size: 13.5px;
            transition: var(--transition-smooth);
        }

        .btn-skote-secondary:hover {
            background-color: #5b5e6f;
            color: #ffffff;
        }

        .btn-skote-success {
            background-color: #34c38f;
            color: #ffffff;
            border: none;
            font-weight: 500;
            border-radius: 4px;
            padding: 8px 16px;
            font-size: 13.5px;
            transition: var(--transition-smooth);
        }

        .btn-skote-success:hover {
            background-color: #2ca77a;
            color: #ffffff;
        }
    </style>
    @yield('styles')
</head>
<body>

    <!-- Responsive Overlay -->
    <div class="vertical-overlay"></div>

    <div id="layout-wrapper">

        <!-- Left Sidebar (Vertical Menu) -->
        <div class="vertical-menu">
            
            <!-- Logo Box -->
            <div class="navbar-brand-box">
                <a href="{{ route('home') }}">
                    <div class="logo-icon-svg text-primary">
                        <!-- Custom diamond logo icon like Skote -->
                        <i class="fa-solid fa-gem fa-lg" style="color: #556ee6;"></i>
                    </div>
                    <span class="logo-txt">SKOTE</span>
                </a>
            </div>

            <!-- Scrollable menu links -->
            <div class="sidebar-menu-scroll">
                <div id="sidebar-menu">
                    <ul>
                        <li class="menu-title">Menu</li>
                        
                        <!-- Collapsible Parent Menu Pemain Olahraga -->
                        <li class="{{ Route::is('admin.index') || Route::is('admin.create') || Route::is('admin.edit') ? 'active' : '' }}">
                            <a href="{{ route('admin.index') }}">
                                <i class="fa-solid fa-running"></i>
                                <span>Pemain Olahraga</span>
                            </a>
                        </li>

                        <li class="menu-title">Aktivitas</li>
                        <li>
                            <a href="{{ route('home') }}">
                                <i class="fa-solid fa-globe"></i>
                                <span>Kunjungi Portal</span>
                            </a>
                        </li>
                        <li>
                            <form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();" class="text-danger">
                                <i class="fa-solid fa-power-off text-danger"></i>
                                <span>Keluar</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        <!-- Topbar Header -->
        <header id="page-topbar">
            <div class="navbar-header">
                
                <div class="navbar-header-left">
                    <!-- Hamburger Toggle Menu -->
                    <button type="button" id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <!-- Search Input -->
                    <div class="app-search d-none d-md-block">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" placeholder="Search...">
                    </div>
                </div>

                <div class="navbar-header-right">
                    
                    <!-- Search Input for Mobile (Toggleable if needed, otherwise simplified) -->
                    <button type="button" class="btn header-item d-md-none">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>

                    <!-- Fullscreen Toggle Button -->
                    <button type="button" class="btn header-item" id="fullscreen-btn" title="Toggle Fullscreen">
                        <i class="fa-solid fa-expand"></i>
                    </button>

                    <!-- Profile Dropdown -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item d-flex align-items-center gap-2" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- Circular Avatar Placeholder -->
                            <img class="header-profile-user" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=556ee6&color=fff&bold=true" alt="Header Avatar">
                            <span class="user-name-text d-none d-xl-inline-block ms-1">{{ Auth::user()->username }}</span>
                            <i class="fa-solid fa-angle-down d-none d-xl-inline-block font-size-12"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end border-0 shadow-lg mt-2 rounded-3" aria-labelledby="page-header-user-dropdown">
                            <!-- Dropdown Links -->
                            <a class="dropdown-item py-2 px-3 fw-medium" href="{{ route('admin.index') }}">
                                <i class="fa-solid fa-table-list me-2 text-primary"></i>Kelola Pemain
                            </a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('logout') }}" method="POST" id="logout-form-dropdown" class="d-none">
                                @csrf
                            </form>
                            <a class="dropdown-item py-2 px-3 fw-medium text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form-dropdown').submit();">
                                <i class="fa-solid fa-power-off me-2"></i>Keluar
                            </a>
                        </div>
                    </div>

                    <!-- Settings Gear Icon -->
                    <button type="button" class="btn header-item" title="Settings">
                        <i class="fa-solid fa-gear"></i>
                    </button>

                </div>

            </div>
        </header>

        <!-- Main Content Area -->
        <div class="main-content">
            
            <div class="page-content">
                <div class="container-fluid">
                    
                    <!-- Title and Breadcrumbs row -->
                    <div class="page-title-box">
                        <h4>@yield('page_title', 'DASHBOARD')</h4>
                        
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">https://skote-html.com</a></li>
                                <li class="breadcrumb-item active">@yield('breadcrumb_active', 'Data Pegawai')</li>
                            </ol>
                        </div>
                    </div>

                    <!-- Alert messages -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show border-0 rounded-3 shadow-sm mb-4" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-circle-check fa-lg me-2 text-success"></i>
                                <div>
                                    <strong>Sukses!</strong> {{ session('success') }}
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show border-0 rounded-3 shadow-sm mb-4" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-triangle-exclamation fa-lg me-2 text-danger"></i>
                                <div>
                                    <strong>Error!</strong> {{ session('error') }}
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Main Dynamic Content -->
                    @yield('content')

                </div>
            </div>

            <!-- Page Footer -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row w-100 align-items-center">
                        <div class="col-sm-6 text-center text-sm-start">
                            2024 © Prodi Sistem Informasi.
                        </div>
                        <div class="col-sm-6 text-center text-sm-end">
                            Universitas Pamulang
                        </div>
                    </div>
                </div>
            </footer>

        </div>

    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Sidebar Toggle Logic & Interactive Features -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('vertical-menu-btn');
            const body = document.body;

            // Toggle Sidebar width
            toggleBtn.addEventListener('click', function(e) {
                e.preventDefault();
                body.classList.toggle('vertical-collapsified');
                
                // Active responsive mobile classes
                if (window.innerWidth <= 992) {
                    body.classList.toggle('sidebar-enable');
                }
            });

            // Close sidebar overlay on mobile click outside
            const overlay = document.querySelector('.vertical-overlay');
            if (overlay) {
                overlay.addEventListener('click', function() {
                    body.classList.remove('sidebar-enable');
                    body.classList.add('vertical-collapsified');
                });
            }

            // Fullscreen functionality
            const fullscreenBtn = document.getElementById('fullscreen-btn');
            if (fullscreenBtn) {
                fullscreenBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (!document.fullscreenElement) {
                        document.documentElement.requestFullscreen().then(() => {
                            fullscreenBtn.innerHTML = '<i class="fa-solid fa-compress"></i>';
                        }).catch(err => {
                            console.error(`Error attempting to enable fullscreen: ${err.message}`);
                        });
                    } else {
                        document.exitFullscreen().then(() => {
                            fullscreenBtn.innerHTML = '<i class="fa-solid fa-expand"></i>';
                        });
                    }
                });
            }

            // Sync top search bar to DataTable search input dynamically
            const topSearch = document.querySelector('.app-search input');
            if (topSearch) {
                topSearch.addEventListener('input', function() {
                    const dataTableSearch = document.querySelector('.dataTables_filter input');
                    if (dataTableSearch) {
                        dataTableSearch.value = topSearch.value;
                        dataTableSearch.dispatchEvent(new Event('input')); // trigger DataTable filtering
                    }
                });
            }
        });
    </script>
    @yield('scripts')
</body>
</html>
