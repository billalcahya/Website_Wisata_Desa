<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin - Paket</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite('resources/css/app.css')
</head>

<body>
    <x-sidebar></x-sidebar>

    <div class="p-4 sm:ml-64">
        <div class="flex-1 p-4 md:p-8">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Daftar Paket</h1>
                        <p class="text-gray-600 mt-1">Kelola semua paket yang tersedia</p>
                    </div>
                    <a href="{{ route('wisata.create') }}"
                        class="flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                        <i class="fas fa-plus"></i>
                        <span>Tambah Paket</span>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($wisatas as $wisata)
                        <div
                            class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 hover:shadow-md transition-shadow">
                            @if ($wisata->gambar)
                                <div class="h-48 overflow-hidden">
                                    <img src="{{ asset('storage/' . $wisata->gambar) }}"
                                        class="w-full h-full object-cover" alt="{{ $wisata->title }}">
                                </div>
                            @else
                                <div class="h-48 bg-gray-100 flex items-center justify-center">
                                    <i class="fas fa-image text-gray-300 text-4xl"></i>
                                </div>
                            @endif

                            <div class="p-5">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $wisata->nama }}</h3>
                                </div>

                                <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $wisata->deskripsi }}</p>

                                <div class="flex items-center justify-between mb-4">
                                    <span class="text-sm text-gray-500">
                                        <i class="far fa-clock mr-1"></i>
                                        {{ $wisata->created_at ? $wisata->created_at->translatedFormat('d M Y H:i') : 'N/A' }}
                                    </span>
                                </div>

                                <div class="flex space-x-2">
                                    <a href="{{ route('wisata.edit', $wisata) }}"
                                        class="flex-1 inline-flex justify-center items-center gap-2 text-sm py-2 px-3 rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50">
                                        <i class="fas fa-pencil-alt"></i>
                                        <span>Edit</span>
                                    </a>
                                    <form action="{{ route('wisata.destroy', $wisata) }}" method="POST" class="flex-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin hapus paket ini?')"
                                            class="w-full inline-flex justify-center items-center gap-2 text-sm py-2 px-3 rounded-lg border border-red-100 bg-red-50 text-red-600 hover:bg-red-100">
                                            <i class="fas fa-trash"></i>
                                            <span>Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
</body>
</html>
