<!doctype html>
<html class="h-full bg-gray-white">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @vite('resources/css/app.css')
    <title>Wisata Desa Lerep</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/home.css">
</head>

<body class="h-full font-poppins" x-data="{ isOpen: false }">
    <div class="min-h-full">
        <x-navbar></x-navbar>
        <main>
            <div class="mx-auto max-w-screen-2xl px-4 py-6 sm:px-6 lg:px-8 fade-up">
                <div class="max-w-screen-2xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="md:col-span-1 mt-4 mb-4 space-y-4 p-2">
                        @if (isset($image4))
                            <img src="{{ asset('storage/' . $image4->filename) }}" alt="Gambar ID {{ $image4->id }}"
                                class="w-full h-auto rounded-lg mt-6">
                        @endif
                        <video class="w-full h-auto rounded-lg shadow-md " autoplay loop playsinline muted>
                            <source src="video/desalerep.mp4" type="video/mp4" />
                            Browser kamu tidak mendukung pemutaran video.
                        </video>
                        <p class="text-center text-lg font-semibold text-gray-700 mt-4">
                            - Desa Lerep Ungaran Barat - </p>
                    </div>
                    <div class="md:col-span-2 bg-white rounded-lg">
                        @if (isset($image3))
                            <img src="{{ asset('storage/' . $image3->filename) }}" alt="Gambar ID {{ $image3->id }}" class="w-full h-auto rounded-lg">
                        @endif
                    </div>
                </div>
            </div>
            <div class="mx-auto max-w-screen-xl px-4 py-6 sm:px-6 lg:px-8 fade-up">
                <section class="bg-white py-12 px-4 sm:px-6 lg:px-8 rounded-xl">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                        <div>
                            <h2 class="text-3xl font-bold text-orange-500 mb-2">About us</h2>
                            <h1 class="text-3xl md:text-6xl font-bold text-gray-800 mb-4">
                                Desa <span class="text-[#37726C]">Wisata</span> Lerep
                            </h1>
                            <p class="text-lg text-gray-600 leading-relaxed">
                                Terletak di lereng Gunung Ungaran, Desa Wisata Lerep di Kecamatan Ungaran Barat,
                                Kabupaten Semarang, Jawa Tengah, menawarkan perpaduan harmonis antara keindahan alam,
                                kekayaan budaya, dan kearifan lokal.
                            </p>
                        </div>
                        <div>
                            <div>
                                @if (isset($image1))
                                    <img src="{{ asset('storage/' . $image1->filename) }}"
                                        alt="Gambar ID {{ $image1->id }}">
                                @endif
                            </div>

                        </div>
                    </div>
                </section>
            </div>
            <div class="py-16 bg-gradient-to-br from-[#f0fdf4] to-[#d9f2e6] fade-up">
                <div class="max-w-screen-lg mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
                    <div class="flex flex-col items-center feature-card p-6 rounded-xl bg-white shadow-md fade-left">
                        <img src="img/leaves.png" alt="Eksplorasi Alam" class="w-20 h-20 mb-6 hover-zoom">
                        <h3 class="text-2xl font-bold mb-2 text-[#37726C]">Eksplorasi Alam Lerep</h3>
                        <p class="text-base text-gray-700">Nikmati udara sejuk dan panorama indah di kaki Gunung
                            Ungaran.</p>
                    </div>
                    <div class="flex flex-col items-center feature-card p-6 rounded-xl bg-white shadow-md fade-up">
                        <img src="img/teamwork.png" alt="Kaya Tradisi & Budaya" class="w-20 h-20 mb-6 hover-zoom">
                        <h3 class="text-2xl font-bold mb-2 text-[#37726C]">Kaya Tradisi & Budaya</h3>
                        <p class="text-base text-gray-700">Ikuti tradisi khas seperti Sedekah Bumi dan Festival Kadeso.
                        </p>
                    </div>
                    <div class="flex flex-col items-center feature-card p-6 rounded-xl bg-white shadow-md fade-right">
                        <img src="img/groups.png" alt="Aktivitas Edukatif" class="w-20 h-20 mb-6 hover-zoom">
                        <h3 class="text-2xl font-bold mb-2 text-[#37726C]">Aktivitas Edukatif</h3>
                        <p class="text-base text-gray-700">Nikmati berbagai aktivitas khas pedesaan yang menyenangkan.
                        </p>
                    </div>
                </div>
            </div>
            <div class="mx-auto max-w-screen-2xl px-4 py-6 sm:px-6 lg:px-8 fade-up">
                <div class="p-6 md:p-10 flex flex-col md:flex-row items-start gap-8">
                    <div class="flex-shrink-0">
                        @if (isset($image2))
                            <img src="{{ asset('storage/' . $image2->filename) }}" alt="Gambar ID {{ $image2->id }}">
                        @endif
                    </div>
                    <div class="flex-1">
                        <p class="text-3xl text-orange-500 font-bold mb-4 mt-8">Rekomendasi Wisata</p>
                        <h2 class="text-6xl font-bold text-gray-900 mb-10">Embung Sebligo</h2>
                        <div class="flex items-start gap-3 mb-10">
                            <img src="img/location.png" alt="Lokasi" class="w-15 h-15 mt-1 text-green-600">
                            <div>
                                <p class="text-2xl font-semibold text-gray-800">Lokasi</p>
                                <p class="text-lg text-gray-700 leading-relaxed">
                                    Embung Sebligo terletak di Dusun Indrakila, Desa Lerep, Kecamatan Ungaran Barat,
                                    Kabupaten Semarang.
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 mb-6">
                            <img src="img/information.png" alt="Informasi" class="w-15 h-15 mt-1 text-green-600">
                            <div>
                                <p class="text-2xl font-semibold text-gray-800">Informasi</p>
                                <p class="text-lg text-gray-600 leading-relaxed">
                                    Embung Sebligo merupakan waduk buatan yang kini menjadi destinasi wisata alam.
                                    Pengunjung dapat menikmati udara sejuk, naik perahu, memancing, hingga mencicipi
                                    kuliner tradisional.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-10 mb-20 fade-up">
                <a href="/profil_lengkap_desa"
                    class="inline-flex items-center justify-center w-[300px] px-8 py-4 text-lg font-semibold text-white rounded-md transition-all duration-300 bg-[#37726C] hover:bg-[#2c5f56] shadow-lg hover:shadow-xl hover:scale-105">
                    Lihat Detail
                    <svg class="ml-3 w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </main>
    </div>
    <x-footer></x-footer>
    <script src="js/home.js"></script>
</body>
</html>
