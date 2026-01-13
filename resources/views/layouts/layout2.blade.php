<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bumigora News - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #1E3A8A;
            --soft-blue: #3B82F6;
            --light-blue: #EFF6FF;
            --dark-blue: #1E40AF;
            --accent-gold: #D97706;
            --white: #FFFFFF;
            --gray-100: #F3F4F6;
            --gray-200: #E5E7EB;
            --gray-300: #D1D5DB;
            --gray-600: #4B5563;
            --gray-800: #1F2937;
        }

        body {
            font-family: 'Inter', 'Segoe UI', sans-serif;
            background-color: var(--white);
            color: var(--gray-800);
            line-height: 1.6;
        }

        /* Header */
        .bumigora-header {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 20px rgba(30, 58, 138, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .header-container {
            padding: 0 2rem;
        }

        /* Logo */
        .logo-wrapper {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.2rem 0;
        }

        .logo-circle {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--accent-gold) 0%, #F59E0B 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(217, 119, 6, 0.25);
        }

        .logo-initial {
            font-size: 22px;
            font-weight: 700;
            color: var(--white);
        }

        .logo-text {
            font-size: 24px;
            font-weight: 700;
            color: var(--white);
            letter-spacing: -0.5px;
            margin: 0;
        }

        .logo-tagline {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.85);
            font-weight: 400;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-top: 2px;
        }

        /* Navigation */
        .elegant-nav {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.8rem 0;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.95);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            padding: 0.6rem 1.2rem;
            border-radius: 20px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-block;
            letter-spacing: 0.3px;
        }

        .nav-link:hover {
            color: var(--white);
            background: rgba(255, 255, 255, 0.12);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .nav-link.active {
            color: var(--white);
            background: rgba(255, 255, 255, 0.15);
            font-weight: 600;
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 4px;
            background: var(--accent-gold);
            border-radius: 50%;
        }

        /* Search */
        .search-wrapper {
            position: relative;
            max-width: 280px;
        }

        .search-input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.8rem;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 25px;
            color: var(--white);
            font-size: 13.5px;
            transition: all 0.3s ease;
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .search-input:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.25);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.8);
            font-size: 13.5px;
        }

        /* Buttons */
        .elegant-btn {
            padding: 0.75rem 1.6rem;
            background: linear-gradient(135deg, var(--accent-gold) 0%, #F59E0B 100%);
            color: var(--white);
            border: none;
            border-radius: 25px;
            font-weight: 600;
            font-size: 13.5px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.2);
            letter-spacing: 0.3px;
        }

        .elegant-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(217, 119, 6, 0.3);
            color: var(--white);
        }

        .admin-btn {
            padding: 0.6rem 1.4rem;
            background: rgba(255, 255, 255, 0.12);
            color: var(--white);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            font-weight: 500;
            font-size: 13px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .admin-btn:hover {
            background: rgba(255, 255, 255, 0.18);
            color: var(--white);
            transform: translateY(-1px);
        }

        /* Mobile Menu */
        .mobile-menu-btn {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .mobile-menu-btn:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        .mobile-nav {
            position: fixed;
            top: 0;
            right: -320px;
            width: 300px;
            height: 100vh;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
            padding: 2rem;
            transition: right 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1100;
            box-shadow: -10px 0 30px rgba(0, 0, 0, 0.15);
        }

        .mobile-nav.active {
            right: 0;
        }

        .mobile-nav-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .mobile-close-btn {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 10px;
            width: 38px;
            height: 38px;
            color: var(--white);
            font-size: 18px;
            cursor: pointer;
        }

        .mobile-nav-links {
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
        }

        .mobile-nav-link {
            padding: 0.9rem 1.3rem;
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .mobile-nav-link:hover,
        .mobile-nav-link.active {
            background: rgba(255, 255, 255, 0.1);
            color: var(--white);
            padding-left: 1.6rem;
        }

        /* Main Content */
        main {
            min-height: 70vh;
            padding-top: 1.5rem;
            background: var(--white);
        }

        /* Footer */
        .elegant-footer {
            background: linear-gradient(135deg, var(--gray-100) 0%, var(--white) 100%);
            padding: 3.5rem 0 2rem;
            margin-top: 4rem;
            border-top: 1px solid var(--gray-200);
        }

        .footer-logo {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .footer-heading {
            font-size: 13px;
            font-weight: 600;
            color: var(--gray-600);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 1.2rem;
        }

        .footer-link {
            color: var(--gray-600);
            text-decoration: none;
            display: block;
            padding: 0.4rem 0;
            transition: all 0.3s ease;
            font-size: 13.5px;
        }

        .footer-link:hover {
            color: var(--soft-blue);
            padding-left: 0.4rem;
        }

        .footer-social {
            display: flex;
            gap: 0.8rem;
            margin-top: 1rem;
        }

        .social-icon {
            width: 34px;
            height: 34px;
            background: var(--white);
            border: 1px solid var(--gray-200);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-600);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            background: var(--soft-blue);
            color: var(--white);
            border-color: var(--soft-blue);
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(59, 130, 246, 0.15);
        }

        .footer-bottom {
            margin-top: 2.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--gray-200);
            text-align: center;
            color: var(--gray-600);
            font-size: 13px;
        }

        .footer-accent {
            color: var(--accent-gold);
            font-weight: 600;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .nav-link {
                padding: 0.55rem 1rem;
                font-size: 12.5px;
            }
        }

        @media (max-width: 992px) {
            .header-container {
                padding: 0 1.5rem;
            }

            .elegant-nav {
                display: none;
            }

            .search-wrapper {
                max-width: 250px;
            }
        }

        @media (max-width: 768px) {
            .header-container {
                padding: 0 1rem;
            }

            .logo-text {
                font-size: 20px;
            }

            .logo-circle {
                width: 42px;
                height: 42px;
            }

            .logo-tagline {
                font-size: 10px;
            }

            .search-wrapper {
                display: none;
            }

            .elegant-btn, .admin-btn {
                padding: 0.65rem 1.3rem;
                font-size: 12.5px;
            }
        }

        @media (max-width: 480px) {
            .logo-wrapper {
                gap: 0.75rem;
            }

            .logo-text {
                font-size: 18px;
            }

            .mobile-nav {
                width: 280px;
                padding: 1.5rem;
            }
        }

        /* Overlay */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: 1050;
            display: none;
        }

        .overlay.active {
            display: block;
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-in {
            animation: fadeIn 0.5s ease forwards;
        }

        /* Utility */
        .text-gradient {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--soft-blue) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Overlay for mobile menu -->
    <div class="overlay" id="overlay"></div>

    <!-- Header -->
    <header class="bumigora-header">
        <div class="container header-container">
            <div class="row align-items-center">
                <!-- Logo -->
                <div class="col-lg-4 col-md-6">
                    <div class="logo-wrapper">
                        <div class="logo-circle">
                            <span class="logo-initial">B</span>
                        </div>
                        <div>
                            <h1 class="logo-text">BUMIGORA NEWS</h1>
                            <div class="logo-tagline">Current Issues Portal</div>
                        </div>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div class="col-lg-4 d-none d-lg-block">
                    <nav class="elegant-nav">
                        <div class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                        </div>
                        <div class="nav-item">
                            <a href="{{ url('/about') }}" class="nav-link {{ request()->is('about') ? 'active' : '' }}">Tentang Kami</a>
                        </div>
                    </nav>
                </div>

                <!-- Right Section -->
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-center justify-content-end gap-2">
                        <!-- Search -->
                        <div class="search-wrapper d-none d-md-block">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" class="search-input" placeholder="Cari current issues...">
                        </div>

                        <!-- Admin Area -->
                        @auth
                        <a href="{{ route('post.create') }}" class="admin-btn d-none d-md-flex">
                            <i class="fas fa-plus-circle me-1"></i>
                            <span>Post Issue</span>
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="admin-btn d-none d-md-flex">
                                <i class="fas fa-sign-out-alt me-1"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                        @else
                        <!-- Admin Login -->
                        <a href="{{ route('login') }}" class="admin-btn d-none d-md-flex">
                            <i class="fas fa-lock me-1"></i>
                            <span>Admin</span>
                        </a>
                        @endauth

                        <!-- Mobile Menu Button -->
                        <button class="mobile-menu-btn d-lg-none" id="mobileMenuToggle">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Full Desktop Navigation -->
            <div class="row d-none d-lg-block">
                <div class="col-12">
                    <nav class="elegant-nav justify-content-center mt-1">
                        @foreach([
                            'politik-hukum' => 'Politik & Hukum',
                            'olahraga' => 'Olahraga',
                            'ekonomi-bisnis' => 'Ekonomi & Bisnis',
                            'kesehatan' => 'Kesehatan',
                            'teknologi-inovasi' => 'Teknologi',
                            'pendidikan' => 'Pendidikan',
                            'hiburan' => 'Hiburan',
                            'budaya-pariwisata' => 'Budaya',
                            'nasional' => 'Nasional',
                            'internasional' => 'Internasional'
                        ] as $slug => $name)
                        <div class="nav-item">
                            <a href="{{ url("/category/{$slug}") }}"
                               class="nav-link {{ request()->is("category/{$slug}") ? 'active' : '' }}">
                                {{ $name }}
                            </a>
                        </div>
                        @endforeach
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Navigation Menu -->
    <div class="mobile-nav" id="mobileNav">
        <div class="mobile-nav-header">
            <div class="d-flex align-items-center gap-2">
                <div class="logo-circle" style="width: 36px; height: 36px;">
                    <span class="logo-initial">B</span>
                </div>
                <div>
                    <h3 style="color: white; margin: 0; font-size: 16px;">BUMIGORA NEWS</h3>
                    <p style="color: rgba(255,255,255,0.8); margin: 0; font-size: 11px;">Current Issues</p>
                </div>
            </div>
            <button class="mobile-close-btn" id="mobileMenuClose">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Mobile Search -->
        <div class="search-wrapper mb-4">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-input" placeholder="Cari issues...">
        </div>

        <!-- Mobile Navigation Links -->
        <div class="mobile-nav-links">
            <a href="{{ url('/') }}" class="mobile-nav-link {{ request()->is('/') ? 'active' : '' }}">
                <i class="fas fa-home me-2"></i>Home
            </a>

            <!-- Kategori Utama -->
            <a href="{{ url('/category/nasional') }}" class="mobile-nav-link {{ request()->is('category/nasional') ? 'active' : '' }}">
                <i class="fas fa-flag me-2"></i>Nasional
            </a>
            <a href="{{ url('/category/internasional') }}" class="mobile-nav-link {{ request()->is('category/internasional') ? 'active' : '' }}">
                <i class="fas fa-globe me-2"></i>Internasional
            </a>

            <!-- Tentang Kami -->
            <a href="{{ url('/about') }}" class="mobile-nav-link {{ request()->is('about') ? 'active' : '' }}">
                <i class="fas fa-info-circle me-2"></i>Tentang Kami
            </a>

            <!-- Semua Kategori -->
            <div class="mt-2 pt-2 border-top border-white-10">
                <small style="color: rgba(255,255,255,0.6); font-size: 11px; padding-left: 1rem;">Semua Kategori</small>
                @foreach([
                    'politik-hukum' => ['icon' => 'fa-balance-scale', 'name' => 'Politik & Hukum'],
                    'ekonomi-bisnis' => ['icon' => 'fa-chart-line', 'name' => 'Ekonomi & Bisnis'],
                    'teknologi-inovasi' => ['icon' => 'fa-microchip', 'name' => 'Teknologi'],
                    'kesehatan' => ['icon' => 'fa-heartbeat', 'name' => 'Kesehatan'],
                    'pendidikan' => ['icon' => 'fa-graduation-cap', 'name' => 'Pendidikan'],
                    'hiburan' => ['icon' => 'fa-film', 'name' => 'Hiburan'],
                    'olahraga' => ['icon' => 'fa-futbol', 'name' => 'Olahraga'],
                    'budaya-pariwisata' => ['icon' => 'fa-landmark', 'name' => 'Budaya & Pariwisata']
                ] as $slug => $data)
                <a href="{{ url("/category/{$slug}") }}"
                   class="mobile-nav-link {{ request()->is("category/{$slug}") ? 'active' : '' }}">
                    <i class="fas {{ $data['icon'] }} me-2"></i>{{ $data['name'] }}
                </a>
                @endforeach
            </div>

            <!-- Admin Links -->
            @auth
            <div class="mt-3 pt-3 border-top border-white-10">
                <a href="{{ route('post.create') }}" class="mobile-nav-link">
                    <i class="fas fa-plus-circle me-2"></i>Post Issue
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="mobile-nav-link w-100 text-start" style="background: none; border: none;">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </button>
                </form>
            </div>
            @else
            <a href="{{ route('login') }}" class="mobile-nav-link">
                <i class="fas fa-lock me-2"></i>Admin Login
            </a>
            @endauth
        </div>

        <!-- Mobile Footer -->
        <div class="mt-5 pt-4 border-top border-white-10">
            <p style="color: rgba(255,255,255,0.7); font-size: 13px; text-align: center; margin-bottom: 1rem;">
                Current Issues Portal
            </p>
            <div class="footer-social justify-content-center">
                <a href="#" class="social-icon" style="background: rgba(255,255,255,0.1); color: white; border: none;">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-icon" style="background: rgba(255,255,255,0.1); color: white; border: none;">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="social-icon" style="background: rgba(255,255,255,0.1); color: white; border: none;">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container my-4 animate-in">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="elegant-footer">
        <div class="container">
            <div class="row">
                <!-- Brand Column -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div class="footer-logo">B</div>
                        <div>
                            <h4 style="color: var(--gray-800); font-weight: 700; margin: 0;">BUMIGORA NEWS</h4>
                            <p style="color: var(--gray-600); font-size: 12px; margin: 0;">Current Issues Platform</p>
                        </div>
                    </div>
                    <p class="mb-3" style="color: var(--gray-600); font-size: 13.5px;">
                        Portal khusus untuk isu-isu terkini, breaking news, dan topik trending.
                        Update real-time untuk informasi tercepat.
                    </p>
                    <div class="footer-social">
                        <a href="#" class="social-icon" title="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-icon" title="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Hot Issues -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="footer-heading">Hot Issues</h5>
                    <a href="{{ url('/category/nasional') }}" class="footer-link">
                        <i class="fas fa-flag me-2 text-primary"></i>Nasional
                    </a>
                    <a href="{{ url('/category/internasional') }}" class="footer-link">
                        <i class="fas fa-globe me-2 text-primary"></i>Internasional
                    </a>
                </div>

                <!-- Tentang & Kontak -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="footer-heading">Tentang Kami</h5>
                    <a href="{{ url('/about') }}" class="footer-link">
                        <i class="fas fa-info-circle me-2 text-primary"></i>Tentang Bumigora News
                    </a>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <p class="mb-0">
                    &copy; {{ date('Y') }} BUMIGORA NEWS - Current Issues Platform.
                    <span class="footer-accent">Real-time Updates</span>
                </p>
                <p class="mt-2 mb-0" style="font-size: 12px; color: var(--gray-500);">
                    Fokus pada isu terkini, breaking news, dan topik trending
                </p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mobile Menu Toggle
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const mobileMenuClose = document.getElementById('mobileMenuClose');
        const mobileNav = document.getElementById('mobileNav');
        const overlay = document.getElementById('overlay');

        function openMobileMenu() {
            mobileNav.classList.add('active');
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeMobileMenu() {
            mobileNav.classList.remove('active');
            overlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        mobileMenuToggle.addEventListener('click', openMobileMenu);
        mobileMenuClose.addEventListener('click', closeMobileMenu);
        overlay.addEventListener('click', closeMobileMenu);

        // Close menu on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeMobileMenu();
            }
        });

        // Search functionality - redirect to home with search param
        document.querySelectorAll('.search-input').forEach(input => {
            input.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    const query = this.value.trim();
                    if (query) {
                        window.location.href = `/?search=${encodeURIComponent(query)}`;
                    }
                }
            });
        });

        // Add animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.card').forEach(el => {
            observer.observe(el);
        });

        // Auto-hide alerts after 5 seconds
        document.querySelectorAll('.alert').forEach(alert => {
            setTimeout(() => {
                alert.style.opacity = '0';
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 300);
            }, 5000);
        });
    </script>
    @yield('scripts')
</body>
</html>
