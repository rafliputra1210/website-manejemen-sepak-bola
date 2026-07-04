@extends('layouts.admin')
@section('title', 'Manajemen Raport & Evaluasi')

@section('content')
<div class="card card-custom bg-white p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="mb-1 font-weight-bold">Raport Evaluasi Perkembangan Atlet</h5>
            <p class="text-muted small mb-0">Rekapitulasi nilai teknik, stamina fisik, dan catatan pelatih per semester.</p>
        </div>
        <a href="{{ route('admin.reports.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-award me-1"></i> Input Raport Baru
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle border text-sm">
            <thead class="table-light">
                <tr>
                    <th>Periode</th>
                    <th>Nama Atlet</th>
                    <th>Daftar Nilai (Rata-rata)</th>
                    <th>Progres & Prestasi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reports as $item)
                @php 
                    $nilai = json_decode($item->daftar_nilai, true) ?? []; 
                    $avg = count($nilai) > 0 ? round(array_sum($nilai) / count($nilai)) : 0;
                @endphp
                <tr>
                    <td class="font-weight-bold"><span class="badge bg-dark">{{ $item->periode }}</span></td>
                    <td>
                        <strong class="text-dark">{{ $item->athlete->nama ?? 'Siswa' }}</strong>
                        <div class="text-xs text-muted">Posisi: {{ $item->athlete->posisi_bermain ?? '-' }}</div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge {{ $avg >= 80 ? 'bg-success' : 'bg-warning text-dark' }} fs-6">{{ $avg }} / 100</span>
                            <small class="text-muted">(Teknik: {{ $nilai['Teknik & Dribbling'] ?? 0 }}, Fisik: {{ $nilai['Fisik & Stamina'] ?? 0 }})</small>
                        </div>
                    </td>
                    <td>
                        <div class="small"><strong>Progres:</strong> {{ Str::limit($item->progres_skill ?: 'Stabil', 40) }}</div>
                        <div class="small text-success"><strong>Prestasi:</strong> {{ Str::limit($item->prestasi ?: '-', 40) }}</div>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('admin.reports.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus raport ini?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center py-4 text-muted">Belum ada data raport yang diinput.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $reports->links() }}</div>
</div>
@endsection