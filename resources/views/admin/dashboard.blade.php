@extends('layouts.admin')
@section('title', 'Dashboard Statistik')

@section('content')
<div class="row g-3 mb-4">
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card card-custom p-3 bg-primary text-white h-100 d-flex flex-row justify-content-between align-items-center">
            <div>
                <h6 class="text-uppercase mb-1" style="font-size: 0.8rem; opacity: 0.8;">Total Atlet Terdaftar</h6>
                <h2 class="mb-0 font-weight-bold">{{ \App\Models\Athlete::count() }} <span class="fs-6">Siswa</span></h2>
            </div>
            <i class="bi bi-people-fill fs-1 opacity-50"></i>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card card-custom p-3 bg-success text-white h-100 d-flex flex-row justify-content-between align-items-center">
            <div>
                <h6 class="text-uppercase mb-1" style="font-size: 0.8rem; opacity: 0.8;">Total Coach</h6>
                <h2 class="mb-0 font-weight-bold">{{ \App\Models\Coach::count() }} <span class="fs-6">Pelatih</span></h2>
            </div>
            <i class="bi bi-person-badge-fill fs-1 opacity-50"></i>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card card-custom p-3 bg-warning text-dark h-100 d-flex flex-row justify-content-between align-items-center">
            <div>
                <h6 class="text-uppercase mb-1" style="font-size: 0.8rem; opacity: 0.8;">Saldo Uang Kas</h6>
                <h4 class="mb-0 font-weight-bold">Rp 0</h4>
            </div>
            <i class="bi bi-wallet2 fs-1 opacity-50"></i>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card card-custom p-3 bg-info text-white h-100 d-flex flex-row justify-content-between align-items-center">
            <div>
                <h6 class="text-uppercase mb-1" style="font-size: 0.8rem; opacity: 0.8;">Pengumuman Aktif</h6>
                <h2 class="mb-0 font-weight-bold">{{ \App\Models\Announcement::where('is_active', true)->count() }}</h2>
            </div>
            <i class="bi bi-megaphone-fill fs-1 opacity-50"></i>
        </div>
    </div>
</div>

<div class="card card-custom p-4 bg-white">
    <div class="d-flex items-center">
        <div class="me-4 text-warning" style="font-size: 3.5rem;">⚽</div>
        <div>
            <h4 class="mb-1 text-dark">Selamat Datang di Portal Admin Superseed Academy!</h4>
            <p class="text-muted mb-0">
                Gunakan menu di sebelah kiri untuk mengelola Data Murid (CRUD), Profil Coach berlisensi, Absensi Barcode, Keuangan Uang Kas, hingga penerbitan Raport siswa.
            </p>
        </div>
    </div>
</div>
@endsection