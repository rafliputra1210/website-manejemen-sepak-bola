@extends('layouts.admin')
@section('title', 'Catat Transaksi Keuangan')

@section('content')
<div class="card card-custom bg-white p-4 max-w-xl">
    <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
        <h5 class="mb-0">Form Input Transaksi Uang Kas</h5>
        <a href="{{ route('admin.finances.index') }}" class="btn btn-sm btn-light border"><i class="bi bi-arrow-left"></i> Kembali</a>
    </div>

    <form action="{{ route('admin.finances.store') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label font-weight-bold">Tanggal Transaksi <span class="text-danger">*</span></label>
                <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label font-weight-bold">Jenis Arus Kas <span class="text-danger">*</span></label>
                <select name="jenis" class="form-select" required>
                    <option value="pemasukan">Pemasukan (Uang Masuk)</option>
                    <option value="pengeluaran">Pengeluaran (Uang Keluar)</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label font-weight-bold">Kategori <span class="text-danger">*</span></label>
                <select name="kategori" class="form-select" required>
                    <option value="Iuran Uang Kas Bulanan">Iuran Uang Kas Bulanan</option>
                    <option value="Pendaftaran Siswa Baru">Pendaftaran Siswa Baru</option>
                    <option value="Sewa Lapangan & Stadion">Sewa Lapangan & Stadion</option>
                    <option value="Honor Coach & Asisten">Honor Coach & Asisten</option>
                    <option value="Pembelian Peralatan Latihan">Pembelian Peralatan Latihan</option>
                    <option value="Donasi / Sponsorship">Donasi / Sponsorship</option>
                    <option value="Lain-lain">Lain-lain</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label font-weight-bold">Nominal (Rp) <span class="text-danger">*</span></label>
                <input type="number" name="nominal" class="form-control" required placeholder="Contoh: 150000" min="0">
            </div>
            <div class="col-md-12">
                <label class="form-label font-weight-bold">Keterangan / Catatan Tambahan</label>
                <textarea name="keterangan" class="form-control" rows="2" placeholder="Contoh: Pembayaran iuran bulan Juli atas nama Raditya..."></textarea>
            </div>
        </div>
        <div class="mt-4 pt-3 border-top d-flex justify-content-end">
            <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-1"></i> Simpan & Update Saldo</button>
        </div>
    </form>
</div>
@endsection