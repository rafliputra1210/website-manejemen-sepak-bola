@extends('layouts.admin')
@section('title', 'Manajemen Raport & Prestasi')

@section('content')
<div class="card card-custom bg-white p-4 shadow-sm border-0">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
            <h5 class="mb-1 font-weight-bold text-dark"><i class="bi bi-award-fill text-warning me-2"></i>Raport Evaluasi & Prestasi Siswa</h5>
            <p class="text-muted small mb-0">Rekapitulasi nilai teknik, stamina fisik, progres skill, hingga apresiasi juara.</p>
        </div>
        <a href="{{ route('admin.reports.create') }}" class="btn btn-primary btn-sm font-weight-bold px-3">
            <i class="bi bi-plus-circle me-1"></i> Input Raport Baru
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle border text-sm">
            <thead class="table-light">
                <tr>
                    <th style="width: 140px;">Periode</th>
                    <th>Nama Atlet & Posisi</th>
                    <th style="width: 220px;">Rata-rata Nilai</th>
                    <th>Progres & Prestasi Terkini</th>
                    <th class="text-center" style="width: 80px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reports as $item)
                @php 
                    $nilai = json_decode($item->daftar_nilai, true) ?? []; 
                    $avg = count($nilai) > 0 ? round(array_sum($nilai) / count($nilai)) : 0;
                @endphp
                <tr>
                    <td><span class="badge bg-dark fs-6 px-3 py-1 font-weight-bold">{{ $item->periode }}</span></td>
                    <td>
                        <strong class="text-dark d-block">{{ $item->athlete->nama ?? 'Siswa Dihapus' }}</strong>
                        <span class="badge bg-secondary text-xs">U-{{ $item->athlete->nomor_punggung ?? 'XX' }} | {{ $item->athlete->posisi_bermain ?? '-' }}</span>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge {{ $avg >= 80 ? 'bg-success' : 'bg-warning text-dark' }} fs-6 px-2 py-1">{{ $avg }} / 100</span>
                            <small class="text-muted text-xs">(Teknik: {{ $nilai['Teknik & Dribbling'] ?? 0 }}, Fisik: {{ $nilai['Fisik & Stamina'] ?? 0 }})</small>
                        </div>
                    </td>
                    <td>
                        <div class="small"><strong>📈 Progres:</strong> {{ Str::limit($item->progres_skill ?: 'Stabil', 45) }}</div>
                        <div class="small text-success"><strong>🏅 Prestasi:</strong> {{ Str::limit($item->prestasi ?: '-', 45) }}</div>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('admin.reports.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus raport ini?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center py-5 text-muted">Belum ada data raport yang diinput.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $reports->links() }}</div>
</div>
@endsection