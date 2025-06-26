<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Forgot Password</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="bg-white shadow-lg rounded-xl px-20 py-20 md:px-16 w-full max-w-2xl mx-auto">
        <!-- Icon Image Centered -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('img/logodesalerep.png') }}" alt="Forgot Password Icon"
                class="w-50 h-50 object-contain" />
        </div>

        <h2 class="text-center text-2xl font-semibold mb-2">Forgot Password</h2>
        <p class="text-center text-gray-600 mb-8 text-sm">
            Masukkan alamat email Anda di bawah ini dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi
            Anda.
        </p>

        @if (session('status'))
            <div class="mb-5 p-4 rounded bg-green-100 text-green-700 text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-5">
                <label for="email" class="block text-gray-600 text-sm mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    placeholder="Email"
                    class="w-full px-4 py-2 border rounded-lg outline-none focus:ring-2 focus:ring-teal-600 focus:border-transparent text-sm @error('email') border-red-500 @enderror" />
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit"
                class="w-full bg-teal-700 hover:bg-teal-800 text-white py-2 rounded-lg font-semibold shadow">
                Send Password Reset Link
            </button>
        </form>

        <div class="text-center mt-6 text-sm text-gray-300">
            Remembered your password ?
            <a href="{{ route('login') }}" class="text-teal-700 hover:underline">Login here</a>.
        </div>
    </div>

</body>

</html>
