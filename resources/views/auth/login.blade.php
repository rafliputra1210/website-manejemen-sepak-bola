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
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition text-sm"
                        placeholder="••••••••">
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

</body>
</html>