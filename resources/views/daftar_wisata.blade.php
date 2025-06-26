<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Wisata Desa Lerep</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
</head>

<body class="min-h-screen font-poppins bg-gray-50" x-data="{ isOpen: false }">
    <x-navbar></x-navbar>

    <main class="container mx-auto px-4 py-8">
        <div class="max-w-screen-2xl mx-auto px-4 md:px-8 py-8">
            <div class="mb-12 text-center">
                <h1 class="text-3xl md:text-4xl font-bold text-orange-500">Daftar Wisata</h1>
                <div class="w-20 h-1 bg-orange-500 mx-auto mt-4"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @forelse ($wisatas as $wisata)
                    <div class="bg-white rounded-lg shadow hover:shadow-md transition duration-300 flex flex-col">
                        <div class="h-48 w-full">
                            <img src="{{ asset('storage/' . $wisata->gambar) }}" alt="{{ $wisata->nama }}"
                                class="w-full h-full object-cover rounded-t-lg">
                        </div>
                        <div class="p-4 flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $wisata->nama }}</h3>
                                <p class="text-sm text-gray-600 line-clamp-2">
                                    {{ $wisata->deskripsi }}
                                </p>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('wisata.show', $wisata->id) }}"
                                    class="text-sm text-orange-500 hover:underline font-medium">
                                    Lihat Selengkapnya →
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500 col-span-full">Belum ada data wisata yang tersedia.</p>
                @endforelse
            </div>
        </div>
    </main>

    <x-footer></x-footer>
</body>

</html>
