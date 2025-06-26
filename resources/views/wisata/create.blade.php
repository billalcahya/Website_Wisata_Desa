<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Wisata | Sistem Manajemen Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        .form-container {
            max-width: 600px;
            margin: 3rem auto;
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

        /* Styling jadwal buka grid */
        .jadwal-buka-row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }

        .jadwal-buka-row span.hari {
            width: 80px;
            font-weight: 600;
        }

        .jadwal-buka-row input[type="time"] {
            max-width: 120px;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <h2 class="mb-0">
                    <i class="bi bi-geo-alt-fill me-2"></i>Tambah Wisata Baru
                </h2>
                <p class="text-muted">Isi formulir berikut untuk menambahkan data wisata baru</p>
            </div>

            <form action="{{ route('wisata.store') }}" method="POST" enctype="multipart/form-data" id="wisataForm"
                novalidate>
                @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label required-field">Nama Wisata</label>
                    <input type="text" name="nama" id="nama" class="form-control"
                        placeholder="Masukkan nama wisata" required />
                    <div class="invalid-feedback">Nama wisata harus diisi</div>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label required-field">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" placeholder="Deskripsikan wisata ini..."
                        required></textarea>
                    <div class="invalid-feedback">Deskripsi wisata harus diisi</div>
                    <div class="form-text">Minimal 50 karakter</div>
                </div>

                <div class="mb-3">
                    <label for="gambar" class="form-label required-field">Gambar Wisata Judul</label>
                    <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*"
                        required />
                    <div class="invalid-feedback">Format gambar tidak valid (hanya JPG, PNG, JPEG)</div>
                    <img id="imagePreview" class="image-preview img-thumbnail" alt="Preview Gambar Wisata" />
                    <label for="gambar">Upload Gambar Carousel</label>
                    <input type="file" name="gambarCarousel[]" id="gambarCarousel" multiple accept="image/*"
                        class="form-control" />
                    <div id="carouselPreview" class="d-flex flex-wrap mt-2"></div>

                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label required-field">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control"
                        value="{{ old('alamat', $wisata->alamat ?? '') }}" required />
                    <div class="invalid-feedback">Alamat harus diisi</div>
                </div>

                <fieldset class="mb-3">
                    <legend class="required-field mb-2">Jadwal Buka</legend>
                    @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                        <div class="jadwal-buka-row">
                            <span class="hari">{{ $hari }}</span>
                            <input type="time" name="jadwal_buka[{{ $hari }}][buka]"
                                value="{{ old("jadwal_buka.$hari.buka", $wisata->jadwal_buka[$hari]['buka'] ?? '') }}"
                                required />
                            <span>-</span>
                            <input type="time" name="jadwal_buka[{{ $hari }}][tutup]"
                                value="{{ old("jadwal_buka.$hari.tutup", $wisata->jadwal_buka[$hari]['tutup'] ?? '') }}"
                                required />
                        </div>
                    @endforeach
                    <div class="invalid-feedback d-block" id="jadwalBukaError" style="display:none;">
                        Semua jadwal buka harus diisi.
                    </div>
                </fieldset>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('wisata.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save me-1"></i> Simpan Wisata
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById('gambar').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('imagePreview');
            if (file) {
                const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                if (!validTypes.includes(file.type)) {
                    this.setCustomValidity('Format gambar tidak valid. Hanya JPG, PNG, JPEG yang diperbolehkan.');
                    preview.style.display = 'none';
                    preview.src = '';
                } else {
                    this.setCustomValidity('');
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        preview.src = event.target.result;
                        preview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            } else {
                preview.style.display = 'none';
                preview.src = '';
                this.setCustomValidity('');
            }
        });

        document.getElementById('gambarCarousel').addEventListener('change', function(e) {
            const previewContainer = document.getElementById('carouselPreview');
            previewContainer.innerHTML = '';
            Array.from(e.target.files).forEach(file => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const img = document.createElement('img');
                        img.src = event.target.result;
                        img.classList.add('image-preview', 'img-thumbnail', 'me-2');
                        img.style.maxWidth = '100px';
                        img.style.maxHeight = '100px';
                        previewContainer.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });


        (function() {
            'use strict';

            const form = document.getElementById('wisataForm');

            form.addEventListener('submit', function(event) {
                const deskripsi = form.querySelector('textarea[name="deskripsi"]');
                if (deskripsi.value.trim().length < 50) {
                    deskripsi.setCustomValidity('Deskripsi minimal 50 karakter.');
                } else {
                    deskripsi.setCustomValidity('');
                }

                let jadwalValid = true;
                const jadwalInputs = form.querySelectorAll('input[name^="jadwal_buka"]');
                jadwalInputs.forEach(input => {
                    if (!input.value) jadwalValid = false;
                });
                const jadwalError = document.getElementById('jadwalBukaError');
                if (!jadwalValid) {
                    jadwalError.style.display = 'block';
                } else {
                    jadwalError.style.display = 'none';
                }

                if (!form.checkValidity() || !jadwalValid) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
        })();
    </script>
</body>

</html>
