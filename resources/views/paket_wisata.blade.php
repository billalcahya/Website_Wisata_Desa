<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paket Wisata Desa Lerep</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
</head>

<body class="min-h-screen font-poppins bg-gray-50" x-data="{ isOpen: false }">
    <x-navbar></x-navbar>

    <main class="container mx-auto px-4 py-8">

        <div class="mb-12 text-center mt-10">
            <h1 class="text-3xl md:text-4xl font-bold text-orange-500">Paket Wisata</h1>
            <div class="w-20 h-1 bg-orange-500 mx-auto mt-4"></div>
        </div>
        <div class="max-w-screen-2xl mx-auto space-y-10 px-4 md:px-8">
            @forelse ($wisataPackages as $package)
                @include('components.package-card', ['package' => $package])
            @empty
                <p class="text-center text-gray-500 text-lg">Belum ada paket wisata yang tersedia.</p>
            @endforelse
        </div>

        <div class="mb-12 text-center mt-20">
            <h1 class="text-3xl md:text-4xl font-bold text-orange-500">Paket Makrab</h1>
            <div class="w-20 h-1 bg-orange-500 mx-auto mt-4"></div>
        </div>
        <div class="max-w-screen-2xl mx-auto space-y-10 px-4 md:px-8">
            @forelse ($makrabPackages as $package)
                @include('components.package-card', ['package' => $package])
            @empty
                <p class="text-center text-gray-500 text-lg">Belum ada paket makrab yang tersedia.</p>
            @endforelse
        </div>

        <div class="mb-12 text-center mt-20">
            <h1 class="text-3xl md:text-4xl font-bold text-orange-500">Paket Study Branding</h1>
            <div class="w-20 h-1 bg-orange-500 mx-auto mt-4"></div>
        </div>
        <div class="max-w-screen-2xl mx-auto space-y-10 px-4 md:px-8">
            @forelse ($studyBandingPackages as $package)
                @include('components.package-card', ['package' => $package])
            @empty
                <p class="text-center text-gray-500 text-lg">Belum ada paket study branding yang tersedia.</p>
            @endforelse
        </div>

        <div class="max-w-4xl mx-auto text-center py-10">
            <h2 class="text-3xl md:text-4xl font-bold text-emerald-900 mb-10">Pemesanan dan Informasi Lain</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white shadow-md rounded-xl p-6 border border-gray-200">
                    <h3 class="text-orange-500 font-semibold text-lg mb-4">Paket Wisata & Makrab</h3>
                    <img class="w-24 mx-auto mb-4" src="{{ asset('img/icon/customer-service-1.png') }}"
                        alt="logo-desa-lerep" />
                    <div class="flex items-center justify-center text-gray-700 text-lg">
                        <i class="fas fa-phone-alt text-orange-500 mr-2"></i>
                        <a href="https://wa.me/6289655491853?text={{ urlencode('Halo, saya ingin tanya tentang Paket Wisata & Makrab') }}"
                            target="_blank" class="hover:underline">
                            0896 5549 1853
                        </a>
                    </div>
                </div>

                <div class="bg-white shadow-md rounded-xl p-6 border border-gray-200">
                    <h3 class="text-orange-500 font-semibold text-lg mb-4">Paket Study Banding</h3>
                    <img class="w-24 mx-auto mb-4" src="{{ asset('img/icon/customer-service-agent-1.png') }}"
                        alt="logo-desa-lerep" />
                    <div class="text-gray-700 text-lg space-y-2">
                        <div class="flex items-center justify-center">
                            <i class="fas fa-phone-alt text-orange-500 mr-2"></i>
                            <a href="https://wa.me/6285643545218?text={{ urlencode('Halo, saya ingin tanya tentang Paket Study Banding') }}"
                                target="_blank" class="hover:underline">
                                0856 4354 5218
                            </a>
                        </div>
                        <div class="flex items-center justify-center">
                            <i class="fas fa-phone-alt text-orange-500 mr-2"></i>
                            <a href="https://wa.me/6285713366266?text={{ urlencode('Halo, saya ingin tanya tentang Paket Study Banding') }}"
                                target="_blank" class="hover:underline">
                                0857 1336 6266
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main>

    <x-footer></x-footer>
</body>

</html>
