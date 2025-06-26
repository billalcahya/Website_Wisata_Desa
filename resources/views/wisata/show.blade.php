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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body class="min-h-screen font-poppins bg-gray-50" x-data="{ isOpen: false }">
    <x-navbar></x-navbar>
    <main class="container mx-auto px-6 py-16">
        <div class="max-w-screen-xl mx-auto">
            <div class="flex items-center justify-between mb-10">
                <h1 class="text-5xl font-bold text-cyan-600 ">
                    {{ $wisata->nama }}
                </h1>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <div class="lg:col-span-2 relative">
                    <div class="swiper rounded-2xl h-[500px]">
                        <div class="swiper-wrapper">
                            @foreach ($wisata->images as $image)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/' . $image->image_path) }}"
                                        class="w-full h-[500px] object-cover rounded-2xl"
                                        alt="Gambar tambahan wisata {{ $wisata->nama }}" />
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next text-white"></div>
                        <div class="swiper-button-prev text-white"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="flex flex-col gap-6">
                    @foreach ($wisata->images->slice(1, 2) as $image)
                        <div class="h-[250px] rounded-2xl overflow-hidden shadow-lg">
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Gambar tambahan"
                                class="w-full h-full object-cover">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <div class="lg:col-span-2 bg-white rounded-2xl shadow-xl p-4">
                    <div class="w-full">
                        <h2 class="text-3xl font-semibold text-orange-500 mb-5">Tentang</h2>
                        <p class="text-xl text-gray-700 leading-relaxed tracking-wide break-words">
                            {{ $wisata->deskripsi }}
                        </p>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-xl p-8 w-full h-80">
                    <h3 class="text-2xl font-bold text-gray-800 mb-5">Informasi</h3>
                    @php
                        use Carbon\Carbon;
                        $hariIni = Carbon::now()->locale('id')->translatedFormat('l');
                        $jamSekarang = Carbon::now();
                        $jadwalHariIni = $wisata->jadwal_buka[$hariIni] ?? null;
                        $buka = false;

                        if ($jadwalHariIni && !empty($jadwalHariIni['buka']) && !empty($jadwalHariIni['tutup'])) {
                            try {
                                $jamBuka = Carbon::createFromFormat('H:i', $jadwalHariIni['buka']);
                                $jamTutup = Carbon::createFromFormat('H:i', $jadwalHariIni['tutup']);
                                $buka = $jamSekarang->between($jamBuka, $jamTutup);
                            } catch (\Exception $e) {
                                $buka = false;
                            }
                        }
                    @endphp
                    <p class="text-lg {{ $buka ? 'text-green-600' : 'text-red-600' }} font-semibold mb-3">
                        {{ $buka ? 'Sekarang Buka' : 'Saat ini Tutup' }}
                    </p>
                    <div class="text-lg text-gray-700 mb-6">
                        <span class="font-semibold">{{ $hariIni }}</span> &nbsp;
                        {{ $jadwalHariIni['buka'] ?? '--:--' }} – {{ $jadwalHariIni['tutup'] ?? '--:--' }}
                    </div>
                    <div class="flex items-start text-lg text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 mt-1 text-gray-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 12l4.243-4.243m1.415 1.415L14.828 12l4.243 4.243m0 0l4.243-4.243M6 18H4a2 2 0 01-2-2V4a2 2 0 012-2h16a2 2 0 012 2v12a2 2 0 01-2 2h-2" />
                        </svg>
                        {{ $wisata->alamat }}
                    </div>
                </div>
            </div>
        </div>
    </main>
    <x-footer></x-footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new Swiper(".swiper", {
                loop: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        });
    </script>
</body>

</html>
