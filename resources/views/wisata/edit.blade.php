<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Wisata | Sistem Manajemen Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" />
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
                <h2 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Edit Wisata</h2>
                <p class="text-muted">Perbarui informasi wisata di bawah ini</p>
            </div>

            <form action="{{ route('wisata.update', $wisata) }}" method="POST" enctype="multipart/form-data" id="editWisataForm" novalidate>
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label required-field" for="nama">Nama Wisata</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', $wisata->nama) }}" required>
                    <div class="invalid-feedback">Nama wisata harus diisi.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label required-field" for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="5" class="form-control" required>{{ old('deskripsi', $wisata->deskripsi) }}</textarea>
                    <div class="invalid-feedback">Deskripsi harus diisi.</div>
                    <div class="form-text">Minimal 50 karakter</div>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat', $wisata->alamat ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Jadwal Buka</label>
                    @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="me-3" style="width: 70px;">{{ $hari }}</span>
                            <input type="time" name="jadwal_buka[{{ $hari }}][buka]" class="form-control form-control-sm" style="max-width: 120px;" value="{{ old("jadwal_buka.$hari.buka", $wisata->jadwal_buka[$hari]['buka'] ?? '') }}">
                            <span class="mx-2">-</span>
                            <input type="time" name="jadwal_buka[{{ $hari }}][tutup]" class="form-control form-control-sm" style="max-width: 120px;" value="{{ old("jadwal_buka.$hari.tutup", $wisata->jadwal_buka[$hari]['tutup'] ?? '') }}">
                        </div>
                    @endforeach
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Wisata</label>
                    <input type="file" name="gambar" id="newImageUpload" accept="image/*" class="form-control" />
                    <div class="invalid-feedback">Format gambar tidak valid (hanya JPG, PNG, JPEG).</div>
                    <img id="newImagePreview" class="new-image-preview" alt="Preview Gambar Baru" />

                    @if ($wisata->gambar)
                        <div class="image-preview-container">
                            <p class="mb-2">Gambar saat ini:</p>
                            <img src="{{ asset('storage/' . $wisata->gambar) }}" class="current-image" alt="Gambar Wisata Saat Ini" />
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="remove_image" id="removeImage" value="1" />
                                <label class="form-check-label" for="removeImage">Hapus gambar saat ini</label>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">Carousel Gambar Wisata</label>

                    @if ($wisata->images->count())
                        <div class="d-flex flex-wrap gap-3 mb-3">
                            @foreach ($wisata->images as $image)
                                <div style="position: relative; width: 150px;">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Carousel Image" class="img-thumbnail" />
                                    <div class="form-check mt-1">
                                        <input class="form-check-input" type="checkbox" name="hapusGambarCarousel[]" value="{{ $image->id }}" id="remove_image_{{ $image->id }}">
                                        <label class="form-check-label" for="remove_image_{{ $image->id }}">Hapus</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>Belum ada gambar carousel.</p>
                    @endif

                    <input type="file" name="gambarCarousel[]" accept="image/*" multiple class="form-control" />
                    <div class="form-text">Tambahkan gambar carousel baru (boleh lebih dari satu)</div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('wisata.index') }}" class="btn btn-outline-secondary">
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

            <!-- FORM DELETE -->
            {{-- <form action="{{ route('wisata.destroy', $wisata) }}" method="POST" class="mt-3" onsubmit="return confirm('Yakin ingin menghapus wisata ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash me-1"></i> Hapus Wisata
                </button>
            </form> --}}
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
                };
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
    </script>
</body>

</html>
