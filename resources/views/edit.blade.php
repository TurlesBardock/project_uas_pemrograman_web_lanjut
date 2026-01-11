@extends('layouts.layout2')

@section('title', 'Edit Artikel - Bumigora News')

@section('content')
<div class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('post.show', $post->id) }}">Artikel</a></li>
            <li class="breadcrumb-item active">Edit</li>
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
                            <i class="fas fa-edit fa-2x text-white"></i>
                        </div>
                        <div>
                            <h1 class="h2 fw-bold mb-2" style="color: var(--gray-800);">Edit Artikel</h1>
                            <p class="text-muted mb-0">
                                Terakhir diubah: {{ $post->updated_at->format('d F Y, H:i') }}
                            </p>
                        </div>
                        <div class="ms-auto">
                            <span class="badge bg-{{ $post->status == 'published' ? 'success' : 'warning' }}">
                                {{ $post->status == 'published' ? 'Dipublikasikan' : 'Draft' }}
                            </span>
                        </div>
                    </div>

                    <!-- Article Info -->
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-eye text-muted me-2"></i>
                                <small class="text-muted">Dibaca: 1.5k kali</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-calendar text-muted me-2"></i>
                                <small class="text-muted">Dibuat: {{ $post->created_at->format('d F Y') }}</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-user text-muted me-2"></i>
                                <small class="text-muted">Oleh: Admin</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="alert alert-info border-0 shadow-sm mb-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-info-circle me-3 fa-lg"></i>
                    <div>
                        <h6 class="mb-1">Tips Editing:</h6>
                        <p class="mb-0 small">Pastikan artikel sudah dicek ulang sebelum dipublikasikan.
                        Gunakan preview untuk melihat hasil sebelum menyimpan.</p>
                    </div>
                    <div class="ms-auto">
                        <a href="{{ route('post.show', $post->id) }}"
                           target="_blank"
                           class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-external-link-alt me-1"></i>Preview
                        </a>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('post.update', $post->id) }}" id="editForm">
                        @csrf
                        @method('PUT')

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
                                   value="{{ old('title', $post->title) }}"
                                   placeholder="Masukkan judul artikel yang menarik"
                                   required>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Slug -->
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
                                       value="{{ old('slug', $post->slug) }}"
                                       required>
                                <button type="button"
                                        class="btn btn-outline-secondary"
                                        onclick="generateSlug()">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                            </div>
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text text-muted">
                                URL saat ini: <code>{{ url('/article/' . $post->slug) }}</code>
                            </div>
                        </div>

                        <!-- Category -->
                        <div class="mb-4">
                            <label for="category" class="form-label fw-bold">
                                <i class="fas fa-folder me-2 text-primary"></i>
                                Kategori <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('category') is-invalid @enderror"
                                    id="category"
                                    name="category"
                                    required>
                                <option value="">Pilih Kategori</option>
                                <option value="politik-hukum" {{ old('category', $post->category) == 'politik-hukum' ? 'selected' : '' }}>Politik & Hukum</option>
                                <option value="olahraga" {{ old('category', $post->category) == 'olahraga' ? 'selected' : '' }}>Olahraga</option>
                                <option value="ekonomi-bisnis" {{ old('category', $post->category) == 'ekonomi-bisnis' ? 'selected' : '' }}>Ekonomi & Bisnis</option>
                                <option value="kesehatan" {{ old('category', $post->category) == 'kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                                <option value="teknologi-inovasi" {{ old('category', $post->category) == 'teknologi-inovasi' ? 'selected' : '' }}>Teknologi & Inovasi</option>
                                <option value="pendidikan" {{ old('category', $post->category) == 'pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                                <option value="hiburan" {{ old('category', $post->category) == 'hiburan' ? 'selected' : '' }}>Hiburan</option>
                                <option value="budaya-pariwisata" {{ old('category', $post->category) == 'budaya-pariwisata' ? 'selected' : '' }}>Budaya & Pariwisata</option>
                                <option value="nasional" {{ old('category', $post->category) == 'nasional' ? 'selected' : '' }}>Nasional</option>
                                <option value="internasional" {{ old('category', $post->category) == 'internasional' ? 'selected' : '' }}>Internasional</option>
                                <option value="lingkungan-bencana" {{ old('category', $post->category) == 'lingkungan-bencana' ? 'selected' : '' }}>Lingkungan & Bencana</option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
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
                                      required>{{ old('content', $post->content) }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="fas fa-eye me-2 text-primary"></i>
                                Status Publikasi
                            </label>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check card border p-3 h-100">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="status"
                                               id="status_draft"
                                               value="draft"
                                               {{ old('status', $post->status) == 'draft' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_draft">
                                            <strong>Draft</strong>
                                            <p class="text-muted small mb-0">Simpan sebagai draft</p>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check card border p-3 h-100">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="status"
                                               id="status_published"
                                               value="published"
                                               {{ old('status', $post->status) == 'published' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_published">
                                            <strong>Publikasikan</strong>
                                            <p class="text-muted small mb-0">Publikasikan sekarang</p>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check card border p-3 h-100">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="status"
                                               id="status_archived"
                                               value="archived"
                                               {{ old('status', $post->status) == 'archived' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_archived">
                                            <strong>Arsip</strong>
                                            <p class="text-muted small mb-0">Pindahkan ke arsip</p>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check card border p-3 h-100">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="status"
                                               id="status_scheduled"
                                               value="scheduled"
                                               {{ old('status', $post->status) == 'scheduled' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_scheduled">
                                            <strong>Jadwalkan</strong>
                                            <p class="text-muted small mb-0">Atur jadwal publikasi</p>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Publish Date -->
                        <div class="mb-5" id="scheduleField" style="{{ old('status', $post->status) == 'scheduled' ? '' : 'display: none;' }}">
                            <label for="published_at" class="form-label fw-bold">
                                <i class="fas fa-calendar-alt me-2 text-primary"></i>
                                Tanggal Publikasi
                            </label>
                            <input type="datetime-local"
                                   class="form-control"
                                   id="published_at"
                                   name="published_at"
                                   value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}">
                        </div>

                        <!-- Revision History -->
                        <div class="mb-4">
                            <div class="card border">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">
                                        <i class="fas fa-history me-2"></i>Riwayat Perubahan
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="timeline">
                                        <div class="timeline-item">
                                            <div class="timeline-marker bg-success"></div>
                                            <div class="timeline-content">
                                                <h6 class="mb-1">Dibuat</h6>
                                                <p class="text-muted small mb-0">{{ $post->created_at->format('d F Y, H:i') }}</p>
                                            </div>
                                        </div>
                                        @if($post->updated_at != $post->created_at)
                                        <div class="timeline-item">
                                            <div class="timeline-marker bg-primary"></div>
                                            <div class="timeline-content">
                                                <h6 class="mb-1">Terakhir diubah</h6>
                                                <p class="text-muted small mb-0">{{ $post->updated_at->format('d F Y, H:i') }}</p>
                                            </div>
                                        </div>
                                        @endif
                                        @if($post->published_at)
                                        <div class="timeline-item">
                                            <div class="timeline-marker bg-info"></div>
                                            <div class="timeline-content">
                                                <h6 class="mb-1">Dipublikasikan</h6>
                                                <p class="text-muted small mb-0">{{ $post->published_at->format('d F Y, H:i') }}</p>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between align-items-center pt-4 border-top">
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Batal
                                </a>
                                <button type="button"
                                        class="btn btn-outline-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal">
                                    <i class="fas fa-trash me-2"></i>Hapus
                                </button>
                            </div>
                            <div class="btn-group">
                                <button type="submit" name="action" value="save_draft" class="btn btn-outline-primary">
                                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                                </button>
                                <button type="submit" name="action" value="publish" class="btn btn-primary">
                                    <i class="fas fa-check-circle me-2"></i>Simpan & Publikasikan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">
                    <i class="fas fa-exclamation-triangle me-2"></i>Konfirmasi Hapus
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus artikel ini?</p>
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <strong>Peringatan:</strong> Tindakan ini tidak dapat dibatalkan.
                    Semua data artikel akan dihapus secara permanen.
                </div>
                <p class="mb-0">
                    <strong>Judul:</strong> {{ $post->title }}
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Batal
                </button>
                <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i>Ya, Hapus
                    </button>
                </form>
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

    .timeline {
        position: relative;
        padding-left: 30px;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 20px;
    }

    .timeline-marker {
        position: absolute;
        left: -30px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: var(--gray-400);
    }

    .timeline-content {
        padding-left: 10px;
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
        }

        .btn-group .btn {
            margin-bottom: 0.25rem;
        }

        .modal-footer {
            flex-direction: column;
        }

        .modal-footer .btn {
            width: 100%;
            margin-bottom: 0.5rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Generate slug from title
        const titleInput = document.getElementById('title');
        const slugInput = document.getElementById('slug');

        function generateSlugFromTitle() {
            const title = titleInput.value;
            const slug = title
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim();
            return slug;
        }

        window.generateSlug = function() {
            slugInput.value = generateSlugFromTitle();
        };

        // Auto-update slug when title changes (only if slug hasn't been manually edited)
        let slugManuallyEdited = false;

        titleInput.addEventListener('input', function() {
            if (!slugManuallyEdited) {
                slugInput.value = generateSlugFromTitle();
            }
        });

        slugInput.addEventListener('input', function() {
            slugManuallyEdited = true;
        });

        // Show/hide schedule field
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

        // Character counters
        const contentInput = document.getElementById('content');
        const charCount = contentInput.value.length;
        const wordCount = contentInput.value.trim().split(/\s+/).filter(word => word.length > 0).length;

        // Show initial stats
        console.log(`Karakter: ${charCount}, Kata: ${wordCount}`);

        // Form validation
        document.getElementById('editForm').addEventListener('submit', function(e) {
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

            // Confirm if changing from published to draft
            const currentStatus = "{{ $post->status }}";
            const newStatus = document.querySelector('input[name="status"]:checked').value;

            if (currentStatus === 'published' && newStatus === 'draft') {
                if (!confirm('Artikel saat ini dipublikasikan. Ubah ke draft akan menghapus artikel dari publikasi. Lanjutkan?')) {
                    e.preventDefault();
                }
            }
        });

        // Auto-save draft (optional feature)
        let autoSaveTimeout;
        contentInput.addEventListener('input', function() {
            clearTimeout(autoSaveTimeout);
            autoSaveTimeout = setTimeout(function() {
                console.log('Auto-save triggered...');
                // Implement auto-save API call here
            }, 5000); // Save after 5 seconds of inactivity
        });

        // Set min date for schedule field
        const publishDateInput = document.getElementById('published_at');
        if (publishDateInput) {
            const now = new Date();
            publishDateInput.min = now.toISOString().slice(0, 16);

            if (!publishDateInput.value) {
                now.setDate(now.getDate() + 1);
                publishDateInput.value = now.toISOString().slice(0, 16);
            }
        }
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
</script>
@endsection
