<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil Lengkap Desa</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
</head>

<body class="h-full font-poppins" x-data="{ isOpen: false }"">
    <x-navbar></x-navbar>
    <div class="bg-white py-8 px- mt-20">
        <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row items-start md:items-center gap-8">
            <div class="md:w-1/2">
                <h2 class="text-4xl md:text-5xl font-bold text-green-900 mb-6">
                    Profile Desa Lerep
                </h2>
                <p class="text-lg md:text-xl text-gray-700 leading-relaxed text-justify">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam lacus tellus, malesuada vitae metus
                    sit amet, gravida lobortis diam. Pellentesque scelerisque tempus dapibus. Suspendisse porttitor ante
                    et tincidunt elementum. Nullam vel neque neque. Maecenas non diam consectetur, tempus risus a,
                    ultrices lacus. Sed posuere porttitor est, non pellentesque ligula convallis in. Fusce urna nisi,
                    tincidunt sit amet egestas sed, aliquam id massa. Duis tristique pharetra nulla, a condimentum
                    ligula finibus eget.
                </p>
            </div>
            <div class="md:w-1/2 flex justify-end">
                @if (isset($image5))
                    <img src="{{ asset('storage/' . $image5->filename) }}" alt="Gambar ID {{ $image5->id }}"
                        class="w-50 h-50 rounded shadow-md">
                @endif
            </div>
        </div>
    </div>
    <div class="bg-white py-10 px-4 mt-20">
        <div class="max-w-screen-xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-orange-600 mb-8">Sejarah Desa Lerep</h2>
            <div class="flex flex-col md:flex-row gap-8 text-justify text-gray-700 text-lg md:text-xl leading-relaxed">
                <div class="md:w-1/2">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam lacus tellus, malesuada vitae
                        metus sit amet, gravida lobortis diam. Pellentesque scelerisque tempus dapibus. Suspendisse
                        porttitor ante et tincidunt elementum. Nullam vel neque neque. Maecenas non diam consectetur,
                        tempus risus a, ultrices lacus. Sed posuere porttitor est, non pellentesque ligula convallis in.
                        Fusce urna nisi, tincidunt sit amet egestas sed, aliquam id massa. Duis tristique pharetra
                        nulla, a condimentum ligula finibus eget. In a lacus ut metus pretium pharetra. Nullam id sem
                        non ante viverra aliquet in vel nisi. Proin non mauris eleifend dui porttitor finibus a in
                        dolor. Nulla enim ante, elementum quis est sed, tempus dapibus urna.rh
                    </p>
                </div>
                <div class="md:w-1/2">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam lacus tellus, malesuada vitae
                        metus sit amet, gravida lobortis diam. Pellentesque scelerisque tempus dapibus. Suspendisse
                        porttitor ante et tincidunt elementum. Nullam vel neque neque. Maecenas non diam consectetur,
                        tempus risus a, ultrices lacus. Sed posuere porttitor est, non pellentesque ligula convallis in.
                        Fusce urna nisi, tincidunt sit amet egestas sed, aliquam id massa. Duis tristique pharetra
                        nulla, a condimentum ligula finibus eget. In a lacus ut metus pretium pharetra. Nullam id sem
                        non ante viverra aliquet in vel nisi. Proin non mauris eleifend dui porttitor finibus a in
                        dolor. Nulla enim ante, elementum quis est sed, tempus dapibus urna.rh
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white py-10 px-4 mt-10">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-4xl md:text-6xl font-bold text-green-800 mb-10">Visi Desa Lerep</h2>
            <p class="text-gray-700 mt-2 mb-10 text-lg md:text-xl leading-relaxed">
                Dengan semangat kegotongroyongan mewujudkan masyarakat desa Lerep yang bertaqwa, aman, tentram,
                sejahtera, bermartabat dan guyub rukun santosa.
            </p>

            <h2 class="text-4xl md:text-6xl font-bold text-green-800 mb-10 mt-20">Misi Desa Lerep</h2>
            <div
                class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left text-gray-700 text-lg md:text-lg leading-relaxed mt-10 mb-16 px-4">
                <div class="flex gap-3">
                    <span class="text-orange-500 font-bold text-3xl">01</span>
                    <p>Peningkatan tata kelola pemerintahan desa menuju pelayanan prima / smart service, transparansi
                        anggaran serta melayani dengan sepenuh hati</p>
                </div>

                <div class="flex gap-3">
                    <span class="text-orange-500 font-bold text-3xl">02</span>
                    <p>Pemerintahan lebih terbuka, transparan, merujuk mengacu kepada ideologi serta semangat bernegara
                        kepada Tuhan Yang Maha Esa sesuai dengan amanat konstitusi dan UUD NRI 1945</p>
                </div>

                <div class="flex gap-3">
                    <span class="text-orange-500 font-bold text-3xl">03</span>
                    <p>Optimalisasi potensi dusun dalam membina potensi dan kekuatan masyarakat desa</p>
                </div>

                <div class="flex gap-3">
                    <span class="text-orange-500 font-bold text-3xl">04</span>
                    <p>Optimalisasi pemberdayaan potensi sosial dan kesejahteraan masyarakat melalui BUMDes dan wisata
                        desa</p>
                </div>

                <div class="flex gap-3">
                    <span class="text-orange-500 font-bold text-3xl">05</span>
                    <p>Optimalisasi pembangunan partisipatif berbasis masyarakat bidang infrastruktur, ekonomi,
                        kesehatan, pendidikan, keagamaan, sarana dan lingkungan desa</p>
                </div>

                <div class="flex gap-3">
                    <span class="text-orange-500 font-bold text-3xl">06</span>
                    <p>Kemandirian upaya mewujudkan ketahanan, ketentraman umum dan perlindungan masyarakat</p>
                </div>

                <div class="flex gap-3">
                    <span class="text-orange-500 font-bold text-3xl">07</span>
                    <p>Optimalisasi upaya pelestarian lingkungan hidup untuk kelestarian alam dan desa wisata</p>
                </div>

                <div class="flex gap-3">
                    <span class="text-orange-500 font-bold text-3xl">08</span>
                    <p>Pelayanan, perlindungan dan pemberdayaan sosial masyarakat khususnya warga rentan, warga miskin,
                        lansia, yatim/piatu, disabilitas dan anak terlantar</p>
                </div>

                <div class="flex gap-3 justify-center md:col-span-2">
                    <span class="text-orange-500 font-bold text-3xl">09</span>
                    <p>Peningkatan kewaspadaan dini masyarakat desa yang tangguh dan tanggap bencana.</p>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md contact-card">
            <h3 class="font-medium text-gray-800 mb-4 text-center">Lokasi Kami</h3>

            <div class="flex justify-center">
                <div class="w-full max-w-xl aspect-[5/4] overflow-hidden rounded-lg mb-20">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d126685.81051680818!2d110.377863!3d-7.133911!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70887df28e42d3%3A0x49e172b4f8b9f149!2sLerep%2C%20Kec.%20Ungaran%20Bar.%2C%20Kabupaten%20Semarang%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1749266660313!5m2!1sid!2sid"
                        class="w-full h-full border-0" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

    </div>
    <x-footer></x-footer>
</body>

</html>
