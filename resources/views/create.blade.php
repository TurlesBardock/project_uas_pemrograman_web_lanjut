@extends('layouts.layout2')

@section('title', 'Buat Artikel Baru - Bumigora News')

@section('content')
<div class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Buat Artikel</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header -->
            <div class="card border-0 shadow-sm mb-5">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-4">
                        <div class="icon-wrapper rounded-circle d-flex align-items-center justify-content-center me-3"
                             style="width: 60px; height: 60px; background-color: var(--primary-blue);">
                            <i class="fas fa-plus-circle fa-2x text-white"></i>
                        </div>
                        <div>
                            <h1 class="h2 fw-bold mb-2" style="color: var(--gray-800);">Buat Artikel Baru</h1>
                            <p class="text-muted mb-0">
                                Isi formulir di bawah ini untuk membuat artikel baru
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('post.store') }}" id="articleForm">
                        @csrf

                        <!-- Title -->
                        <div class="mb-4">
                            <label for="title" class="form-label fw-bold">
                                <i class="fas fa-heading me-2 text-primary"></i>
                                Judul Artikel <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   class="form-control form-control-lg @error('title') is-invalid @enderror"
                                   id="title"
                                   name="title"
                                   value="{{ old('title') }}"
                                   placeholder="Masukkan judul artikel yang menarik"
                                   required>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text text-muted">
                                Maksimal 200 karakter. Gunakan judul yang menarik dan deskriptif.
                            </div>
                        </div>

                        <!-- Slug (Auto-generated) -->
                        <div class="mb-4">
                            <label for="slug" class="form-label fw-bold">
                                <i class="fas fa-link me-2 text-primary"></i>
                                Slug URL <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">/article/</span>
                                <input type="text"
                                       class="form-control @error('slug') is-invalid @enderror"
                                       id="slug"
                                       name="slug"
                                       value="{{ old('slug') }}"
                                       placeholder="judul-artikel-seo-friendly"
                                       required>
                            </div>
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text text-muted">
                                URL ramah SEO. Akan digenerate otomatis dari judul.
                            </div>
                        </div>

                        <!-- Category -->
                       <div class="mb-4">
    <label class="form-label fw-bold">
        <i class="fas fa-folder me-2 text-primary"></i>
        Kategori <span class="text-danger">*</span>
    </label>

    <select name="category_id"
            class="form-select @error('category_id') is-invalid @enderror"
            required>

        <option value="">Pilih Kategori</option>

        @foreach($categories as $cat)
            <option value="{{ $cat->id }}"
                {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                {{ $cat->title }}
            </option>
        @endforeach
    </select>

    @error('category_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


                        <!-- Content -->
                        <div class="mb-4">
                            <label for="content" class="form-label fw-bold">
                                <i class="fas fa-edit me-2 text-primary"></i>
                                Konten Artikel <span class="text-danger">*</span>
                            </label>
                            <div class="editor-toolbar mb-2 border rounded-top p-2 bg-light">
                                <div class="btn-group me-2" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="formatText('bold')">
                                        <i class="fas fa-bold"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="formatText('italic')">
                                        <i class="fas fa-italic"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="formatText('underline')">
                                        <i class="fas fa-underline"></i>
                                    </button>
                                </div>
                                <div class="btn-group me-2" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="formatText('insertUnorderedList')">
                                        <i class="fas fa-list-ul"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="formatText('insertOrderedList')">
                                        <i class="fas fa-list-ol"></i>
                                    </button>
                                </div>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="insertLink()">
                                        <i class="fas fa-link"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="insertImage()">
                                        <i class="fas fa-image"></i>
                                    </button>
                                </div>
                            </div>
                            <textarea class="form-control @error('content') is-invalid @enderror"
                                      id="content"
                                      name="content"
                                      rows="15"
                                      placeholder="Tulis konten artikel Anda di sini..."
                                      required>{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text text-muted">
                                Gunakan toolbar untuk memformat teks. Minimum 300 karakter.
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="fas fa-eye me-2 text-primary"></i>
                                Status Publikasi
                            </label>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check card border p-3 h-100">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="status"
                                               id="status_draft"
                                               value="draft"
                                               {{ old('status', 'draft') == 'draft' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_draft">
                                            <strong>Draft</strong>
                                            <p class="text-muted small mb-0">Simpan sebagai draft</p>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check card border p-3 h-100">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="status"
                                               id="status_published"
                                               value="published"
                                               {{ old('status') == 'published' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_published">
                                            <strong>Publikasikan</strong>
                                            <p class="text-muted small mb-0">Publikasikan sekarang</p>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check card border p-3 h-100">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="status"
                                               id="status_scheduled"
                                               value="scheduled"
                                               {{ old('status') == 'scheduled' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_scheduled">
                                            <strong>Jadwalkan</strong>
                                            <p class="text-muted small mb-0">Atur jadwal publikasi</p>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Publish Date (conditional) -->
                        <div class="mb-4" id="scheduleField" style="display: none;">
                            <label for="published_at" class="form-label fw-bold">
                                <i class="fas fa-calendar-alt me-2 text-primary"></i>
                                Jadwalkan Publikasi
                            </label>
                            <input type="datetime-local"
                                   class="form-control"
                                   id="published_at"
                                   name="published_at"
                                   value="{{ old('published_at', \Carbon\Carbon::now()->addDay()->format('Y-m-d\TH:i')) }}">
                        </div>

                        <!-- Featured Image -->
                        <div class="mb-5">
                            <label class="form-label fw-bold">
                                <i class="fas fa-image me-2 text-primary"></i>
                                Gambar Utama
                            </label>
                            <div class="border rounded p-4 text-center bg-light">
                                <div class="image-preview mb-3" id="imagePreview">
                                    <i class="fas fa-image fa-4x text-muted mb-3"></i>
                                    <p class="text-muted">Belum ada gambar yang dipilih</p>
                                </div>
                                <input type="file"
                                       class="form-control"
                                       id="featured_image"
                                       name="featured_image"
                                       accept="image/*"
                                       onchange="previewImage(this)">
                                <div class="form-text text-muted">
                                    Ukuran rekomendasi: 1200x600px. Format: JPG, PNG, GIF. Maks: 2MB.
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between align-items-center pt-4 border-top">
                            <div>
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Kembali
                                </a>
                            </div>
                            <div class="btn-group">
                                <button type="submit" name="action" value="save_draft" class="btn btn-outline-primary">
                                    <i class="fas fa-save me-2"></i>Simpan Draft
                                </button>
                                <button type="submit" name="action" value="publish" class="btn btn-primary">
                                    <i class="fas fa-paper-plane me-2"></i>Publikasikan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Character Counter -->
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-body p-3">
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5 class="fw-bold mb-1" id="titleCounter">0/200</h5>
                            <p class="text-muted small mb-0">Karakter Judul</p>
                        </div>
                        <div class="col-md-4">
                            <h5 class="fw-bold mb-1" id="contentCounter">0</h5>
                            <p class="text-muted small mb-0">Karakter Konten</p>
                        </div>
                        <div class="col-md-4">
                            <h5 class="fw-bold mb-1" id="wordCounter">0</h5>
                            <p class="text-muted small mb-0">Kata</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
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

    .editor-toolbar {
        background-color: var(--light-blue);
    }

    .image-preview {
        min-height: 150px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .image-preview img {
        max-width: 100%;
        max-height: 200px;
        object-fit: contain;
    }

    .form-check .card {
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .form-check .card:hover {
        border-color: var(--primary-blue);
        background-color: var(--light-blue);
    }

    .form-check-input:checked ~ .card {
        border-color: var(--primary-blue) !important;
        background-color: rgba(26, 95, 122, 0.05) !important;
    }

    textarea {
        resize: vertical;
        min-height: 300px;
    }

    @media (max-width: 768px) {
        .btn-group {
            flex-wrap: wrap;
            margin-bottom: 0.5rem;
        }

        .btn-group .btn {
            margin-bottom: 0.25rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-generate slug from title
        const titleInput = document.getElementById('title');
        const slugInput = document.getElementById('slug');

        titleInput.addEventListener('input', function() {
            const title = this.value;
            const slug = title
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim();

            if (!slugInput.value || slugInput.value === slugInput.defaultValue) {
                slugInput.value = slug;
            }

            updateTitleCounter();
        });

        // Show/hide schedule field based on status
        const statusRadios = document.querySelectorAll('input[name="status"]');
        const scheduleField = document.getElementById('scheduleField');

        statusRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === 'scheduled') {
                    scheduleField.style.display = 'block';
                } else {
                    scheduleField.style.display = 'none';
                }
            });
        });

        // Initialize status radio state
        const scheduledRadio = document.getElementById('status_scheduled');
        if (scheduledRadio && scheduledRadio.checked) {
            scheduleField.style.display = 'block';
        }

        // Character counters
        const contentInput = document.getElementById('content');
        const titleCounter = document.getElementById('titleCounter');
        const contentCounter = document.getElementById('contentCounter');
        const wordCounter = document.getElementById('wordCounter');

        function updateTitleCounter() {
            const count = titleInput.value.length;
            titleCounter.textContent = `${count}/200`;
            titleCounter.className = `fw-bold mb-1 ${count > 200 ? 'text-danger' : count > 150 ? 'text-warning' : 'text-success'}`;
        }

        function updateContentCounters() {
            const content = contentInput.value;
            const charCount = content.length;
            const wordCount = content.trim().split(/\s+/).filter(word => word.length > 0).length;

            contentCounter.textContent = charCount;
            contentCounter.className = `fw-bold mb-1 ${charCount < 300 ? 'text-danger' : charCount < 500 ? 'text-warning' : 'text-success'}`;

            wordCounter.textContent = wordCount;
            wordCounter.className = `fw-bold mb-1 ${wordCount < 50 ? 'text-danger' : wordCount < 100 ? 'text-warning' : 'text-success'}`;
        }

        titleInput.addEventListener('input', updateTitleCounter);
        contentInput.addEventListener('input', updateContentCounters);

        // Initialize counters
        updateTitleCounter();
        updateContentCounters();

        // Form validation
        document.getElementById('articleForm').addEventListener('submit', function(e) {
            const title = titleInput.value.trim();
            const content = contentInput.value.trim();

            if (!title || title.length > 200) {
                e.preventDefault();
                alert('Judul harus diisi dan maksimal 200 karakter');
                return;
            }

            if (!content || content.length < 300) {
                e.preventDefault();
                alert('Konten harus diisi dan minimal 300 karakter');
                return;
            }
        });
    });

    // Text formatting functions
    function formatText(command) {
        document.getElementById('content').focus();
        document.execCommand(command, false, null);
    }

    function insertLink() {
        const url = prompt('Masukkan URL:', 'https://');
        if (url) {
            document.execCommand('createLink', false, url);
        }
    }

    function insertImage() {
        const url = prompt('Masukkan URL gambar:', 'https://');
        if (url) {
            document.execCommand('insertImage', false, url);
        }
    }

    // Image preview
    function previewImage(input) {
        const preview = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.innerHTML = `<img src="${e.target.result}" class="img-fluid rounded" alt="Preview">`;
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Set default publish date to tomorrow
    const now = new Date();
    now.setDate(now.getDate() + 1);
    const publishDateInput = document.getElementById('published_at');
    if (publishDateInput && !publishDateInput.value) {
        const formattedDate = now.toISOString().slice(0, 16);
        publishDateInput.value = formattedDate;
        publishDateInput.min = new Date().toISOString().slice(0, 16);
    }
</script>
@endsection
