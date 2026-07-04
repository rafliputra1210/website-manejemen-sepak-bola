@extends('layouts.wali')
@section('title', 'Rekapitulasi Absensi Anak')

@section('content')
@if(!$athlete)
    <div class="alert alert-warning text-center p-5 card-custom">Belum ada data anak terhubung dengan akun Anda.</div>
@else

@if($myAthletes->count() > 1)
<div class="mb-4 bg-white p-3 rounded shadow-sm d-flex align-items-center justify-content-between border flex-wrap gap-2">
    <span class="small font-weight-bold"><i class="bi bi-person-check-fill text-success me-2"></i>Menampilkan Absensi Latihan untuk: <strong>{{ $athlete->nama }}</strong></span>
    <form action="{{ route('wali.absensi') }}" method="GET" class="d-flex gap-2">
        <select name="child_id" class="form-select form-select-sm" onchange="this.form.submit()">
            @foreach($myAthletes as $child)
                <option value="{{ $child->id }}" {{ ($athlete->id == $child->id) ? 'selected' : '' }}>{{ $child->nama }} (U-{{ $child->nomor_punggung ?? 'XX' }})</option>
            @endforeach
        </select>
    </form>
</div>
@endif

<div class="card card-custom p-4 mb-4">
    <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
        <h6 class="font-weight-bold text-dark mb-0"><i class="bi bi-calendar-check-fill text-success me-2"></i>Rekapitulasi Kehadiran Latihan: <span class="text-primary">{{ $athlete->nama }}</span></h6>
        <span class="badge bg-light text-dark border">Posisi: {{ $athlete->posisi_bermain ?? 'Siswa' }}</span>
    </div>

    <div class="row g-3">
        <div class="col-6 col-md-3">
            <div class="p-3 bg-success text-white text-center rounded-3 shadow-sm">
                <span class="text-xs text-uppercase opacity-75 font-weight-bold d-block">Hadir Latihan</span>
                <h2 class="mb-0 mt-1 font-weight-bold">{{ $rekapAbsen['hadir'] }} <span class="fs-6">Kali</span></h2>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="p-3 bg-info text-dark text-center rounded-3 shadow-sm">
                <span class="text-xs text-uppercase opacity-75 font-weight-bold d-block">Izin</span>
                <h2 class="mb-0 mt-1 font-weight-bold">{{ $rekapAbsen['izin'] }} <span class="fs-6">Kali</span></h2>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="p-3 bg-warning text-dark text-center rounded-3 shadow-sm">
                <span class="text-xs text-uppercase opacity-75 font-weight-bold d-block">Sakit</span>
                <h2 class="mb-0 mt-1 font-weight-bold">{{ $rekapAbsen['sakit'] }} <span class="fs-6">Kali</span></h2>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="p-3 bg-danger text-white text-center rounded-3 shadow-sm">
                <span class="text-xs text-uppercase opacity-75 font-weight-bold d-block">Alpa (Tanpa Keterangan)</span>
                <h2 class="mb-0 mt-1 font-weight-bold">{{ $rekapAbsen['alpa'] }} <span class="fs-6">Kali</span></h2>
            </div>
        </div>
    </div>
</div>

<div class="card card-custom p-4">
    <h6 class="font-weight-bold mb-3 text-dark"><i class="bi bi-clock-history text-success me-2"></i>Riwayat Kehadiran Harian</h6>
    
    <div class="table-responsive">
        <table class="table table-hover align-middle border text-sm">
            <thead class="table-light">
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Tanggal Latihan</th>
                    <th class="text-center">Status Kehadiran</th>
                    <th>Kode Barcode Bukti</th>
                </tr>
            </thead>
            <tbody>
                @forelse($attendances as $absen)
                <tr>
                    <td class="text-center font-weight-bold">{{ $loop->iteration }}</td>
                    <td class="font-weight-bold text-dark">
                        <i class="bi bi-calendar3 text-muted me-2"></i>{{ \Carbon\Carbon::parse($absen->tanggal)->format('d F Y') }}
                    </td>
                    <td class="text-center">
                        @if($absen->status == 'hadir') <span class="badge bg-success px-3 py-1 font-weight-bold">Hadir di Lapangan</span>
                        @elseif($absen->status == 'izin') <span class="badge bg-info text-dark px-3 py-1 font-weight-bold">Izin</span>
                        @elseif($absen->status == 'sakit') <span class="badge bg-warning text-dark px-3 py-1 font-weight-bold">Sakit</span>
                        @else <span class="badge bg-danger px-3 py-1 font-weight-bold">Alpa</span> @endif
                    </td>
                    <td>
                        <code class="text-xs bg-light px-2 py-1 border rounded text-dark font-weight-bold">{{ $absen->kode_barcode }}</code>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-5 text-muted">
                        <i class="bi bi-folder2-open fs-2 d-block mb-1"></i>
                        Belum ada riwayat absensi yang dicatat oleh pelatih/admin.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $attendances->links() }}</div>
</div>
@endif
@endsection