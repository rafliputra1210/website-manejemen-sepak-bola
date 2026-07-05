<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superseed Academy - @yield('title', 'Akademi Sepak Bola')</title>
    <meta name="description" content="Pusat pembinaan sepak bola usia dini dan muda yang profesional dan terstruktur.">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            blue: '#0066FF',
                            navy: '#0A192F',
                            light: '#F0F5FF',
                            gray: '#64748B'
                        }
                    },
                    boxShadow: {
                        'soft': '0 4px 20px -2px rgba(0, 0, 0, 0.05)',
                        'hover': '0 10px 30px -5px rgba(0, 102, 255, 0.1)',
                    }
                }
            }
        }
    </script>
    
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #ffffff; color: #334155; }
        
        /* Navbar Scrolled State */
        #navbar { transition: all 0.3s ease; }
        .navbar-scrolled {
            background-color: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(8px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
        }

        /* Clean Link Hover */
        .nav-link { position: relative; color: #475569; transition: color 0.2s ease; font-weight: 500; }
        .nav-link:hover, .nav-link.active { color: #0066FF; }
        .nav-link::after {
            content: ''; position: absolute; width: 0; height: 2px; bottom: -4px; left: 0;
            background-color: #0066FF; transition: width 0.2s ease;
        }
        .nav-link.active::after { width: 100%; }

        /* Minimal Dropdown Mobile */
        #mobile-menu {
            transition: max-height 0.3s ease, opacity 0.3s ease;
            max-height: 0; opacity: 0; overflow: hidden;
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
        }
        #mobile-menu.open {
            max-height: 500px; opacity: 1;
        }

        /* Simple Fade In */
        .fade-in { opacity: 0; transform: translateY(15px); transition: opacity 0.5s ease, transform 0.5s ease; }
        .fade-in.visible { opacity: 1; transform: translateY(0); }
    </style>
    @stack('styles')
</head>
<body class="antialiased flex flex-col min-h-screen">

    <!-- NAVBAR -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-slate-100 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-10">
                
                <!-- Logo -->
                <a href="{{ route('landing.home') }}" class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-brand-blue rounded flex items-center justify-center">
                        <i class="bi bi-heptagon-fill text-white text-sm"></i>
                    </div>
                    <div class="flex flex-col justify-center">
                        <span class="font-bold text-brand-navy leading-none tracking-tight text-lg">SUPERSEED</span>
                        <span class="text-[10px] text-brand-gray font-semibold tracking-widest uppercase">Academy</span>
                    </div>
                </a>

                <!-- Desktop Nav -->
                <div class="hidden md:flex items-center gap-8">
                    @php
                        $navItems = [
                            ['route' => 'landing.home', 'label' => 'Beranda'],
                            ['route' => 'landing.coaches', 'label' => 'Pelatih'],
                            ['route' => 'landing.schedule', 'label' => 'Jadwal'],
                            ['route' => 'landing.achievements', 'label' => 'Prestasi'],
                            ['route' => 'landing.gallery', 'label' => 'Galeri'],
                        ];
                    @endphp
                    @foreach($navItems as $item)
                        <a href="{{ route($item['route']) }}" class="nav-link text-sm {{ request()->routeIs($item['route']) ? 'active' : '' }}">
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </div>

                <!-- Desktop CTA -->
                <div class="hidden md:flex items-center gap-4">
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-brand-navy hover:text-brand-blue transition-colors">
                        Masuk
                    </a>
                    <a href="{{ route('landing.registration') }}" class="px-5 py-2.5 bg-brand-blue hover:bg-blue-700 text-white text-sm font-semibold rounded-md transition-colors shadow-sm">
                        Daftar Akademi
                    </a>
                </div>

                <!-- Mobile Toggle -->
                <button id="hamburger-btn" class="md:hidden text-brand-navy p-2 focus:outline-none">
                    <i id="hamburger-icon" class="bi bi-list text-2xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu (Dropdown) -->
        <div id="mobile-menu" class="md:hidden absolute top-full left-0 w-full shadow-soft">
            <div class="px-4 py-4 flex flex-col gap-3">
                @foreach($navItems as $item)
                    <a href="{{ route($item['route']) }}" class="text-base font-medium text-slate-700 hover:text-brand-blue py-2 border-b border-slate-50">
                        {{ $item['label'] }}
                    </a>
                @endforeach
                <a href="{{ route('landing.registration') }}" class="text-base font-medium text-slate-700 hover:text-brand-blue py-2 border-b border-slate-50">Pendaftaran</a>
                <div class="pt-4 flex flex-col gap-3">
                    <a href="{{ route('login') }}" class="w-full text-center py-3 border border-slate-200 rounded-md text-brand-navy font-semibold">Masuk Akun</a>
                    <a href="{{ route('landing.registration') }}" class="w-full text-center py-3 bg-brand-blue rounded-md text-white font-semibold">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="flex-grow pt-24">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-brand-navy text-white pt-16 pb-8 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <!-- Brand -->
                <div class="md:col-span-2">
                    <a href="#" class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-brand-blue rounded flex items-center justify-center">
                            <i class="bi bi-heptagon-fill text-white text-sm"></i>
                        </div>
                        <span class="font-bold text-xl tracking-tight text-white">SUPERSEED</span>
                    </a>
                    <p class="text-slate-400 text-sm leading-relaxed max-w-sm mb-6">
                        Pusat pembinaan sepak bola modern yang berfokus pada pengembangan fundamental dan karakter atlet usia muda secara profesional.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="text-slate-400 hover:text-white transition-colors"><i class="bi bi-instagram text-xl"></i></a>
                        <a href="#" class="text-slate-400 hover:text-white transition-colors"><i class="bi bi-youtube text-xl"></i></a>
                        <a href="#" class="text-slate-400 hover:text-white transition-colors"><i class="bi bi-whatsapp text-xl"></i></a>
                    </div>
                </div>

                <!-- Links -->
                <div>
                    <h4 class="text-white font-bold mb-4 text-sm uppercase tracking-wider">Perusahaan</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('landing.home') }}" class="text-slate-400 hover:text-white text-sm transition-colors">Tentang Kami</a></li>
                        <li><a href="{{ route('landing.coaches') }}" class="text-slate-400 hover:text-white text-sm transition-colors">Tim Pelatih</a></li>
                        <li><a href="{{ route('landing.achievements') }}" class="text-slate-400 hover:text-white text-sm transition-colors">Prestasi</a></li>
                        <li><a href="{{ route('landing.gallery') }}" class="text-slate-400 hover:text-white text-sm transition-colors">Galeri</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-white font-bold mb-4 text-sm uppercase tracking-wider">Hubungi Kami</h4>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3 text-slate-400 text-sm">
                            <i class="bi bi-geo-alt mt-0.5 text-brand-blue"></i>
                            <span>Jl. Lapangan Olahraga No. 1<br>Jakarta, Indonesia</span>
                        </li>
                        <li class="flex items-center gap-3 text-slate-400 text-sm">
                            <i class="bi bi-envelope text-brand-blue"></i>
                            <span>info@superseed.id</span>
                        </li>
                        <li class="flex items-center gap-3 text-slate-400 text-sm">
                            <i class="bi bi-telephone text-brand-blue"></i>
                            <span>+62 812 3456 7890</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-slate-500 text-sm">
                    &copy; {{ date('Y') }} Superseed Academy. Hak Cipta Dilindungi.
                </p>
            </div>
        </div>
    </footer>

    <!-- SCRIPTS -->
    <script>
        // Navbar Scrolled
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 10) {
                navbar.classList.add('navbar-scrolled');
                navbar.classList.remove('py-4');
            } else {
                navbar.classList.remove('navbar-scrolled');
                navbar.classList.add('py-4');
            }
        });

        // Mobile Menu Toggle
        const btn = document.getElementById('hamburger-btn');
        const menu = document.getElementById('mobile-menu');
        const icon = document.getElementById('hamburger-icon');

        btn.addEventListener('click', () => {
            menu.classList.toggle('open');
            if(menu.classList.contains('open')) {
                icon.classList.remove('bi-list');
                icon.classList.add('bi-x-lg');
            } else {
                icon.classList.remove('bi-x-lg');
                icon.classList.add('bi-list');
            }
        });

        // Simple Intersection Observer for fade-in elements
        const observerOptions = { threshold: 0.1, rootMargin: "0px 0px -20px 0px" };
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
    </script>
    @stack('scripts')
</body>
</html>