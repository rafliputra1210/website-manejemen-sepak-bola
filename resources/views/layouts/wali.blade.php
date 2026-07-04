<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Wali Murid - Superseed Academy</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background-color: #f8fafc; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .navbar-custom { background: #064e3b; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
        .nav-link-custom { color: #a7f3d0 !important; font-weight: 500; padding: 10px 15px !important; border-radius: 8px; transition: all 0.2s; }
        .nav-link-custom:hover, .nav-link-custom.active { background: #047857; color: #ffffff !important; }
        .card-custom { border: none; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.04); background: #fff; }
        .badge-posisi { background: #f59e0b; color: #000; font-weight: bold; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top py-3 px-3">
        <div class="container max-w-6xl">
            <a class="navbar-brand font-weight-bold d-flex items-center" href="{{ route('wali.dashboard') }}">
                <span class="fs-4 me-2">⚽</span>
                <div>
                    <div class="fs-6 font-bold tracking-wider">SUPERSEED ACADEMY</div>
                    <div style="font-size: 0.65rem; color: #a7f3d0; line-height: 1;">PORTAL ORANG TUA / WALI</div>
                </div>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-3 mt-lg-0" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-1">
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('wali.dashboard') ? 'active' : '' }}" href="{{ route('wali.dashboard') }}">
                            <i class="bi bi-person-badge me-1"></i> Biodata Anak
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('wali.raport.*') ? 'active' : '' }}" href="{{ route('wali.raport.absensi') }}">
                            <i class="bi bi-award-fill me-1"></i> Raport & Absensi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('wali.keuangan') ? 'active' : '' }}" href="{{ route('wali.keuangan') }}">
                            <i class="bi bi-wallet2 me-1"></i> Transparansi Kas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('wali.pengumuman') ? 'active' : '' }}" href="{{ route('wali.pengumuman') }}">
                            <i class="bi bi-megaphone-fill me-1"></i> Pengumuman
                        </a>
                    </li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0 border-top pt-2 pt-lg-0 border-secondary">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm w-100 font-weight-bold">
                                <i class="bi bi-box-arrow-right me-1"></i> Keluar
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container py-4 flex-grow-1 max-w-6xl">
        <!-- Banner Selamat Datang -->
        <div class="d-flex justify-content-between align-items-center mb-4 bg-white p-3 rounded shadow-sm border-start border-4 border-success">
            <div>
                <span class="text-muted small">Selamat Datang di Portal Wali Murid,</span>
                <h6 class="mb-0 font-weight-bold text-dark">{{ Auth::user()->name }}</h6>
            </div>
            <span class="badge bg-light text-dark border"><i class="bi bi-shield-check text-success me-1"></i> Akun Terverifikasi</span>
        </div>

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white py-3 text-center text-muted small border-top mt-auto">
        &copy; {{ date('Y') }} Superseed Academy. Portal Transparansi & Akademik Siswa.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>