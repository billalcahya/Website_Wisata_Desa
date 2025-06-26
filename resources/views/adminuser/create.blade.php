<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User Baru | Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .form-container {
            max-width: 700px;
            margin: 0 auto;
        }

        .password-toggle {
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        .role-badge {
            transition: all 0.2s;
        }

        .role-badge:hover {
            transform: scale(1.05);
        }

        .role-badge.active {
            border: 2px solid #0d6efd;
            background-color: #e7f1ff;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="form-container">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div>
                    <h2 class="fw-bold text-primary">
                        <i class="fas fa-user-plus me-2"></i>Tambah User Baru
                    </h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('adminuser.index') }}">Manajemen User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Baru</li>
                        </ol>
                    </nav>
                </div>
                <a href="{{ route('adminuser.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <h5 class="alert-heading">
                        <i class="fas fa-exclamation-triangle me-2"></i>Gagal Menyimpan Data
                    </h5>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <form action="{{ route('adminuser.store') }}" method="POST" id="userForm">
                        @csrf

                        <h5 class="mb-4 text-primary">
                            <i class="fas fa-info-circle me-2"></i>Informasi Dasar
                        </h5>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nama Lengkap <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Email <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email') }}" placeholder="Masukkan alamat email" required>
                                </div>
                            </div>
                        </div>

                        <h5 class="mb-4 text-primary">
                            <i class="fas fa-lock me-2"></i>Keamanan Akun
                        </h5>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6 position-relative">
                                <label for="password" class="form-label">Password <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Buat password" required>
                                    <span class="password-toggle" onclick="togglePassword('password')">
                                        <i class="far fa-eye"></i>
                                    </span>
                                </div>
                                <div class="form-text">Minimal 8 karakter</div>
                            </div>

                            <div class="col-md-6 position-relative">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="Ulangi password" required>
                                    <span class="password-toggle" onclick="togglePassword('password_confirmation')">
                                        <i class="far fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-3 mt-4">
                            <button type="reset" class="btn btn-outline-secondary">
                                <i class="fas fa-undo me-1"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Simpan User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = field.nextElementSibling.querySelector('i');

            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        document.querySelectorAll('.role-badge').forEach(badge => {
            badge.addEventListener('click', function() {
                document.querySelectorAll('.role-badge').forEach(b => {
                    b.classList.remove('active');
                });

                this.classList.add('active');

                const radioId = this.getAttribute('for');
                document.getElementById(radioId).checked = true;
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
        });
    </script>
</body>

</html>
