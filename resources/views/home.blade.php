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
@if($postsByCategory->count() > 0)

    @foreach($categories as $category)

        @php
            $posts = $postsByCategory[$category->id] ?? collect();
        @endphp

        @if($posts->count() > 0)
            <div class="mb-5">
                <h4 class="mb-3 text-primary">{{ $category->title }}</h4>

                <div class="row g-4">
                    @foreach($posts as $post)
                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm">

                                <img
                                    src="{{ $post->image 
                                        ? asset('storage/posts/'.$post->image)
                                        : 'https://source.unsplash.com/600x400/?'.$category->slug }}"
                                    class="card-img-top"
                                    style="height:200px; object-fit:cover">

                                <div class="card-body">
                                    <small class="text-muted">
                                        {{ $post->created_at->diffForHumans() }}
                                    </small>

                                    <h6 class="mt-2">
                                        <a href="{{ route('post.show',$post->slug) }}">
                                            {{ Str::limit($post->title,60) }}
                                        </a>
                                    </h6>

                                    <p class="text-muted">
                                        {{ Str::limit($post->content,100) }}
                                    </p>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    @endforeach

@else
    <div class="text-center py-5 my-5">
        <i class="fas fa-newspaper fa-3x mb-3 text-muted"></i>
        <h4>Belum ada artikel</h4>
        <p class="text-muted">Admin belum mempublikasikan artikel.</p>
    </div>
@endif
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
