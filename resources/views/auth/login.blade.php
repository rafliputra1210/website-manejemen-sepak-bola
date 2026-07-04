<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Superseed Academy</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-emerald-900 to-gray-900 min-h-screen flex items-center justify-center p-4">

    <div class="max-w-md w-full bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100">
        <div class="bg-emerald-800 p-6 text-center text-white">
            <h1 class="text-2xl font-extrabold tracking-wider">⚽ SUPERSEED</h1>
            <p class="text-xs text-emerald-200 mt-1">Portal Login Admin & Wali Murid</p>
        </div>

        <div class="p-8">
            <!-- Alert Error -->
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded text-sm">
                    <p class="font-bold">Login Gagal</p>
                    <p>{{ $errors->first() }}</p>
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label for="username" class="block text-sm font-semibold text-gray-700 mb-1">Username</label>
                    <input type="text" name="username" id="username" value="{{ old('username') }}" required autofocus
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition text-sm"
                        placeholder="Masukkan username Anda">
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="password" required
                            class="w-full px-4 py-2.5 pr-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition text-sm"
                            placeholder="••••••••">
                        
                        <!-- Tombol Eye Icon Toggle -->
                        <button type="button" id="togglePassword" 
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-emerald-600 focus:outline-none transition">
                            <!-- Ikon Mata Tertutup (Default) -->
                            <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                            <!-- Ikon Mata Terbuka (Disembunyikan awalnya) -->
                            <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hidden">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center text-gray-600">
                        <input type="checkbox" name="remember" class="rounded text-emerald-600 focus:ring-emerald-500 mr-2">
                        Ingat Saya
                    </label>
                </div>

                <button type="submit"
                    class="w-full bg-amber-500 hover:bg-amber-600 text-white font-bold py-3 rounded-lg shadow-md transition transform active:scale-95 text-sm uppercase tracking-wider">
                    Masuk ke Portal
                </button>
            </form>

            <div class="mt-6 text-center text-xs text-gray-400 border-t pt-4">
                <p>Belum memiliki akun? Silahkan hubungi admin sekretariat.</p>
                <a href="{{ route('landing.home') }}" class="text-emerald-700 font-semibold hover:underline mt-2 inline-block">&larr; Kembali ke Beranda</a>
            </div>
        </div>
    </div>

    <!-- Script Toggle Show/Hide Password -->
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#password');
        const eyeClosed = document.querySelector('#eyeClosed');
        const eyeOpen = document.querySelector('#eyeOpen');

        togglePassword.addEventListener('click', function () {
            // Ubah tipe input antara 'password' dan 'text'
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Ganti tampilan ikon mata
            eyeClosed.classList.toggle('hidden');
            eyeOpen.classList.toggle('hidden');
        });
    </script>

</body>
</html>