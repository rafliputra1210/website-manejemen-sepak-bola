@extends('layouts.admin')
@section('title', 'Manajemen Uang Kas & Keuangan')

@section('content')
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card card-custom bg-success text-white p-3 shadow-sm border-0">
            <span class="text-xs text-uppercase opacity-75 font-weight-bold">Total Pemasukan</span>
            <h3 class="mb-0 mt-1 font-weight-bold">+ Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</h3>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-custom bg-danger text-white p-3 shadow-sm border-0">
            <span class="text-xs text-uppercase opacity-75 font-weight-bold">Total Pengeluaran</span>
            <h3 class="mb-0 mt-1 font-weight-bold">- Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</h3>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-custom bg-primary text-white p-3 shadow-sm border-0">
            <span class="text-xs text-uppercase opacity-75 font-weight-bold">Saldo Kas Saat Ini</span>
            <h3 class="mb-0 mt-1 font-weight-bold">Rp {{ number_format($saldoSekarang, 0, ',', '.') }}</h3>
        </div>
    </div>
</div>

<div class="card card-custom bg-white p-4 shadow-sm border-0">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
            <h5 class="mb-1 font-weight-bold text-dark"><i class="bi bi-wallet2 text-success me-2"></i>Buku Kas Superseed Academy</h5>
            <p class="text-muted small mb-0">Catatan alur pemasukan dan pengeluaran uang kas secara transparan.</p>
        </div>
        <a href="{{ route('admin.finances.create') }}" class="btn btn-primary btn-sm font-weight-bold px-3">
            <i class="bi bi-plus-circle me-1"></i> Catat Transaksi Baru
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle border text-sm">
            <thead class="table-light">
                <tr>
                    <th style="width: 120px;">Tanggal</th>
                    <th>Kategori & Keterangan</th>
                    <th class="text-center" style="width: 140px;">Jenis Arus</th>
                    <th class="text-end" style="width: 160px;">Nominal (Rp)</th>
                    <th class="text-end" style="width: 160px;">Saldo Akhir</th>
                    <th class="text-center" style="width: 80px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($finances as $item)
                <tr>
                    <td class="small text-nowrap"><i class="bi bi-calendar3 text-muted me-1"></i> {{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                    <td>
                        <strong class="text-dark d-block">{{ $item->kategori }}</strong>
                        <span class="text-muted small">{{ $item->keterangan ?: '-' }}</span>
                    </td>
                    <td class="text-center">
                        @if($item->jenis == 'pemasukan')
                            <span class="badge bg-success bg-opacity-10 text-success px-2 py-1"><i class="bi bi-arrow-down-left me-1"></i>Pemasukan</span>
                        @else
                            <span class="badge bg-danger bg-opacity-10 text-danger px-2 py-1"><i class="bi bi-arrow-up-right me-1"></i>Pengeluaran</span>
                        @endif
                    </td>
                    <td class="text-end font-weight-bold text-nowrap {{ $item->jenis == 'pemasukan' ? 'text-success' : 'text-danger' }}">
                        {{ $item->jenis == 'pemasukan' ? '+' : '-' }} Rp {{ number_format($item->nominal, 0, ',', '.') }}
                    </td>
                    <td class="text-end font-weight-bold text-dark bg-light text-nowrap">
                        Rp {{ number_format($item->saldo_akhir, 0, ',', '.') }}
                    </td>
                    <td class="text-center">
                        <form action="{{ route('admin.finances.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus riwayat transaksi ini?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center py-5 text-muted">Belum ada transaksi kas yang dicatat.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $finances->links() }}</div>
</div>
@endsection