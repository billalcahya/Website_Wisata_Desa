<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Reset Password</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="bg-white shadow-lg rounded-xl px-10 py-20 md:px-16 w-full max-w-2xl mx-auto">
        <!-- Icon Image Centered -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('img/logodesalerep.png') }}" alt="Reset Password Icon" class="w-50 h-50 object-contain" />
        </div>

        <h2 class="text-center text-2xl font-semibold mb-2 text-gray-800">Reset Password</h2>
        <p class="text-center text-gray-600 mb-8 text-sm">
            Masukkan email dan kata sandi baru Anda di bawah ini untuk mengatur ulang kata sandi.
        </p>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-5">
                <label for="email" class="block text-gray-600 text-sm mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    placeholder="Email"
                    class="w-full px-4 py-2 border rounded-lg outline-none focus:ring-2 focus:ring-teal-600 focus:border-transparent text-sm @error('email') border-red-500 @enderror" />
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="block text-gray-600 text-sm mb-1">New Password</label>
                <input id="password" type="password" name="password" required placeholder="New Password"
                    class="w-full px-4 py-2 border rounded-lg outline-none focus:ring-2 focus:ring-teal-600 focus:border-transparent text-sm @error('password') border-red-500 @enderror" />
                @error('password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-600 text-sm mb-1">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    placeholder="Confirm Password"
                    class="w-full px-4 py-2 border rounded-lg outline-none focus:ring-2 focus:ring-teal-600 focus:border-transparent text-sm" />
            </div>

            <button type="submit"
                class="w-full bg-teal-700 hover:bg-teal-800 text-white py-2 rounded-lg font-semibold shadow">
                Reset Password
            </button>
        </form>

        <div class="text-center mt-6 text-sm text-gray-600">
            Sudah ingat kata sandi?
            <a href="{{ route('login') }}" class="text-teal-700 hover:underline">Login di sini</a>.
        </div>
    </div>

</body>

</html>
