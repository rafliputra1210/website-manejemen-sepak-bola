@extends('layouts.wali')

@section('content')
<div class="card card-custom p-4 mb-4">
    <h5 class="font-weight-bold text-dark mb-1"><i class="bi bi-megaphone-fill text-warning me-2"></i>Pusat Informasi & Pengumuman</h5>
    <p class="text-muted small mb-0">Ikuti terus informasi jadwal latihan, libur hari raya, dan agenda turnamen Superseed Academy.</p>
</div>

<div class="row g-3">
    @forelse($announcements as $info)
    <div class="col-12">
        <div class="card card-custom p-4 border-start border-4 border-success hover-shadow transition">
            <div class="d-flex justify-content-between align-items-center mb-2 flex-wrap gap-2">
                <span class="badge bg-success px-3 py-1 font-weight-bold">Informasi Resmi Akademi</span>
                <span class="text-muted small"><i class="bi bi-calendar3 me-1"></i> Diterbitkan: {{ \Carbon\Carbon::parse($info->tanggal)->format('d F Y') }}</span>
            </div>
            <h5 class="font-weight-bold text-dark mt-1">{{ $info->judul }}</h5>
            <p class="text-gray-700 mt-2 mb-0" style="white-space: pre-line; line-height: 1.6;">{{ $info->konten }}</p>
        </div>
    </div>
    @empty
    <div class="col-12 text-center py-5 bg-white rounded card-custom text-muted">
        <i class="bi bi-bell-slash fs-1 d-block mb-2 text-secondary"></i>
        Belum ada pengumuman yang diterbitkan oleh akademi.
    </div>
    @endforelse
</div>

<div class="mt-4">{{ $announcements->links() }}</div>
@endsection