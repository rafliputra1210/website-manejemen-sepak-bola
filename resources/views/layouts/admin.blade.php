<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Superseed Academy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f9; }
        #sidebar { min-width: 260px; max-width: 260px; min-height: 100vh; background: #1e293b; color: #fff; transition: all 0.3s; }
        #sidebar .sidebar-header { padding: 20px; background: #0f172a; border-bottom: 1px solid #334155; }
        #sidebar ul.components { padding: 20px 0; }
        #sidebar ul li a { padding: 12px 20px; font-size: 0.95em; display: block; color: #cbd5e1; text-decoration: none; border-left: 4px solid transparent; transition: 0.2s; }
        #sidebar ul li a:hover, #sidebar ul li a.active { color: #fff; background: #334155; border-left-color: #f59e0b; }
        #sidebar ul li a i { margin-right: 10px; font-size: 1.1em; }
        .main-content { width: 100%; overflow-x: hidden; }
        .navbar-custom { background: #ffffff; box-shadow: 0 2px 4px rgba(0,0,0,0.04); }
        .card-custom { border: none; border-radius: 10px; box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.05); }
    </style>
</head>
<body>

<div class="d-flex">
    <nav id="sidebar">
        <div class="sidebar-header d-flex items-center justify-content-between">
            <h5 class="mb-0 font-weight-bold text-warning"><i class="bi bi-trophy-fill me-2"></i>SUPERSEED</h5>
            <span class="badge bg-success text-xs">ADMIN</span>
        </div>
        <ul class="list-unstyled components">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-1x2-fill"></i> Dashboard
                </a>
            </li>
            <li class="text-uppercase text-muted px-3 mt-3 mb-1" style="font-size: 0.75rem; font-weight: bold;">Manajemen Data</li>
            <li>
                <a href="{{ route('admin.athletes.index') }}" class="{{ request()->routeIs('admin.athletes.*') ? 'active' : '' }}">
                    <i class="bi bi-people-fill"></i> Data Atlet (Murid)
                </a>
            </li>
            <li>
                <a href="#" class="">
                    <i class="bi bi-person-badge-fill"></i> Data Coach
                </a>
            </li>
            <li>
                <a href="#" class="">
                    <i class="bi bi-calendar-check-fill"></i> Absensi Murid
                </a>
            </li>
            <li class="text-uppercase text-muted px-3 mt-3 mb-1" style="font-size: 0.75rem; font-weight: bold;">Akademik & Keuangan</li>
            <li>
                <a href="#" class="">
                    <i class="bi bi-wallet2"></i> Uang Kas & Keuangan
                </a>
            </li>
            <li>
                <a href="#" class="">
                    <i class="bi bi-award-fill"></i> Raport & Prestasi
                </a>
            </li>
            <li>
                <a href="#" class="">
                    <i class="bi bi-megaphone-fill"></i> Pengumuman
                </a>
            </li>
        </ul>
    </nav>

    <div class="main-content d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand navbar-custom px-4 py-3">
            <div class="container-fluid p-0">
                <span class="navbar-brand mb-0 h1 fs-5 text-dark">@yield('title', 'Dashboard')</span>
                <div class="d-flex items-center ms-auto">
                    <span class="me-3 text-muted small"><i class="bi bi-person-circle me-1"></i> Halo, <strong>{{ Auth::user()->name ?? 'Administrator' }}</strong></span>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>
                </div>
            </div>
        </nav>

        <main class="p-4 flex-grow-1">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </main>

        <footer class="bg-white text-center py-3 text-muted small border-top">
            &copy; {{ date('Y') }} Superseed Academy Management System. Powered by Laravel 12.
        </footer>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>