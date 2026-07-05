<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Superseed Academy</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        /* CSS Variables for Brand Colors */
        :root {
            --brand-blue: #0066FF;
            --brand-navy: #0A192F;
            --brand-light: #F0F5FF;
            --brand-gray: #64748B;
            --bg-color: #F8FAFC; /* slate-50 equivalent */
        }
        
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: var(--bg-color); 
            color: #334155; 
        }

        /* Sidebar Styling (Navy Blue) */
        #sidebar { 
            min-width: 260px; max-width: 260px; min-height: 100vh; 
            background: var(--brand-navy); /* Navy sidebar */
            color: #cbd5e1; 
            transition: all 0.3s; 
            border-right: none;
        }
        #sidebar .sidebar-header { 
            padding: 20px; background: var(--brand-navy); 
            border-bottom: 1px solid rgba(255,255,255,0.1); 
        }
        #sidebar ul.components { padding: 20px 0; }
        #sidebar ul li a { 
            padding: 12px 24px; font-size: 0.95em; font-weight: 500; display: block; 
            color: #94a3b8; text-decoration: none; 
            border-left: 4px solid transparent; transition: 0.2s; 
        }
        #sidebar ul li a:hover, #sidebar ul li a.active { 
            color: #ffffff; 
            background: rgba(255,255,255,0.05); 
            border-left-color: var(--brand-blue); 
        }
        #sidebar ul li a i { margin-right: 12px; font-size: 1.2em; color: #64748b; transition: 0.2s; }
        #sidebar ul li a:hover i, #sidebar ul li a.active i { color: var(--brand-blue); }

        .sidebar-section-title {
            font-size: 0.75rem; font-weight: 700; color: #64748b; 
            text-transform: uppercase; letter-spacing: 0.05em;
        }

        /* Main Content & Navbar */
        .main-content { width: 100%; overflow-x: hidden; }
        .navbar-custom { 
            background: #ffffff; 
            border-bottom: 1px solid #e2e8f0;
            padding: 0.75rem 1.5rem;
        }
        
        /* Card Custom (Minimalist) */
        .card-custom { 
            background: #ffffff; border: 1px solid #e2e8f0; 
            border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02); 
        }

        /* Utility classes */
        .text-brand-blue { color: var(--brand-blue) !important; }
        .text-brand-navy { color: var(--brand-navy) !important; }
        .bg-brand-light { background-color: var(--brand-light) !important; }

        /* Responsive Sidebar */
        @media (max-width: 991.98px) {
            #sidebar { margin-left: -260px; position: fixed; z-index: 1050; height: 100vh; }
            #sidebar.active { margin-left: 0; }
            .sidebar-overlay {
                display: none; position: fixed; width: 100vw; height: 100vh;
                background: rgba(15, 23, 42, 0.5); backdrop-filter: blur(2px);
                z-index: 1040; top: 0; left: 0;
            }
            .sidebar-overlay.active { display: block; }
        }
    </style>
</head>
<body>

<div class="sidebar-overlay" id="sidebar-overlay"></div>

<div class="d-flex">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0 font-weight-bold text-white d-flex align-items-center" style="font-weight: 800;">
                <div class="bg-brand-blue text-white rounded p-1 me-2 d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;">
                    <i class="bi bi-heptagon-fill" style="font-size: 0.8rem; margin:0;"></i>
                </div>
                SUPERSEED
            </h5>
            <span class="badge text-white border border-secondary px-2 py-1" style="font-size: 0.7rem; background: rgba(255,255,255,0.1);">ADMIN</span>
        </div>
        
        <ul class="list-unstyled components">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-fill"></i> Dashboard
                </a>
            </li>
            
            <li class="px-4 mt-4 mb-2 sidebar-section-title">Manajemen Data</li>
            <li>
                <a href="{{ route('admin.athletes.index') }}" class="{{ request()->routeIs('admin.athletes.*') ? 'active' : '' }}">
                    <i class="bi bi-people-fill"></i> Data Atlet (Murid)
                </a>
            </li>
            <li>
                <a href="{{ route('admin.coaches.index') }}" class="{{ request()->routeIs('admin.coaches.*') ? 'active' : '' }}">
                    <i class="bi bi-person-badge-fill"></i> Data Coach
                </a>
            </li>
            <li>
                <a href="{{ route('admin.schedules.index') }}" class="{{ request()->routeIs('admin.schedules.*') ? 'active' : '' }}">
                    <i class="bi bi-calendar-event-fill"></i> Jadwal Latihan
                </a>
            </li>
            <li>
                <a href="{{ route('admin.attendances.index') }}" class="{{ request()->routeIs('admin.attendances.*') ? 'active' : '' }}">
                    <i class="bi bi-calendar-check-fill"></i> Absensi Murid
                </a>
            </li>
            
            <li class="px-4 mt-4 mb-2 sidebar-section-title">Akademik & Keuangan</li>
            <li>
                <a href="{{ route('admin.finances.index') }}" class="{{ request()->routeIs('admin.finances.*') ? 'active' : '' }}">
                    <i class="bi bi-wallet2"></i> Uang Kas & Keuangan
                </a>
            </li>
            <li>
                <a href="{{ route('admin.reports.index') }}" class="{{ request()->routeIs('admin.reports.*') ? 'active' : '' }}">
                    <i class="bi bi-award-fill"></i> Raport Murid
                </a>
            </li>
            <li>
                <a href="{{ route('admin.achievements.index') }}" class="{{ request()->routeIs('admin.achievements.*') ? 'active' : '' }}">
                    <i class="bi bi-trophy-fill"></i> Prestasi Klub
                </a>
            </li>
            <li>
                <a href="{{ route('admin.announcements.index') }}" class="{{ request()->routeIs('admin.announcements.*') ? 'active' : '' }}">
                    <i class="bi bi-megaphone-fill"></i> Pengumuman
                </a>
            </li>
            
            <li class="px-4 mt-4 mb-2 sidebar-section-title">Pengaturan Front-End</li>
            <li>
                <a href="{{ route('admin.banners.index') }}" class="{{ request()->routeIs('admin.banners.*') ? 'active' : '' }}">
                    <i class="bi bi-images"></i> Banner Beranda
                </a>
            </li>
            <li>
                <a href="{{ route('admin.news.index') }}" class="{{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                    <i class="bi bi-newspaper"></i> Berita & Artikel
                </a>
            </li>
            <li>
                <a href="{{ route('admin.galleries.index') }}" class="{{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                    <i class="bi bi-camera-fill"></i> Galeri Foto
                </a>
            </li>
        </ul>
    </nav>

    <!-- Main Content Area -->
    <div class="main-content d-flex flex-column min-vh-100">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand navbar-custom sticky-top">
            <div class="container-fluid p-0">
                <button type="button" id="sidebarCollapse" class="btn btn-sm btn-light border me-3 d-lg-none shadow-sm">
                    <i class="bi bi-list fs-5 text-secondary"></i>
                </button>
                
                <span class="navbar-brand mb-0 h1 fs-5 fw-bold text-brand-navy">@yield('title', 'Dashboard')</span>
                
                <div class="d-flex align-items-center ms-auto">
                    <div class="me-3 d-flex align-items-center">
                        <div class="bg-brand-light text-brand-blue rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <span class="text-secondary small fw-medium d-none d-sm-inline">{{ Auth::user()->name ?? 'Administrator' }}</span>
                    </div>
                    
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-1 border-0">
                            <i class="bi bi-box-arrow-right"></i> <span class="d-none d-sm-inline">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Main Container -->
        <main class="p-4 flex-grow-1">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm d-flex align-items-center" role="alert" style="background-color: #ecfdf5; color: #065f46;">
                    <i class="bi bi-check-circle-fill me-2 fs-5"></i> 
                    <div>{{ session('success') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white text-center py-4 text-secondary small border-top" style="font-size: 0.8rem;">
            &copy; {{ date('Y') }} <strong>Superseed Academy</strong>. Hak Cipta Dilindungi.<br>
            <span class="text-muted">Sistem Manajemen Berbasis Web - Laravel 12</span>
        </footer>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const sidebar = document.getElementById('sidebar');
        const sidebarCollapseBtn = document.getElementById('sidebarCollapse');
        const overlay = document.getElementById('sidebar-overlay');

        if (sidebarCollapseBtn) {
            sidebarCollapseBtn.addEventListener('click', function () {
                sidebar.classList.toggle('active');
                overlay.classList.toggle('active');
            });
        }

        if (overlay) {
            overlay.addEventListener('click', function () {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
            });
        }
    });
</script>
@stack('scripts')
</body>
</html>