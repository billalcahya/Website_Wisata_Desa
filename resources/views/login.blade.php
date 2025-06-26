<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login DWL</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-50 relative overflow-hidden">
    <!-- Login Card -->
    <div class="bg-white shadow-lg rounded-xl px-10 py-12 w-full max-w-lg z-10">
        <!-- Logo & Title -->
        <div class="flex flex-col items-center mb-8">
            <img src="{{ asset('img/logodesalerep.png') }}" alt="DWL Logo" class="w-60 h-60 object-contain mb-3" />
            <span class="text-xs text-gray-400 mt-1 tracking-wide">ADMIN</span>
        </div>

        <!-- Error Message -->
        @if ($errors->any())
            <div class="mb-5 p-4 rounded bg-red-100 text-red-700 text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-5">
                <label for="email" class="block text-gray-600 text-sm mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"
                    class="w-full px-4 py-2 border rounded-lg outline-none focus:ring-2 focus:ring-teal-600 focus:border-transparent text-sm" />
            </div>

            <div class="mb-6">
                <label for="password" class="block text-gray-600 text-sm mb-1">Password</label>
                <input type="password" name="password" placeholder="Password"
                    class="w-full px-4 py-2 border rounded-lg outline-none focus:ring-2 focus:ring-teal-600 focus:border-transparent text-sm" />
            </div>

            <button type="submit"
                class="w-full bg-teal-700 hover:bg-teal-800 text-white py-2 rounded-lg font-semibold shadow">
                LOGIN
            </button>

            <div class="text-center mt-4">
                <a href="{{ route('password.request') }}" class="text-sm text-teal-700 hover:underline">Forgot
                    password?</a>
            </div>
        </form>
    </div>
</body>

</html>
