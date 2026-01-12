@extends('layouts.layout2')

@section('title', 'Current Issues - Home')

@section('content')
<!-- Success Message -->
@if (session('success'))
<div class="container mb-4">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div class="d-flex align-items-center">
            <i class="fas fa-check-circle me-3 fs-4"></i>
            <div>
                <h5 class="alert-heading mb-1">Success!</h5>
                <p class="mb-0">{{ session('success') }}</p>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

<!-- Hero Section -->
<section class="hero-section mb-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold mb-3" style="color: var(--primary-blue);">
                Bumigora News
            </h1>
            <p class="lead text-muted mb-4" style="max-width: 600px; margin: 0 auto;">
                Portal berita terkini dengan fokus pada isu-isu aktual dan breaking news.
            </p>
        </div>
    </div>
</section>

<!-- Latest `s Section -->
<section class="latest-articles mb-5">
    <div class="container">
        <div class="section-header mb-4">
            <h2 class="fw-bold" style="color: var(--gray-800);">
                Artikel Terbaru
            </h2>
            <p class="text-muted">Update berita dan isu terkini</p>
        </div>

        <!-- Articles Grid -->
        @if($posts->count() > 0)
        <div class="row g-4">
            @foreach($posts as $post)
            <div class="col-lg-4 col-md-6">
                <div class="card article-card h-100 border-0 shadow-sm">
                    <!-- Article Image with Dummy based on Category -->
                    <div class="article-image position-relative overflow-hidden" style="height: 200px;">
                        <div class="category-badge position-absolute" style="top: 15px; left: 15px; z-index: 2;">
                            <span class="badge bg-primary">
                                {{ $post->category ?? 'Umum' }}
                            </span>
                        </div>

                        @php
                        $categoryImages = [
                            'politik-hukum' => 'https://images.unsplash.com/photo-1551135049-8a33b2fb2f5c',
                            'olahraga' => 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211',
                            'ekonomi-bisnis' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f',
                            'kesehatan' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1f',
                            'teknologi-inovasi' => 'https://images.unsplash.com/photo-1518709268805-4e9042af2176',
                            'pendidikan' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1',
                            'hiburan' => 'https://images.unsplash.com/photo-1489599809516-9827b6d1cf13',
                            'budaya-pariwisata' => 'https://images.unsplash.com/photo-1523531294919-4bcd7c65e216',
                            'nasional' => 'https://images.unsplash.com/photo-1511895426328-dc8714191300',
                        ];

                        $slug = $post->category?->slug;
                        $imageUrl = $categoryImages[$slug]
                            ?? 'https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1';
                        @endphp

                        <img src="{{ $imageUrl }}"
                             alt="{{ $post->title }}"
                             class="img-fluid w-100 h-100 object-fit-cover"
                             style="transition: transform 0.5s ease;">
                        <div class="position-absolute top-0 start-0 w-100 h-100"
                             style="background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.1) 100%);"></div>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="text-muted small">
                                <i class="far fa-clock me-1"></i>
                                {{ $post->created_at->diffForHumans() }}
                            </span>
                            <span class="text-muted small">
                                <i class="far fa-eye me-1"></i> 1.2k
                            </span>
                        </div>

                        <h5 class="card-title mb-3" style="color: var(--gray-800); line-height: 1.4;">
                            <a href="{{ route('post.show', $post->slug) }}" class="text-decoration-none text-dark">
                                {{ \Illuminate\Support\Str::limit($post->title, 70) }}
                            </a>
                        </h5>

                        <p class="card-text text-muted mb-4" style="font-size: 0.9rem; line-height: 1.5;">
                            {{ \Illuminate\Support\Str::limit($post->content, 120) }}
                        </p>

                        <div class="card-footer bg-transparent border-top-0 px-0 pb-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('post.show', $post->slug) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-book-reader me-1"></i> Lihat Selengkapnya
                                </a>

                                <!-- Admin Actions -->
                                @auth
                                <div class="admin-actions">
                                    <a href="{{ route('post.edit', $post->id) }}"
                                       class="btn btn-sm btn-outline-secondary me-1" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('post.destroy', $post->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-secondary" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($posts->hasPages())
        <div class="mt-5 pt-4 border-top">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3 mb-md-0">
                    <p class="text-muted mb-0">
                        Menampilkan artikel
                        <span class="fw-bold" style="color: var(--primary-blue);">{{ $posts->firstItem() }}</span>
                        -
                        <span class="fw-bold" style="color: var(--primary-blue);">{{ $posts->lastItem() }}</span>
                        dari
                        <span class="fw-bold" style="color: var(--primary-blue);">{{ $posts->total() }}</span>
                        artikel
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-end">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
        @endif

        @else
        <!-- Empty State -->
        <div class="text-center py-5 my-5">
            <div class="empty-icon mb-4">
                <i class="fas fa-newspaper fa-4x" style="color: var(--gray-300);"></i>
            </div>
            <h3 class="mb-3" style="color: var(--gray-700);">Belum Ada Artikel</h3>
            <p class="text-muted mb-4" style="max-width: 500px; margin: 0 auto;">
                @if(request('search') || request('category'))
                Tidak ada artikel yang sesuai dengan pencarian Anda.
                @else
                Admin belum mempublikasikan artikel.
                @endif
            </p>
            @auth
            <a href="{{ route('post.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle me-2"></i>
                Buat Artikel Pertama
            </a>
            @endif
        </div>
        @endif
    </div>
</section>

<!-- All Categories Section -->
<section class="all-categories-section py-5" style="background: var(--light-blue);">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="fw-bold mb-3" style="color: var(--primary-blue);">
                <i class="fas fa-tags me-2"></i>Semua Kategori Berita
            </h2>
            <p class="text-muted mb-0">Jelajahi semua kategori yang tersedia di Bumigora News</p>
        </div>

        <div class="row g-4">
            @php
                $allCategories = [
                    'politik-hukum' => [
                        'name' => 'Politik & Hukum',
                        'icon' => 'fa-balance-scale',
                        'image' => 'https://images.unsplash.com/photo-1551135049-8a33b2fb2f5c?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=400&q=80',
                        'description' => 'Berita seputar politik, hukum, dan pemerintahan',
                        'count' => \App\Models\Post::where('category', 'politik-hukum')->count()
                    ],
                    'olahraga' => [
                        'name' => 'Olahraga',
                        'icon' => 'fa-futbol',
                        'image' => 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=400&q=80',
                        'description' => 'Update terkini dunia olahraga dan pertandingan',
                        'count' => \App\Models\Post::where('category', 'olahraga')->count()
                    ],
                    'ekonomi-bisnis' => [
                        'name' => 'Ekonomi & Bisnis',
                        'icon' => 'fa-chart-line',
                        'image' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=400&q=80',
                        'description' => 'Berita ekonomi, bisnis, dan keuangan',
                        'count' => \App\Models\Post::where('category', 'ekonomi-bisnis')->count()
                    ],
                    'kesehatan' => [
                        'name' => 'Kesehatan',
                        'icon' => 'fa-heartbeat',
                        'image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1f?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=400&q=80',
                        'description' => 'Informasi kesehatan, medis, dan gaya hidup sehat',
                        'count' => \App\Models\Post::where('category', 'kesehatan')->count()
                    ],
                    'teknologi-inovasi' => [
                        'name' => 'Teknologi & Inovasi',
                        'icon' => 'fa-microchip',
                        'image' => 'https://images.unsplash.com/photo-1518709268805-4e9042af2176?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=400&q=80',
                        'description' => 'Teknologi terkini, inovasi, dan perkembangan IT',
                        'count' => \App\Models\Post::where('category', 'teknologi-inovasi')->count()
                    ],
                    'pendidikan' => [
                        'name' => 'Pendidikan',
                        'icon' => 'fa-graduation-cap',
                        'image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=400&q=80',
                        'description' => 'Berita pendidikan, akademik, dan riset',
                        'count' => \App\Models\Post::where('category', 'pendidikan')->count()
                    ],
                    'hiburan' => [
                        'name' => 'Hiburan',
                        'icon' => 'fa-film',
                        'image' => 'https://images.unsplash.com/photo-1489599809516-9827b6d1cf13?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=400&q=80',
                        'description' => 'Film, musik, artis, dan industri hiburan',
                        'count' => \App\Models\Post::where('category', 'hiburan')->count()
                    ],
                    'budaya-pariwisata' => [
                        'name' => 'Budaya & Pariwisata',
                        'icon' => 'fa-landmark',
                        'image' => 'https://images.unsplash.com/photo-1523531294919-4bcd7c65e216?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=400&q=80',
                        'description' => 'Kebudayaan, pariwisata, dan tradisi',
                        'count' => \App\Models\Post::where('category', 'budaya-pariwisata')->count()
                    ],
                    'nasional' => [
                        'name' => 'Nasional',
                        'icon' => 'fa-flag',
                        'image' => 'https://images.unsplash.com/photo-1511895426328-dc8714191300?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=400&q=80',
                        'description' => 'Berita dalam negeri dan isu nasional',
                        'count' => \App\Models\Post::where('category', 'nasional')->count()
                    ],
                    'internasional' => [
                        'name' => 'Internasional',
                        'icon' => 'fa-globe',
                        'image' => 'https://images.unsplash.com/photo-1489944440615-453fc2b6a9a9?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=400&q=80',
                        'description' => 'Berita dunia dan isu global',
                        'count' => \App\Models\Post::where('category', 'internasional')->count()
                    ],
                    'lingkungan-bencana' => [
                        'name' => 'Lingkungan & Bencana',
                        'icon' => 'fa-leaf',
                        'image' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=400&q=80',
                        'description' => 'Isu lingkungan, alam, dan bencana',
                        'count' => \App\Models\Post::where('category', 'lingkungan-bencana')->count()
                    ],
                    'umum' => [
                        'name' => 'Umum',
                        'icon' => 'fa-newspaper',
                        'image' => 'https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=400&q=80',
                        'description' => 'Berita umum dan topik lainnya',
                        'count' => \App\Models\Post::where('category', 'umum')->count()
                    ]
                ];
            @endphp

            @foreach($allCategories as $slug => $category)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="category-card card border-0 shadow-sm h-100 hover-lift">
                    <div class="position-relative overflow-hidden" style="height: 150px;">
                        <img src="{{ $category['image'] }}"
                             alt="{{ $category['name'] }}"
                             class="img-fluid w-100 h-100 object-fit-cover"
                             style="transition: transform 0.5s ease;">
                        <div class="position-absolute top-0 start-0 w-100 h-100"
                             style="background: linear-gradient(to bottom, rgba(30, 58, 138, 0.7) 0%, rgba(30, 58, 138, 0.9) 100%);"></div>
                        <div class="position-absolute top-50 start-50 translate-middle text-center w-100 p-3">
                            <i class="fas {{ $category['icon'] }} fa-2x text-white mb-2"></i>
                            <h5 class="text-white mb-0" style="font-size: 1rem;">{{ $category['name'] }}</h5>
                        </div>
                    </div>

                    <div class="card-body text-center p-3">
                        <p class="text-muted mb-2 small">
                            <i class="fas fa-file-alt me-1"></i>
                            {{ $category['count'] }} artikel
                        </p>
                        <p class="text-muted mb-3 small" style="font-size: 0.8rem;">
                            {{ $category['description'] }}
                        </p>
                        <a href="{{ url('/category/' . $slug) }}" class="btn btn-sm btn-outline-primary">
                            Lihat Artikel <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Stats Section -->
        <div class="row mt-5 pt-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm bg-white">
                    <div class="card-body p-4">
                        <div class="row text-center">
                            <div class="col-md-4 mb-3">
                                <div class="stats-item">
                                    <h3 class="fw-bold mb-1" style="color: var(--primary-blue);">
                                        {{ \App\Models\Post::count() }}
                                    </h3>
                                    <p class="text-muted mb-0">Total Artikel</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="stats-item">
                                    <h3 class="fw-bold mb-1" style="color: var(--primary-blue);">
                                        {{ count($allCategories) }}
                                    </h3>
                                    <p class="text-muted mb-0">Kategori</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="stats-item">
                                    <h3 class="fw-bold mb-1" style="color: var(--primary-blue);">
                                        24/7
                                    </h3>
                                    <p class="text-muted mb-0">Update Real-time</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Custom Styles */
    .article-card {
        transition: all 0.3s ease;
        border: 1px solid var(--gray-200);
        overflow: hidden;
    }

    .article-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .article-card:hover .article-image img {
        transform: scale(1.05);
    }

    .article-image {
        border-radius: 8px 8px 0 0;
        overflow: hidden;
        position: relative;
    }

    .object-fit-cover {
        object-fit: cover;
    }

    .category-badge .badge {
        font-size: 0.75rem;
        padding: 0.4rem 0.8rem;
        border-radius: 20px;
        font-weight: 500;
        background: rgba(30, 58, 138, 0.9);
    }

    .section-header {
        position: relative;
        padding-bottom: 15px;
    }

    .section-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 3px;
        background: var(--primary-blue);
        border-radius: 2px;
    }

    .text-center .section-header::after {
        left: 50%;
        transform: translateX(-50%);
    }

    /* Category Cards */
    .category-card {
        transition: all 0.3s ease;
        border: 1px solid var(--gray-200);
        overflow: hidden;
    }

    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .category-card:hover img {
        transform: scale(1.1);
    }

    .hover-lift:hover {
        transform: translateY(-5px);
    }

    /* Animation for cards */
    .article-card, .category-card {
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Stagger animation for 12 categories */
    .category-card:nth-child(1) { animation-delay: 0.1s; }
    .category-card:nth-child(2) { animation-delay: 0.15s; }
    .category-card:nth-child(3) { animation-delay: 0.2s; }
    .category-card:nth-child(4) { animation-delay: 0.25s; }
    .category-card:nth-child(5) { animation-delay: 0.3s; }
    .category-card:nth-child(6) { animation-delay: 0.35s; }
    .category-card:nth-child(7) { animation-delay: 0.4s; }
    .category-card:nth-child(8) { animation-delay: 0.45s; }
    .category-card:nth-child(9) { animation-delay: 0.5s; }
    .category-card:nth-child(10) { animation-delay: 0.55s; }
    .category-card:nth-child(11) { animation-delay: 0.6s; }
    .category-card:nth-child(12) { animation-delay: 0.65s; }

    /* Admin actions */
    .admin-actions .btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        color: var(--gray-600);
        border-color: var(--gray-300);
        transition: all 0.3s ease;
    }

    .admin-actions .btn:hover {
        background-color: var(--gray-100);
        transform: scale(1.05);
    }

    /* Button styles */
    .btn-primary {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
        border: none;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(30, 58, 138, 0.3);
    }

    /* Card title hover effect */
    .card-title a {
        transition: color 0.3s ease;
        display: inline-block;
    }

    .card-title a:hover {
        color: var(--primary-blue) !important;
    }

    /* Stats section */
    .stats-item {
        padding: 1rem;
        background: var(--light-blue);
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .stats-item:hover {
        background: var(--white);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    /* Responsive adjustments */
    @media (max-width: 1200px) {
        .category-card .card-body {
            padding: 1rem 0.75rem;
        }
    }

    @media (max-width: 992px) {
        .category-card {
            margin-bottom: 1.5rem;
        }

        .category-card .card-body p.small {
            font-size: 0.75rem;
        }
    }

    @media (max-width: 768px) {
        .hero-section h1 {
            font-size: 2rem;
        }

        .article-card {
            margin-bottom: 1.5rem;
        }

        .article-image {
            height: 180px;
        }

        .category-card {
            margin-bottom: 1.5rem;
        }

        .all-categories-section .row {
            --bs-gutter-y: 1rem;
        }
    }

    @media (max-width: 576px) {
        .article-image {
            height: 160px;
        }

        .category-card {
            margin-bottom: 1rem;
        }

        .category-card .card-body {
            padding: 0.75rem 0.5rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add animation to cards on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                }
            });
        }, observerOptions);

        // Observe all article and category cards
        document.querySelectorAll('.article-card, .category-card').forEach(el => {
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

        // Lazy loading for images
        const lazyImages = document.querySelectorAll('img');
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src || img.src;
                    imageObserver.unobserve(img);
                }
            });
        });

        lazyImages.forEach(img => {
            if (img.complete) return;
            imageObserver.observe(img);
        });

        // Add hover effect to category cards
        document.querySelectorAll('.category-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                const icon = this.querySelector('.fa-2x');
                if (icon) {
                    icon.style.transform = 'scale(1.2)';
                    icon.style.transition = 'transform 0.3s ease';
                }
            });

            card.addEventListener('mouseleave', function() {
                const icon = this.querySelector('.fa-2x');
                if (icon) {
                    icon.style.transform = 'scale(1)';
                }
            });
        });
    });
</script>
@endsection
