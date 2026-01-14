@extends('layouts.layout2')

@section('title', 'Tentang Kami - Bumigora News')

@section('content')
<div class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">Tentang Kami</li>
        </ol>
    </nav>

    <!-- Hero Section -->
    <div class="row align-items-center mb-5">
        <div class="col-lg-6">
            <h1 class="display-4 fw-bold mb-4" style="color: var(--primary-blue);">
                Tentang Bumigora News
            </h1>
            <p class="lead text-muted mb-4">
                Portal berita terpercaya yang menyajikan informasi aktual, akurat, dan relevan untuk masyarakat.
                Kami berkomitmen memberikan konten berkualitas dengan integritas jurnalistik yang tinggi.
            </p>
                    <p>
                        Alamat :  Jl. Ismail Marzuki No.22, Cilinaya, Kec. Cakranegara, Kota Mataram, Nusa Tenggara Bar. 83127
                        <br>
                        Nomor Telepon : (0370) 633466
                        <br>
                        Email : BumigoraNews@gmail.com
                        </p>
                    </p>
            <div class="d-flex gap-3">
                <div class="text-center">
                    <h2 class="fw-bold" style="color: var(--primary-blue);">50+</h2>
                    <p class="text-muted mb-0">Artikel Terbit</p>
                </div>
                <div class="text-center">
                    <h2 class="fw-bold" style="color: var(--primary-blue);">10+</h2>
                    <p class="text-muted mb-0">Kategori Berita</p>
                </div>
                <div class="text-center">
                    <h2 class="fw-bold" style="color: var(--primary-blue);">24/7</h2>
                    <p class="text-muted mb-0">Update Terkini</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <img src="https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                 alt="Tentang Bumigora News"
                 class="img-fluid rounded-3 shadow">
        </div>
    </div>

    <!-- Vision & Mission -->
    <div class="row mb-5">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <div class="card border-0 shadow-sm h-100" style="background-color: var(--light-blue);">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-4">
                        <div class="icon-wrapper rounded-circle d-flex align-items-center justify-content-center me-3"
                             style="width: 60px; height: 60px; background-color: var(--primary-blue);">
                            <i class="fas fa-eye fa-2x text-white"></i>
                        </div>
                        <h3 class="fw-bold mb-0" style="color: var(--gray-800);">Visi</h3>
                    </div>
                    <p class="mb-0" style="font-size: 1.1rem; color: var(--gray-700);">
                        Menjadi portal berita terdepan yang menghadirkan informasi berkualitas,
                        mendidik masyarakat, dan membangun kesadaran kritis terhadap perkembangan
                        terkini di berbagai bidang.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100" style="background-color: var(--light-blue);">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-4">
                        <div class="icon-wrapper rounded-circle d-flex align-items-center justify-content-center me-3"
                             style="width: 60px; height: 60px; background-color: var(--primary-blue);">
                            <i class="fas fa-bullseye fa-2x text-white"></i>
                        </div>
                        <h3 class="fw-bold mb-0" style="color: var(--gray-800);">Misi</h3>
                    </div>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2 d-flex align-items-start">
                            <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
                            <span style="color: var(--gray-700);">Menyajikan berita akurat dan terverifikasi</span>
                        </li>
                        <li class="mb-2 d-flex align-items-start">
                            <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
                            <span style="color: var(--gray-700);">Mengedukasi masyarakat melalui konten informatif</span>
                        </li>
                        <li class="mb-2 d-flex align-items-start">
                            <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
                            <span style="color: var(--gray-700);">Mendorong partisipasi aktif dalam diskusi publik</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
                            <span style="color: var(--gray-700);">Menjunjung tinggi etika jurnalistik</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Values -->
    <div class="mb-5">
        <h2 class="fw-bold mb-4 text-center" style="color: var(--primary-blue);">Nilai-Nilai Kami</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <div class="icon-wrapper rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3"
                         style="width: 80px; height: 80px; background-color: var(--light-blue);">
                        <i class="fas fa-shield-alt fa-3x text-primary"></i>
                    </div>
                    <h4 class="fw-bold mb-3" style="color: var(--gray-800);">Integritas</h4>
                    <p class="text-muted mb-0">
                        Selalu menyajikan informasi yang jujur, transparan, dan dapat dipertanggungjawabkan.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <div class="icon-wrapper rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3"
                         style="width: 80px; height: 80px; background-color: var(--light-blue);">
                        <i class="fas fa-balance-scale fa-3x text-primary"></i>
                    </div>
                    <h4 class="fw-bold mb-3" style="color: var(--gray-800);">Netralitas</h4>
                    <p class="text-muted mb-0">
                        Menjaga objektivitas dan tidak memihak dalam pemberitaan berbagai isu.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <div class="icon-wrapper rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3"
                         style="width: 80px; height: 80px; background-color: var(--light-blue);">
                        <i class="fas fa-users fa-3x text-primary"></i>
                    </div>
                    <h4 class="fw-bold mb-3" style="color: var(--gray-800);">Komunitas</h4>
                    <p class="text-muted mb-0">
                        Membangun dan melayani komunitas pembaca dengan konten yang relevan.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Team (5 Orang) -->
    <div class="mb-5">
        <h2 class="fw-bold mb-4 text-center" style="color: var(--primary-blue);">Tim Kami</h2>
        <div class="row g-4 justify-content-center">
            <!-- Anggota 1 -->
            <div class="col-md-4 col-lg-3">
                <div class="card border-0 shadow-sm text-center p-4 h-100">
                    <div class="position-relative mb-3">
                        <img src="{{ asset('storage/about/Pasha.jpeg') }}"
                             alt="Editor in Chief"
                             class="rounded-circle mx-auto"
                             style="width: 120px; height: 120px; object-fit: cover;">
                        <div class="position-absolute bottom-0 end-0 bg-primary rounded-circle p-2" style="width: 40px; height: 40px;">
                            <i class="fas fa-crown text-white"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-1" style="color: var(--gray-800);">Putu Gunadhi Pasha</h4>
                    <p class="text-primary mb-3">Editor in Chief</p>
                    <p class="text-muted mb-0" style="font-size: 0.9rem;">
                        Bertanggung jawab atas kualitas konten dan arah editorial dengan pengalaman 10+ tahun.
                    </p>
                    <div class="mt-3">
                        <a href="#" class="text-primary me-2"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-primary me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-primary"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>

            <!-- Anggota 2 -->
            <div class="col-md-4 col-lg-3">
                <div class="card border-0 shadow-sm text-center p-4 h-100">
                    <div class="position-relative mb-3">
                        <img src="{{ asset('storage/about/Alvin.jpeg') }}"
                             alt="Senior Journalist"
                             class="rounded-circle mx-auto"
                             style="width: 120px; height: 120px; object-fit: cover;">
                        <div class="position-absolute bottom-0 end-0 bg-success rounded-circle p-2" style="width: 40px; height: 40px;">
                            <i class="fas fa-pen text-white"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-1" style="color: var(--gray-800);">M.Alvin Al Barri</h4>
                    <p class="text-primary mb-3">Senior Journalist</p>
                    <p class="text-muted mb-0" style="font-size: 0.9rem;">
                        Spesialis di bidang politik, hukum, dan isu sosial dengan fokus pada investigative reporting.
                    </p>
                    <div class="mt-3">
                        <a href="#" class="text-primary me-2"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-primary me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-primary"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>

            <!-- Anggota 3 -->
            <div class="col-md-4 col-lg-3">
                <div class="card border-0 shadow-sm text-center p-4 h-100">
                    <div class="position-relative mb-3">
                        <img src="{{ asset('storage/about/Alif.jpeg') }}"
                             alt="Tech Editor"
                             class="rounded-circle mx-auto"
                             style="width: 120px; height: 120px; object-fit: cover;">
                        <div class="position-absolute bottom-0 end-0 bg-info rounded-circle p-2" style="width: 40px; height: 40px;">
                            <i class="fas fa-laptop-code text-white"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-1" style="color: var(--gray-800);">Alif Fattah haq</h4>
                    <p class="text-primary mb-3">Tech Editor</p>
                    <p class="text-muted mb-0" style="font-size: 0.9rem;">
                        Mengelola konten teknologi, startup, dan inovasi terkini dengan latar belakang engineering.
                    </p>
                    <div class="mt-3">
                        <a href="#" class="text-primary me-2"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-primary me-2"><i class="fab fa-github"></i></a>
                        <a href="#" class="text-primary"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>

            <!-- Anggota 4 (Baru) -->
            <div class="col-md-4 col-lg-3">
                <div class="card border-0 shadow-sm text-center p-4 h-100">
                    <div class="position-relative mb-3">
                        <img src="{{ asset('storage/about/Rian.jpeg') }}"
                             alt="Multimedia Producer"
                             class="rounded-circle mx-auto"
                             style="width: 120px; height: 120px; object-fit: cover;">
                        <div class="position-absolute bottom-0 end-0 bg-warning rounded-circle p-2" style="width: 40px; height: 40px;">
                            <i class="fas fa-video text-white"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-1" style="color: var(--gray-800);">Rian Alfian</h4>
                    <p class="text-primary mb-3">Multimedia Producer</p>
                    <p class="text-muted mb-0" style="font-size: 0.9rem;">
                        Ahli dalam produksi video, podcast, dan konten multimedia untuk platform digital.
                    </p>
                    <div class="mt-3">
                        <a href="#" class="text-primary me-2"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-primary me-2"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="text-primary"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>

            <!-- Anggota 5 (Baru) -->
            <div class="col-md-4 col-lg-3">
                <div class="card border-0 shadow-sm text-center p-4 h-100">
                    <div class="position-relative mb-3">
                        <img src="{{ asset('storage/about/Syafii.jpg') }}"
                             alt="Data Analyst"
                             class="rounded-circle mx-auto"
                             style="width: 120px; height: 120px; object-fit: cover;">
                        <div class="position-absolute bottom-0 end-0 bg-warning rounded-circle p-2" style="width: 40px; height: 40px;">
                            <i class="fas fa-chart-line text-white"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-1" style="color: var(--gray-800);">Syafi'i Maulana</h4>
                    <p class="text-primary mb-3">Data Analyst</p>
                    <p class="text-muted mb-0" style="font-size: 0.9rem;">
                        Menganalisis data pembaca dan tren konten untuk optimasi strategi editorial.
                    </p>
                    <div class="mt-3">
                        <a href="#" class="text-primary me-2"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-primary me-2"><i class="fab fa-medium"></i></a>
                        <a href="#" class="text-primary"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Info -->       
</div>

<style>
    .icon-wrapper {
        transition: transform 0.3s ease;
    }

    .card:hover .icon-wrapper {
        transform: scale(1.1);
    }

    .card:hover {
        transform: translateY(-5px);
        transition: transform 0.3s ease;
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

    .team-member-img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border: 3px solid var(--light-blue);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .role-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .display-4 {
            font-size: 2rem;
        }

        .lead {
            font-size: 1rem;
        }

        .team-member-card {
            margin-bottom: 1.5rem;
        }
    }

    /* Responsive untuk 5 kolom */
    @media (min-width: 992px) {
        .col-lg-3 {
            width: 20%;
        }
    }

    /* Animasi untuk card tim */
    .team-member-card {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s ease forwards;
    }

    .team-member-card:nth-child(1) { animation-delay: 0.1s; }
    .team-member-card:nth-child(2) { animation-delay: 0.2s; }
    .team-member-card:nth-child(3) { animation-delay: 0.3s; }
    .team-member-card:nth-child(4) { animation-delay: 0.4s; }
    .team-member-card:nth-child(5) { animation-delay: 0.5s; }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<script>
    // Tambahkan interaksi hover untuk card tim
    document.addEventListener('DOMContentLoaded', function() {
        const teamCards = document.querySelectorAll('.team-member-card');

        teamCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.15)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.boxShadow = '0 4px 6px rgba(0, 0, 0, 0.1)';
            });
        });
    });
</script>
@endsection
