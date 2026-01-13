@extends('layouts.layout2')

@section('title', $post->title . ' - Bumigora News')

@section('content')
<div class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
        <a href="{{ route('category.show', $post->category->slug) }}">
        {{ $post->category->name ?? '-' }}

    </a>
</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <!-- Article Header -->
            <div class="article-header mb-4">
                <span class="badge bg-primary mb-3">
    {{ $post->category->title ?? '-' }}
    </span>
                <h1 class="display-5 fw-bold mb-3" style="color: var(--gray-800);">{{ $post->title }}</h1>

                <div class="article-meta d-flex align-items-center mb-4">
                    <div class="d-flex align-items-center me-4">
                        <i class="far fa-clock me-2 text-muted"></i>
                        <span class="text-muted">{{ $post->created_at->format('d F Y, H:i') }}</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="far fa-eye me-2 text-muted"></i>
                        <span class="text-muted">1.5k views</span>
                    </div>
                </div>
            </div>

            <!-- Article Image -->
           @php
                $categoryImages = [
                    'politik-hukum' => 'https://images.unsplash.com/photo-1551135049-8a33b2fb2f5c?auto=format&fit=crop&w=1200&q=80',
                    'olahraga' => 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?auto=format&fit=crop&w=1200&q=80',
                    'ekonomi-bisnis' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&w=1200&q=80',
                    'kesehatan' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1f?auto=format&fit=crop&w=1200&q=80',
                    'teknologi-inovasi' => 'https://images.unsplash.com/photo-1518709268805-4e9042af2176?auto=format&fit=crop&w=1200&q=80',
                    'pendidikan' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=1200&q=80',
                    'hiburan' => 'https://images.unsplash.com/photo-1489599809516-9827b6d1cf13?auto=format&fit=crop&w=1200&q=80',
                    'budaya-pariwisata' => 'https://images.unsplash.com/photo-1523531294919-4bcd7c65e216?auto=format&fit=crop&w=1200&q=80',
                    'nasional' => 'https://images.unsplash.com/photo-1511895426328-dc8714191300?auto=format&fit=crop&w=1200&q=80',
                    'internasional' => 'https://images.unsplash.com/photo-1489944440615-453fc2b6a9a9?auto=format&fit=crop&w=1200&q=80',
                    'lingkungan-bencana' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=1200&q=80',
                ];

                // ambil slug kategori dengan aman
                $slug = $post->category?->slug;

                // ambil gambar berdasarkan slug
                $imageUrl = $categoryImages[$slug] 
                    ?? 'https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?auto=format&fit=crop&w=1200&q=80';
                @endphp


                <div class="article-image mb-5">

                @php
                    $localImage = $post->image
                        ? public_path('storage/posts/' . $post->image)
                        : null;
                @endphp

                @if($post->image)
                    <img src="{{ asset('storage/posts/'.$post->image) }}"
                        alt="{{ $post->title }}"
                        class="img-fluid rounded-3 shadow-sm w-100"
                        style="max-height: 400px; object-fit: cover;">
                @else
                    <img src="{{ $imageUrl }}"
                        alt="{{ $post->title }}"
                        class="img-fluid rounded-3 shadow-sm w-100"
                        style="max-height: 400px; object-fit: cover;">
                @endif

                <p class="text-muted text-center mt-2" style="font-size: 0.875rem;">
                    Ilustrasi gambar untuk artikel "{{ $post->title }}"
                </p>
                </div>

            <!-- Article Content -->
            <div class="article-content mb-5">
                <div class="content-text" style="font-size: 1.1rem; line-height: 1.8; color: var(--gray-700);">
                    {!! nl2br(e($post->content)) !!}
                </div>
            </div>

            <!-- Article Footer -->
            <div class="article-footer border-top pt-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="tags">
                        <span class="text-muted me-2">Tags:</span>
                        @foreach(explode('-', $post->category->slug) as $tag)
                            <span class="badge bg-light text-dark me-1">{{ $tag }}</span>
                        @endforeach
                        <span class="badge bg-light text-dark me-1">berita</span>
                        <span class="badge bg-light text-dark me-1">terkini</span>
                    </div>

                    <!-- Admin Actions -->
                    @auth
                    <div class="admin-actions">
                        <a href="{{ route('post.edit', $post->slug) }}"
                           class="btn btn-outline-primary btn-sm me-2">
                            <i class="fas fa-edit me-1"></i> Edit
                        </a>
                        <form action="{{ route('post.destroy', $post->slug) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-trash me-1"></i> Hapus
                            </button>
                        </form>
                    </div>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Related Articles -->
            <div class="sidebar-section mb-5">
                <h5 class="fw-bold mb-4" style="color: var(--gray-800); border-left: 4px solid var(--primary-blue); padding-left: 15px;">
                    Artikel Terkait
                </h5>

                @php
                $relatedPosts = \App\Models\Post::whereHas('category', function ($q) use ($post) {
                        $q->where('id', $post->category_id);
                    })
                    ->where('id', '!=', $post->id)
                    ->where('status', 'published')
                    ->latest()
                    ->take(3)
                    ->get();
                @endphp 

                @if($relatedPosts->count() > 0)
                <div class="list-group">
                    @foreach($relatedPosts as $related)
                    <a href="{{ route('post.show', $related->slug) }}"
                        class="list-group-item list-group-item-action border-0 shadow-sm mb-2">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="rounded-2 bg-primary bg-opacity-10 d-flex align-items-center justify-content-center"
                                     style="width: 60px; height: 60px;">
                                    <i class="fas fa-newspaper text-primary"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1" style="font-size: 0.95rem;">{{ Str::limit($related->title, 50) }}</h6>
                                <small class="text-muted">{{ $related->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                @else
                <div class="alert alert-light border">
                    <p class="mb-0 text-muted">Belum ada artikel terkait lainnya.</p>
                </div>
                @endif
            </div>

            <!-- Category List -->
            <div class="sidebar-section mb-5">
                <h5 class="fw-bold mb-4" style="color: var(--gray-800); border-left: 4px solid var(--primary-blue); padding-left: 15px;">
                    Kategori
                </h5>

                <div class="list-group">
                    @foreach([
                        'politik-hukum' => 'Politik & Hukum',
                        'olahraga' => 'Olahraga',
                        'ekonomi-bisnis' => 'Ekonomi & Bisnis',
                        'kesehatan' => 'Kesehatan',
                        'teknologi-inovasi' => 'Teknologi',
                        'pendidikan' => 'Pendidikan'
                    ] as $slug => $name)
                    <a href="{{ url('/category/' . $slug) }}"
                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-center border-0">
                        {{ $name }}
                        <span class="badge bg-primary rounded-pill">
                        {{ \App\Models\Post::whereHas('category', function ($q) use ($slug) {
                            $q->where('slug', $slug);
                        })->where('status', 'published')->count() }}
                     </span>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom Styles for Show Page */
    .article-header h1 {
        line-height: 1.3;
    }

    .article-meta {
        font-size: 0.95rem;
    }

    .content-text {
        text-align: justify;
    }

    .content-text p {
        margin-bottom: 1.5rem;
    }

    .sidebar-section {
        background: var(--light-blue);
        padding: 1.5rem;
        border-radius: 10px;
        border: 1px solid var(--gray-200);
    }

    .list-group-item {
        transition: all 0.3s ease;
        margin-bottom: 0.5rem;
        border-radius: 8px !important;
    }

    .list-group-item:hover {
        transform: translateX(5px);
        background-color: white;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .tags .badge {
        font-size: 0.8rem;
        padding: 0.4rem 0.8rem;
        margin-bottom: 0.3rem;
    }

    .admin-actions .btn {
        padding: 0.4rem 0.8rem;
        font-size: 0.875rem;
    }

    .breadcrumb {
        background-color: transparent;
        padding: 0;
        margin-bottom: 1.5rem;
    }

    .breadcrumb-item a {
        text-decoration: none;
        color: var(--primary-blue);
    }

    .breadcrumb-item.active {
        color: var(--gray-600);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .article-header h1 {
            font-size: 1.8rem;
        }

        .article-image img {
            max-height: 250px;
        }

        .content-text {
            font-size: 1rem;
        }

        .sidebar-section {
            margin-top: 2rem;
        }
    }

    @media (max-width: 576px) {
        .article-header h1 {
            font-size: 1.5rem;
        }

        .article-meta {
            flex-direction: column;
            align-items: flex-start;
        }

        .article-meta > div {
            margin-bottom: 0.5rem;
        }

        .article-footer {
            flex-direction: column;
            align-items: flex-start;
        }

        .article-footer .admin-actions {
            margin-top: 1rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add smooth scroll for anchor links in content
        document.querySelectorAll('.content-text a').forEach(link => {
            link.addEventListener('click', function(e) {
                if (this.getAttribute('href').startsWith('#')) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 100,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });

        // Lazy loading for images
        const images = document.querySelectorAll('img');
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src || img.src;
                    imageObserver.unobserve(img);
                }
            });
        });

        images.forEach(img => {
            if (img.complete) return;
            imageObserver.observe(img);
        });
    });
</script>
@endsection
