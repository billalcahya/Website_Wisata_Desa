<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Paket | Sistem Manajemen Paket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .form-header {
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }

        .required-field::after {
            content: " *";
            color: red;
        }

        .image-preview-container {
            margin-top: 15px;
        }

        .current-image {
            max-width: 200px;
            max-height: 200px;
            border-radius: 5px;
            border: 1px solid #dee2e6;
            padding: 5px;
        }

        .new-image-preview {
            max-width: 200px;
            max-height: 200px;
            margin-top: 10px;
            display: none;
            border-radius: 5px;
            border: 1px solid #dee2e6;
            padding: 5px;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="form-container">
            <div class="form-header">
                <h2 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Edit Paket</h2>
                <p class="text-muted">Perbarui informasi paket di bawah ini</p>
            </div>

            <form action="{{ route('packages.update', $package) }}" method="POST" enctype="multipart/form-data"
                id="editPackageForm">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-field">Jenis Paket</label>
                        <select name="type" class="form-select" required>
                            <option value="wisata" {{ $package->type == 'wisata' ? 'selected' : '' }}>Wisata</option>
                            <option value="makrab" {{ $package->type == 'makrab' ? 'selected' : '' }}>Makrab</option>
                            <option value="study banding" {{ $package->type == 'study banding' ? 'selected' : '' }}>
                                Study Banding</option>
                        </select>
                        <div class="invalid-feedback">Silakan pilih jenis paket</div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label required-field">Judul Paket</label>
                        <input type="text" name="title" class="form-control"
                            value="{{ old('title', $package->title) }}" placeholder="Contoh: Paket Wisata Bali 3D2N"
                            required>
                        <div class="invalid-feedback">Judul paket harus diisi</div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label required-field">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="5" placeholder="Deskripsikan detail paket ini..."
                        required>{{ old('description', $package->description) }}</textarea>
                    <div class="invalid-feedback">Deskripsi paket harus diisi</div>
                    <div class="form-text">Minimal 50 karakter</div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-field">Harga</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="price" class="form-control"
                                value="{{ old('price', $package->price) }}" placeholder="500000" min="0"
                                required>
                        </div>
                        <div class="invalid-feedback">Harga harus diisi dengan angka yang valid</div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Gambar Paket</label>
                        <input type="file" name="image" class="form-control" id="newImageUpload" accept="image/*">
                        <div class="invalid-feedback">Format gambar tidak valid (hanya JPG, PNG, JPEG)</div>
                        <img id="newImagePreview" class="new-image-preview" alt="Preview Gambar Baru">

                        @if ($package->image)
                            <div class="image-preview-container">
                                <p class="mb-2">Gambar saat ini:</p>
                                <img src="{{ asset('storage/' . $package->image) }}" class="current-image"
                                    alt="Gambar Paket Saat Ini">
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="remove_image"
                                        id="removeImage">
                                    <label class="form-check-label" for="removeImage">
                                        Hapus gambar saat ini
                                    </label>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('packages.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                    <div>
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="bi bi-check-circle me-1"></i> Simpan Perubahan
                        </button>
                        <button type="reset" class="btn btn-outline-danger">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('newImageUpload').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const preview = document.getElementById('newImagePreview');
                    preview.src = event.target.result;
                    preview.style.display = 'block';

                    const removeCheckbox = document.getElementById('removeImage');
                    if (removeCheckbox) {
                        removeCheckbox.checked = false;
                    }
                }
                reader.readAsDataURL(file);
            }
        });

        const removeCheckbox = document.getElementById('removeImage');
        if (removeCheckbox) {
            removeCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    document.getElementById('newImageUpload').value = '';
                    document.getElementById('newImagePreview').style.display = 'none';
                }
            });
        }

        (function() {
            'use strict';

            const form = document.getElementById('editPackageForm');

            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);

            const fileInput = document.getElementById('newImageUpload');
            fileInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                    if (!validTypes.includes(file.type)) {
                        this.setCustomValidity(
                            'Format gambar tidak valid. Hanya JPG, PNG, JPEG yang diperbolehkan.');
                    } else {
                        this.setCustomValidity('');
                    }
                }
            });
        })();
    </script>
</body>

</html>
