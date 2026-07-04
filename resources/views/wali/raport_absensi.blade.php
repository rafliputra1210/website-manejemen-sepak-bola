@extends('layouts.wali')

@section('content')
@if(!$athlete)
    <div class="alert alert-warning text-center p-5">Belum ada data anak terhubung.</div>
@else

<!-- Pilihan Anak -->
@if($myAthletes->count() > 1)
<div class="mb-4 bg-white p-3 rounded shadow-sm d-flex align-items-center justify-content-between border">
    <span class="small font-weight-bold"><i class="bi bi-person-check-fill text-success me-2"></i>Menampilkan Raport & Absensi untuk: <strong>{{ $athlete->nama }}</strong></span>
    <form action="{{ route('wali.raport.absensi') }}" method="GET">
        <select name="child_id" class="form-select form-select-sm" onchange="this.form.submit()">
            @foreach($myAthletes as $child)
                <option value="{{ $child->id }}" {{ ($athlete->id == $child->id) ? 'selected' : '' }}>{{ $child->nama }}</option>
            @endforeach
        </select>
    </form>
</div>
@endif

<!-- BAGIAN 1: REKAPITULASI ABSENSI -->
<h6 class="font-weight-bold text-dark mb-3"><i class="bi bi-calendar-check-fill text-success me-2"></i>Rekapitulasi Absensi Latihan: <strong>{{ $athlete->nama }}</strong></h6>
<div class="row g-2 mb-4">
    <div class="col-6 col-md-3">
        <div class="card card-custom p-3 bg-success text-white text-center">
            <span class="text-xs text-uppercase opacity-75 font-weight-bold">Hadir Latihan</span>
            <h3 class="mb-0 mt-1 font-weight-bold">{{ $rekapAbsen['hadir'] }} <span class="fs-6">Kali</span></h3>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card card-custom p-3 bg-info text-dark text-center">
            <span class="text-xs text-uppercase opacity-75 font-weight-bold">Izin</span>
            <h3 class="mb-0 mt-1 font-weight-bold">{{ $rekapAbsen['izin'] }} <span class="fs-6">Kali</span></h3>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card card-custom p-3 bg-warning text-dark text-center">
            <span class="text-xs text-uppercase opacity-75 font-weight-bold">Sakit</span>
            <h3 class="mb-0 mt-1 font-weight-bold">{{ $rekapAbsen['sakit'] }} <span class="fs-6">Kali</span></h3>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card card-custom p-3 bg-danger text-white text-center">
            <span class="text-xs text-uppercase opacity-75 font-weight-bold">Alpa (Tanpa Keterangan)</span>
            <h3 class="mb-0 mt-1 font-weight-bold">{{ $rekapAbsen['alpa'] }} <span class="fs-6">Kali</span></h3>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Tabel Riwayat Kehadiran -->
    <div class="col-lg-5">
        <div class="card card-custom p-4 h-100">
            <h6 class="font-weight-bold mb-3 border-bottom pb-2">Riwayat Kehadiran Terakhir</h6>
            <div class="table-responsive">
                <table class="table table-sm table-hover align-middle small">
                    <thead class="table-light">
                        <tr><th>Tanggal</th><th class="text-center">Status</th><th>Kode Barcode</th></tr>
                    </thead>
                    <tbody>
                        @forelse($attendances as $absen)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($absen->tanggal)->format('d/m/Y') }}</td>
                            <td class="text-center">
                                @if($absen->status == 'hadir') <span class="badge bg-success">Hadir</span>
                                @elseif($absen->status == 'izin') <span class="badge bg-info text-dark">Izin</span>
                                @elseif($absen->status == 'sakit') <span class="badge bg-warning text-dark">Sakit</span>
                                @else <span class="badge bg-danger">Alpa</span> @endif
                            </td>
                            <td><code class="text-xs bg-light px-1 border rounded">{{ $absen->kode_barcode }}</code></td>
                        </tr>
                        @empty
                        <tr><td colspan="3" class="text-center py-3 text-muted">Belum ada riwayat absensi.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-2">{{ $attendances->links() }}</div>
        </div>
    </div>

    <!-- BAGIAN 2: RAPORT EVALUASI ATLET -->
    <div class="col-lg-7">
        <div class="card card-custom p-4">
            <h6 class="font-weight-bold mb-3 border-bottom pb-2 text-dark"><i class="bi bi-award-fill text-warning me-2"></i>Raport & Evaluasi Perkembangan Skill</h6>
            
            @forelse($reports as $raport)
            @php $nilai = json_decode($raport->daftar_nilai, true) ?? []; @endphp
            <div class="p-4 bg-light rounded-3 border mb-4">
                <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                    <span class="badge bg-dark fs-6 px-3 py-1">{{ $raport->periode }}</span>
                    <small class="text-muted">Diterbitkan: {{ \Carbon\Carbon::parse($raport->created_at)->format('d M Y') }}</small>
                </div>

                <!-- Daftar Nilai -->
                <h6 class="font-weight-bold text-success small text-uppercase mb-2">A. Penilaian Parameter Aspek (Skala 10 - 100):</h6>
                <div class="row g-2 mb-3">
                    @foreach($nilai as $aspek => $skor)
                    <div class="col-6 col-md-3">
                        <div class="bg-white p-2 rounded border text-center">
                            <span class="d-block text-muted" style="font-size: 0.7rem;">{{ $aspek }}</span>
                            <strong class="fs-5 {{ $skor >= 80 ? 'text-success' : 'text-warning' }}">{{ $skor }}</strong>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Progres & Prestasi -->
                <div class="row g-3 small mb-3">
                    <div class="col-md-6">
                        <div class="bg-white p-3 rounded border h-100">
                            <strong class="text-dark d-block mb-1">📈 Progres Skill:</strong>
                            <p class="text-muted mb-0">{{ $raport->progres_skill ?: 'Konsisten mengikuti latihan rutin.' }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-white p-3 rounded border h-100">
                            <strong class="text-success d-block mb-1">🏅 Prestasi / Apresiasi:</strong>
                            <p class="text-muted mb-0">{{ $raport->prestasi ?: 'Belum ada catatan turnamen.' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Catatan Pelatih -->
                <div class="bg-warning bg-opacity-10 border-start border-4 border-warning p-3 rounded small">
                    <strong class="text-dark d-block mb-1"><i class="bi bi-chat-quote-fill text-warning me-1"></i> Catatan & Saran Pelatih:</strong>
                    <p class="mb-0 text-dark font-italic">"{{ $raport->catatan_pelatih ?: 'Pertahankan kedisiplinan berlatih.' }}"</p>
                </div>
            </div>
            @empty
            <div class="text-center py-5 text-muted border rounded bg-light">
                <i class="bi bi-folder-x fs-1 d-block mb-2 text-secondary"></i>
                Belum ada raport evaluasi yang diterbitkan pelatih untuk periode ini.
            </div>
            @endforelse
        </div>
    </div>
</div>
@endif
@endsection