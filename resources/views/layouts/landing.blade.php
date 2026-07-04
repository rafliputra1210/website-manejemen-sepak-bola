<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superseed Academy - @yield('title', 'Sekolah Sepak Bola')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="bg-emerald-800 text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo -->
                <a href="{{ route('landing.home') }}" class="font-bold text-xl tracking-wider flex items-center gap-2">
                    <span>⚽</span> SUPERSEED ACADEMY
                </a>

                <!-- Hamburger Button (Mobile) -->
                <div class="flex md:hidden">
                    <button type="button" id="hamburger-btn" class="text-white hover:text-emerald-200 focus:outline-none transition">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path id="hamburger-icon-open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path id="hamburger-icon-close" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Menu Navigasi Desktop -->
                <div class="hidden md:flex items-center space-x-6 text-sm font-medium">
                    <a href="{{ route('landing.home') }}" class="hover:text-emerald-200 transition {{ request()->routeIs('landing.home') ? 'text-amber-400 font-bold' : '' }}">Beranda</a>
                    <a href="{{ route('landing.coaches') }}" class="hover:text-emerald-200 transition {{ request()->routeIs('landing.coaches') ? 'text-amber-400 font-bold' : '' }}">Profil Coach</a>
                    <a href="{{ route('landing.schedule') }}" class="hover:text-emerald-200 transition {{ request()->routeIs('landing.schedule') ? 'text-amber-400 font-bold' : '' }}">Jadwal Latihan</a>
                    <a href="{{ route('landing.achievements') }}" class="hover:text-emerald-200 transition {{ request()->routeIs('landing.achievements') ? 'text-amber-400 font-bold' : '' }}">Prestasi</a>
                    <a href="{{ route('landing.gallery') }}" class="hover:text-emerald-200 transition {{ request()->routeIs('landing.gallery') ? 'text-amber-400 font-bold' : '' }}">Galeri</a>
                    
                    <div class="h-5 w-px bg-emerald-700"></div> <!-- Pembatas Visual -->

                    <!-- Tombol Daftar -->
                    <a href="{{ route('landing.registration') }}" class="hover:text-amber-300 transition">Info Daftar</a>

                    <!-- TOMBOL LOGIN PINTAR (ADMIN & WALI MURID JADI SATU) -->
                    @auth
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="bg-amber-500 hover:bg-amber-600 text-gray-900 font-bold px-4 py-2 rounded-full shadow transition transform active:scale-95 flex items-center gap-1">
                                <span>⚡</span> Panel Admin
                            </a>
                        @else
                            <a href="{{ route('wali.dashboard') }}" class="bg-amber-500 hover:bg-amber-600 text-gray-900 font-bold px-4 py-2 rounded-full shadow transition transform active:scale-95 flex items-center gap-1">
                                <span>⚡</span> Portal Wali
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-gray-950 font-extrabold px-5 py-2 rounded-full shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 active:scale-95 flex items-center gap-1.5 border border-amber-400">
                            <span>🔐</span> Login Portal
                        </a>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Menu Navigasi Mobile -->
        <div id="mobile-menu" class="hidden md:hidden bg-emerald-900 border-t border-emerald-800 px-4 pt-2 pb-4 space-y-2">
            <a href="{{ route('landing.home') }}" class="block px-3 py-2 rounded-md hover:bg-emerald-800 transition {{ request()->routeIs('landing.home') ? 'text-amber-400 font-bold bg-emerald-800' : '' }}">Beranda</a>
            <a href="{{ route('landing.coaches') }}" class="block px-3 py-2 rounded-md hover:bg-emerald-800 transition {{ request()->routeIs('landing.coaches') ? 'text-amber-400 font-bold bg-emerald-800' : '' }}">Profil Coach</a>
            <a href="{{ route('landing.schedule') }}" class="block px-3 py-2 rounded-md hover:bg-emerald-800 transition {{ request()->routeIs('landing.schedule') ? 'text-amber-400 font-bold bg-emerald-800' : '' }}">Jadwal Latihan</a>
            <a href="{{ route('landing.achievements') }}" class="block px-3 py-2 rounded-md hover:bg-emerald-800 transition {{ request()->routeIs('landing.achievements') ? 'text-amber-400 font-bold bg-emerald-800' : '' }}">Prestasi</a>
            <a href="{{ route('landing.gallery') }}" class="block px-3 py-2 rounded-md hover:bg-emerald-800 transition {{ request()->routeIs('landing.gallery') ? 'text-amber-400 font-bold bg-emerald-800' : '' }}">Galeri</a>
            <a href="{{ route('landing.registration') }}" class="block px-3 py-2 rounded-md hover:bg-emerald-800 transition {{ request()->routeIs('landing.registration') ? 'text-amber-400 font-bold bg-emerald-800' : '' }}">Info Daftar</a>
            <div class="border-t border-emerald-800 my-2 pt-2"></div>
            @auth
                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="block text-center bg-amber-500 hover:bg-amber-600 text-gray-900 font-bold py-2 rounded-md shadow transition">
                        ⚡ Panel Admin
                    </a>
                @else
                    <a href="{{ route('wali.dashboard') }}" class="block text-center bg-amber-500 hover:bg-amber-600 text-gray-900 font-bold py-2 rounded-md shadow transition">
                        ⚡ Portal Wali
                    </a>
                @endif
            @else
                <a href="{{ route('login') }}" class="block text-center bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-gray-950 font-extrabold py-2 rounded-md shadow transition border border-amber-400">
                    🔐 Login Portal
                </a>
            @endauth
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-gray-400 py-8 text-center text-sm border-t border-gray-800">
        <p>&copy; {{ date('Y') }} Superseed Academy. All rights reserved.</p>
    </footer>

    <!-- Script Hamburger Menu -->
    <script>
        const hamburgerBtn = document.getElementById('hamburger-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const iconOpen = document.getElementById('hamburger-icon-open');
        const iconClose = document.getElementById('hamburger-icon-close');

        hamburgerBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            iconOpen.classList.toggle('hidden');
            iconClose.classList.toggle('hidden');
        });
    </script>

</body>
</html>