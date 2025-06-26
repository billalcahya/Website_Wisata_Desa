<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Paket | Sistem Manajemen Paket</title>
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

        .image-preview {
            max-width: 200px;
            max-height: 200px;
            margin-top: 10px;
            display: none;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="form-container">
            <div class="form-header">
                <h2 class="mb-0"><i class="bi bi-box-seam me-2"></i>Tambah Paket Baru</h2>
                <p class="text-muted">Isi formulir berikut untuk menambahkan paket baru</p>
            </div>

            <form action="{{ route('packages.store') }}" method="POST" enctype="multipart/form-data" id="packageForm">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-field">Jenis Paket</label>
                        <select name="type" class="form-select" required>
                            <option value="" selected disabled>-- Pilih Jenis Paket --</option>
                            <option value="wisata">Wisata</option>
                            <option value="makrab">Makrab</option>
                            <option value="study banding">Study Banding</option>
                        </select>
                        <div class="invalid-feedback">Silakan pilih jenis paket</div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label required-field">Judul Paket</label>
                        <input type="text" name="title" class="form-control"
                            placeholder="Contoh: Paket Wisata Bali 3D2N" required>
                        <div class="invalid-feedback">Judul paket harus diisi</div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label required-field">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="5" placeholder="Deskripsikan detail paket ini..."
                        required></textarea>
                    <div class="invalid-feedback">Deskripsi paket harus diisi</div>
                    <div class="form-text">Minimal 50 karakter</div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-field">Harga</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="price" class="form-control" placeholder="500000"
                                min="0" required>
                        </div>
                        <div class="invalid-feedback">Harga harus diisi dengan angka yang valid</div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Gambar Paket</label>
                        <input type="file" name="image" class="form-control" id="imageUpload" accept="image/*">
                        <div class="invalid-feedback">Format gambar tidak valid (hanya JPG, PNG, JPEG)</div>
                        <img id="imagePreview" class="image-preview img-thumbnail" alt="Preview Gambar">
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('packages.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Simpan Paket
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('imageUpload').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const preview = document.getElementById('imagePreview');
                    preview.src = event.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });

        (function() {
            'use strict';

            const form = document.getElementById('packageForm');

            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);

            const fileInput = document.getElementById('imageUpload');
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
