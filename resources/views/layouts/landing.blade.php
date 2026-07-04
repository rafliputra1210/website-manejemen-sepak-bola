<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superseed Academy - @yield('title', 'Sekolah Sepak Bola')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <nav class="bg-emerald-800 text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <a href="{{ route('landing.home') }}" class="font-bold text-xl tracking-wider">
                    ⚽ SUPERSEED ACADEMY
                </a>
                <div class="hidden md:flex space-x-6 text-sm font-medium">
                    <a href="{{ route('landing.home') }}" class="hover:text-emerald-200 transition">Beranda</a>
                    <a href="{{ route('landing.coaches') }}" class="hover:text-emerald-200 transition">Profil Coach</a>
                    <a href="{{ route('landing.schedule') }}" class="hover:text-emerald-200 transition">Jadwal Latihan</a>
                    <a href="{{ route('landing.achievements') }}" class="hover:text-emerald-200 transition">Prestasi</a>
                    <a href="{{ route('landing.gallery') }}" class="hover:text-emerald-200 transition">Galeri</a>
                    <a href="{{ route('landing.registration') }}" class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-full font-semibold transition">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-gray-400 py-8 text-center text-sm border-t border-gray-800">
        <p>&copy; {{ date('Y') }} Superseed Academy. All rights reserved.</p>
    </footer>

</body>
</html>