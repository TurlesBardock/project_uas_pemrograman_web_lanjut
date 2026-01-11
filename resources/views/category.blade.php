@extends('layouts.layout2')
@section('title', $categoryName . ' - Bumigora News')

@section('content')
<div class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">{{ $categoryName }}</li>
        </ol>
    </nav>

    <!-- Category Header -->
    <div class="category-header text-center mb-5">
        <h1 class="display-5 fw-bold mb-3" style="color: var(--primary-blue);">
            {{ $categoryName }}
        </h1>
        <p class="lead text-muted">
            {{ $totalPosts }} artikel tersedia dalam kategori ini
        </p>
    </div>

    <!-- Articles Grid -->
    @if($posts->count() > 0)
    <div class="row g-4">
        @foreach($posts as $post)
        <div class="col-lg-4 col-md-6">
            <div class="card article-card h-100 border-0 shadow-sm">
                <!-- Article Image -->
                <div class="article-image position-relative overflow-hidden" style="height: 200px;">
                    <div class="category-badge position-absolute" style="top: 15px; left: 15px; z-index: 2;">
                        <span class="badge bg-primary">{{ $post->category }}</span>
                    </div>

                    @php
                        $categoryImages = [
                            'politik-hukum' => 'https://images.unsplash.com/photo-1551135049-8a33b2fb2f5c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                            'olahraga' => 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                            'ekonomi-bisnis' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                            'kesehatan' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                            'teknologi-inovasi' => 'https://images.unsplash.com/photo-1518709268805-4e9042af2176?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                            'pendidikan' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                            'hiburan' => 'https://images.unsplash.com/photo-1489599809516-9827b6d1cf13?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                            'budaya-pariwisata' => 'https://images.unsplash.com/photo-1523531294919-4bcd7c65e216?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                            'nasional' => 'https://images.unsplash.com/photo-1511895426328-dc8714191300?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                            'internasional' => 'https://images.unsplash.com/photo-1489944440615-453fc2b6a9a9?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                            'lingkungan-bencana' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'
                        ];
                        $imageUrl = $categoryImages[$post->category] ?? 'https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80';
                    @endphp

                    <img src="{{ $imageUrl }}"
                         alt="{{ $post->title }}"
                         class="img-fluid w-100 h-100 object-fit-cover">
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="text-muted small">
                            <i class="far fa-clock me-1"></i>
                            {{ $post->created_at->diffForHumans() }}
                        </span>
                    </div>

                    <h5 class="card-title mb-3" style="color: var(--gray-800);">
                        <a href="{{ route('post.show', $post->id) }}" class="text-decoration-none text-dark">
                            {{ \Illuminate\Support\Str::limit($post->title, 70) }}
                        </a>
                    </h5>

                    <p class="card-text text-muted mb-3" style="font-size: 0.9rem;">
                        {{ \Illuminate\Support\Str::limit($post->content, 100) }}
                    </p>

                    <div class="card-footer bg-transparent border-top-0 px-0 pb-0">
                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-book-reader me-1"></i> Baca Artikel
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
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

    @else
    <!-- Empty State -->
    <div class="text-center py-5 my-5">
        <div class="empty-icon mb-4">
            <i class="fas fa-newspaper fa-4x" style="color: var(--gray-300);"></i>
        </div>
        <h3 class="mb-3" style="color: var(--gray-700);">Belum Ada Artikel</h3>
        <p class="text-muted mb-4">
            Belum ada artikel dalam kategori "{{ $categoryName }}".
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

<style>
    .article-card {
        transition: all 0.3s ease;
    }

    .article-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .object-fit-cover {
        object-fit: cover;
    }
</style>
=======
@section('title', $category->title)

@section('content')
<h1>{{ $category->title }}</h1>

@foreach($posts as $post)
    <div>
        <h2>{{ $post->title }}</h2>

        @if($post->image)
            <img src="/storage/posts/{{ $post->image }}" width="300">
        @endif

        <p>{{ $post->content }}</p>

        <a href="/post/{{ $post->id }}">Read More</a>
        <hr>
    </div>
@endforeach

{{ $posts->links() }}
@endsection
