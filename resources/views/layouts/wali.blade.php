<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Wali Murid - Superseed Academy</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --brand-blue: #0066FF;
            --brand-navy: #0A192F;
            --brand-light: #F0F5FF;
        }
        
        body { 
            background-color: #f8fafc; 
            font-family: 'Inter', sans-serif; 
            color: #334155;
        }

        /* Navbar Custom (Clean White) */
        .navbar-custom { 
            background: #ffffff; 
            border-bottom: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02); 
        }
        
        .nav-link-custom { 
            color: #64748b !important; 
            font-weight: 500; 
            padding: 8px 16px !important; 
            border-radius: 8px; 
            transition: all 0.2s; 
            font-size: 0.95rem;
        }
        
        .nav-link-custom:hover, .nav-link-custom.active { 
            background: var(--brand-light); 
            color: var(--brand-blue) !important; 
        }

        /* Card Custom (Minimalist) */
        .card-custom { 
            border: 1px solid #e2e8f0; 
            border-radius: 12px; 
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02); 
            background: #ffffff; 
        }

        .text-brand-blue { color: var(--brand-blue) !important; }
        .text-brand-navy { color: var(--brand-navy) !important; }
        .bg-brand-light { background-color: var(--brand-light) !important; }
        
        .badge-posisi { background: var(--brand-blue); color: #fff; font-weight: bold; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom py-3 sticky-top">
        <div class="container" style="max-width: 1140px;">
            <a class="navbar-brand fw-bold d-flex align-items-center gap-2 text-brand-navy" href="{{ route('wali.dashboard') }}">
                <div class="bg-brand-blue text-white rounded p-1 d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;">
                    <i class="bi bi-heptagon-fill" style="font-size: 0.8rem; margin:0;"></i>
                </div>
                SUPERSEED <span class="badge border border-secondary text-secondary ms-1 fw-normal" style="font-size: 0.65rem;">WALI</span>
            </a>
            
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list fs-1 text-brand-navy"></i>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-2 align-items-lg-center mt-3 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('wali.dashboard') ? 'active' : '' }}" href="{{ route('wali.dashboard') }}">
                            <i class="bi bi-person-badge me-1"></i> Biodata
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('wali.absensi') ? 'active' : '' }}" href="{{ route('wali.absensi') }}">
                            <i class="bi bi-calendar-check-fill me-1"></i> Absensi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('wali.raport') ? 'active' : '' }}" href="{{ route('wali.raport') }}">
                            <i class="bi bi-award-fill me-1"></i> Raport
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('wali.keuangan') ? 'active' : '' }}" href="{{ route('wali.keuangan') }}">
                            <i class="bi bi-wallet2 me-1"></i> Uang Kas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('wali.pengumuman') ? 'active' : '' }}" href="{{ route('wali.pengumuman') }}">
                            <i class="bi bi-megaphone-fill me-1"></i> Pengumuman
                        </a>
                    </li>
                    <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm px-3 py-2 w-100 fw-semibold text-danger border-danger-subtle bg-danger-subtle rounded-3">
                                <i class="bi bi-box-arrow-right me-1"></i> Keluar
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container py-4 flex-grow-1" style="max-width: 1140px;">
        <!-- Banner Selamat Datang -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 bg-white p-4 rounded-3 border shadow-sm border-start border-4" style="border-left-color: var(--brand-blue) !important;">
            <div class="mb-2 mb-md-0">
                <span class="text-secondary small fw-medium">Selamat Datang di Portal Wali,</span>
                <h5 class="mb-0 fw-bold text-brand-navy">{{ Auth::user()->name }}</h5>
            </div>
            <span class="badge bg-brand-light text-brand-blue border px-3 py-2 rounded-pill"><i class="bi bi-shield-check me-1"></i> Akun Terverifikasi</span>
        </div>

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white py-4 text-center text-secondary small border-top mt-auto" style="font-size: 0.8rem;">
        &copy; {{ date('Y') }} <strong>Superseed Academy</strong>. Portal Transparansi & Akademik Siswa.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>