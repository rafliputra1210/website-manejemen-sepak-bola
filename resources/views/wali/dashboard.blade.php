@extends('layouts.wali')

@section('content')
<!-- Pilihan Ganti Anak (Jika Punya Lebih dari 1 Anak di Akademi) -->
@if($myAthletes->count() > 1)
<div class="mb-4 bg-warning bg-opacity-10 border border-warning p-3 rounded d-flex align-items-center justify-content-between flex-wrap gap-2">
    <div class="d-flex align-items-center">
        <i class="bi bi-people-fill fs-4 text-warning me-2"></i>
        <span class="small font-weight-bold">Anda memiliki {{ $myAthletes->count() }} anak terdaftar di Superseed Academy. Pilih profil anak:</span>
    </div>
    <form action="{{ route('wali.dashboard') }}" method="GET" class="d-flex gap-2">
        <select name="child_id" class="form-select form-select-sm" onchange="this.form.submit()">
            @foreach($myAthletes as $child)
                <option value="{{ $child->id }}" {{ ($athlete && $athlete->id == $child->id) ? 'selected' : '' }}>
                    {{ $child->nama }} (U-{{ $child->nomor_punggung ?? 'XX' }})
                </option>
            @endforeach
        </select>
    </form>
</div>
@endif

@if(!$athlete)
<div class="alert alert-warning text-center p-5 card-custom">
    <i class="bi bi-exclamation-circle fs-1 d-block mb-2 text-warning"></i>
    <h5 class="font-weight-bold">Belum Ada Data Anak Terhubung</h5>
    <p class="text-muted mb-0">Akun Anda belum dikaitkan dengan data atlet manapun oleh Admin. Silahkan hubungi sekretariat admin Superseed Academy.</p>
</div>
@else
<div class="row g-4">
    <!-- Kolom Kiri: Kartu Profil & Biodata Siswa -->
    <div class="col-md-5 col-lg-4">
        <div class="card card-custom p-4 text-center border-top border-4 border-success">
            <div class="position-relative d-inline-block mx-auto mb-3">
                @if($athlete->foto)
                    <img src="{{ asset('storage/' . $athlete->foto) }}" class="rounded-circle shadow" width="130" height="130" style="object-fit: cover;">
                @else
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($athlete->nama) }}&background=047857&color=fff&size=256" class="rounded-circle shadow" width="130" height="130">
                @endif
                <span class="position-absolute bottom-0 end-0 badge badge-posisi p-2 border border-white">
                    #{{ $athlete->nomor_punggung ?? '-' }}
                </span>
            </div>

            <h5 class="font-weight-bold text-dark mb-1">{{ $athlete->nama }}</h5>
            <span class="badge bg-success bg-opacity-10 text-success mb-3 px-3 py-1 font-weight-bold">
                {{ $athlete->posisi_bermain ?? 'Siswa Superseed' }}
            </span>

            <ul class="list-group list-group-flush text-start small mt-2">
                <li class="list-group-item px-0 d-flex justify-content-between">
                    <span class="text-muted">Tanggal Lahir</span>
                    <strong>{{ $athlete->tanggal_lahir ? \Carbon\Carbon::parse($athlete->tanggal_lahir)->format('d M Y') : '-' }}</strong>
                </li>
                <li class="list-group-item px-0 d-flex justify-content-between">
                    <span class="text-muted">Nomor WA Siswa</span>
                    <strong>{{ $athlete->nomor_wa ?: '-' }}</strong>
                </li>
                <li class="list-group-item px-0 d-flex justify-content-between">
                    <span class="text-muted">Nomor WA Orang Tua</span>
                    <strong class="text-success">{{ $athlete->nomor_wa_ortu }}</strong>
                </li>
                <li class="list-group-item px-0 pt-2">
                    <span class="text-muted d-block mb-1">Alamat Domisili:</span>
                    <strong class="text-dark d-block">{{ $athlete->alamat ?: '-' }}</strong>
                </li>
            </ul>

            <div class="mt-4 pt-3 border-top d-flex gap-2">
                <a href="{{ route('wali.absensi', ['child_id' => $athlete->id]) }}" class="btn btn-outline-success btn-sm w-50 font-weight-bold">
                    <i class="bi bi-calendar-check me-1"></i> Absensi
                </a>
                <a href="{{ route('wali.raport', ['child_id' => $athlete->id]) }}" class="btn btn-outline-success btn-sm w-50 font-weight-bold">
                    <i class="bi bi-award-fill me-1"></i> Raport
                </a>
            </div>
        </div>
    </div>

    <!-- Kolom Kanan: Pengumuman Terbaru & Info Latihan -->
    <div class="col-md-7 col-lg-8">
        <div class="card card-custom p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                <h6 class="font-weight-bold mb-0 text-dark"><i class="bi bi-megaphone-fill text-warning me-2"></i>Pengumuman Terbaru Akademi</h6>
                <a href="{{ route('wali.pengumuman') }}" class="text-xs text-success text-decoration-none font-weight-bold">Lihat Semua &rarr;</a>
            </div>

            <div class="space-y-3">
                @forelse($announcements as $info)
                <div class="p-3 bg-light rounded border mb-3 hover-shadow transition">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="badge bg-success text-xs">Informasi Resmi</span>
                        <small class="text-muted text-xs"><i class="bi bi-clock me-1"></i>{{ \Carbon\Carbon::parse($info->tanggal)->format('d M Y') }}</small>
                    </div>
                    <h6 class="font-weight-bold text-dark mt-1 mb-1">{{ $info->judul }}</h6>
                    <p class="text-muted small mb-0" style="white-space: pre-line;">{{ Str::limit($info->konten, 180) }}</p>
                </div>
                @empty
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-inbox fs-2 d-block mb-1"></i>
                    Belum ada pengumuman terbaru dari akademi.
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endif
@endsection