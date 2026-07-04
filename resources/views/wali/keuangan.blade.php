@extends('layouts.wali')

@section('content')
<div class="card card-custom p-4 mb-4 bg-gradient text-white" style="background: linear-gradient(135deg, #064e3b 0%, #047857 100%);">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
        <div>
            <span class="text-uppercase text-xs tracking-wider opacity-75 font-weight-bold">Transparansi Keuangan Sekolah Sepak Bola</span>
            <h4 class="mb-0 mt-1 font-weight-bold">Laporan Uang Kas Superseed Academy</h4>
        </div>
        <div class="text-end">
            <span class="d-block text-xs opacity-75">Saldo Akhir Kas Akademi Saat Ini:</span>
            <h2 class="mb-0 font-weight-bold text-warning">Rp {{ number_format($saldoSekarang, 0, ',', '.') }}</h2>
        </div>
    </div>
</div>

<!-- Ringkasan Kas -->
<div class="row g-3 mb-4">
    <div class="col-md-6">
        <div class="card card-custom p-3 bg-white border-start border-4 border-success d-flex flex-row justify-content-between align-items-center">
            <div>
                <span class="text-xs text-muted font-weight-bold text-uppercase">Total Seluruh Pemasukan</span>
                <h4 class="mb-0 font-weight-bold text-success mt-1">+ Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</h4>
            </div>
            <i class="bi bi-arrow-down-left-circle-fill fs-1 text-success opacity-25"></i>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-custom p-3 bg-white border-start border-4 border-danger d-flex flex-row justify-content-between align-items-center">
            <div>
                <span class="text-xs text-muted font-weight-bold text-uppercase">Total Seluruh Pengeluaran</span>
                <h4 class="mb-0 font-weight-bold text-danger mt-1">- Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</h4>
            </div>
            <i class="bi bi-arrow-up-right-circle-fill fs-1 text-danger opacity-25"></i>
        </div>
    </div>
</div>

<!-- Tabel Transaksi Kas -->
<div class="card card-custom p-4">
    <h6 class="font-weight-bold mb-3 text-dark"><i class="bi bi-journal-text me-2 text-success"></i>Buku Riwayat Arus Kas (Terbuka & Transparan)</h6>
    
    <div class="table-responsive">
        <table class="table table-hover align-middle border text-sm">
            <thead class="table-light">
                <tr>
                    <th>Tanggal</th>
                    <th>Kategori / Keterangan</th>
                    <th class="text-center">Jenis</th>
                    <th class="text-end">Nominal</th>
                    <th class="text-end">Saldo Akhir</th>
                </tr>
            </thead>
            <tbody>
                @forelse($finances as $kas)
                <tr>
                    <td class="small text-nowrap">{{ \Carbon\Carbon::parse($kas->tanggal)->format('d M Y') }}</td>
                    <td>
                        <strong class="text-dark d-block">{{ $kas->kategori }}</strong>
                        <span class="text-muted small">{{ $kas->keterangan ?: '-' }}</span>
                    </td>
                    <td class="text-center">
                        @if($kas->jenis == 'pemasukan')
                            <span class="badge bg-success bg-opacity-10 text-success px-2 py-1"><i class="bi bi-arrow-down-left me-1"></i>Pemasukan</span>
                        @else
                            <span class="badge bg-danger bg-opacity-10 text-danger px-2 py-1"><i class="bi bi-arrow-up-right me-1"></i>Pengeluaran</span>
                        @endif
                    </td>
                    <td class="text-end font-weight-bold text-nowrap {{ $kas->jenis == 'pemasukan' ? 'text-success' : 'text-danger' }}">
                        {{ $kas->jenis == 'pemasukan' ? '+' : '-' }} Rp {{ number_format($kas->nominal, 0, ',', '.') }}
                    </td>
                    <td class="text-end font-weight-bold text-dark bg-light text-nowrap">
                        Rp {{ number_format($kas->saldo_akhir, 0, ',', '.') }}
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center py-5 text-muted">Belum ada catatan transaksi keuangan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $finances->links() }}</div>
</div>
@endsection