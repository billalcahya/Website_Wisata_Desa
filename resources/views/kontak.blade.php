<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kontak Wisata Desa Lerep</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
</head>

<body class="font-poppins bg-gray-50">
    <x-navbar></x-navbar>

    <div class="flex items-center justify-center min-h-[73vh] px-4 py-5">
        <div class="w-full max-w-7xl bg-white p-24 rounded-xl shadow-lg grid grid-cols-1 md:grid-cols-2 gap-32">
            <div>
                <h2 class="text-xl font-semibold mb-4">Kirim Pesan</h2>

                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-4 rounded-md mb-4 text-sm">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('kirim.pesan') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="text" name="nama" placeholder="Nama" required
                        class="w-full px-4 py-3 rounded-md bg-gray-100 border border-gray-300" />
                    <input type="email" name="email" placeholder="Email" required
                        class="w-full px-4 py-3 rounded-md bg-gray-100 border border-gray-300" />
                    <textarea name="pesan" rows="4" placeholder="Pesan" required
                        class="w-full px-4 py-3 rounded-md bg-gray-100 border border-gray-300"></textarea>
                    <button type="submit"
                        class="w-full bg-teal-700 text-white py-2 rounded-md hover:bg-teal-800 transition">
                        Kirim
                    </button>
                </form>
            </div>

            <!-- Info Kontak -->
            <div class="space-y-4 text-sm text-gray-700">
                <h2 class="text-xl font-semibold mb-4">Info Kontak</h2>

                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-teal-600 mt-1" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2C8.1 2 5 5.1 5 9c0 5.3 7 13 7 13s7-7.7 7-13c0-3.9-3.1-7-7-7zm0 9.5c-1.4 0-2.5-1.1-2.5-2.5S10.6 6.5 12 6.5s2.5 1.1 2.5 2.5S13.4 11.5 12 11.5z" />
                    </svg>
                    <p>Jl. Kalimasada No. 157 Dsn. Soka<br />Desa Lerep Kec. Ungaran Barat</p>
                </div>

                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-teal-600" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011.11-.21 11.36 11.36 0 003.53.57 1 1 0 011 1v3.56a1 1 0 01-1 1A17.89 17.89 0 013 5a1 1 0 011-1h3.56a1 1 0 011 1 11.36 11.36 0 00.57 3.53 1 1 0 01-.21 1.11l-2.3 2.15z" />
                    </svg>
                    <p>0857 1336 6268</p>
                </div>

                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-teal-600" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M20 4H4a2 2 0 00-2 2v1.2l10 5.6 10-5.6V6a2 2 0 00-2-2zM2 18a2 2 0 002 2h16a2 2 0 002-2V8.8l-10 5.6-10-5.6V18z" />
                    </svg>
                    <p>
                        <a href="mailto:desawisatalerep_dwl@yahoo.com"
                            class="text-teal-700 hover:underline">desawisatalerep_dwl@yahoo.com</a>
                    </p>
                </div>

                <div>
                    <p class="font-medium">Pelayanan Surat</p>
                    <p class="mt-1">0813 2770 7968</p>
                </div>
            </div>
        </div>
    </div>

    <x-footer></x-footer>
</body>

</html>
