@extends('layouts.admin')
@section('title', 'Manajemen Data Atlet & Akun Wali Murid')

@section('content')
<div class="card card-custom bg-white p-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
            <h5 class="mb-1 font-weight-bold">Daftar Atlet Superseed Academy</h5>
            <p class="text-muted small mb-0">Kelola biodata siswa sekaligus pantau akun akses portal orang tua/wali.</p>
        </div>
        
        <!-- Kelompok Tombol Aksi -->
        <div class="d-flex gap-2">
            <!-- TOMBOL EKSPOR EXCEL -->
            <a href="{{ route('admin.athletes.export') }}" class="btn btn-success btn-sm font-weight-bold d-flex align-items-center gap-1 shadow-sm">
                <i class="bi bi-file-earmark-excel-fill fs-6"></i> Ekspor Excel (.xlsx)
            </a>

            <!-- TOMBOL IMPOR EXCEL -->
            <button type="button" class="btn btn-warning btn-sm font-weight-bold text-dark d-flex align-items-center gap-1 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalImportAthlete">
                <i class="bi bi-file-earmark-arrow-up-fill fs-6"></i> Upload / Impor Excel
            </button>

            <!-- TOMBOL TAMBAH DATA -->
            <a href="{{ route('admin.athletes.create') }}" class="btn btn-primary btn-sm font-weight-bold d-flex align-items-center gap-1 shadow-sm">
                <i class="bi bi-plus-circle me-1"></i> Tambah Siswa & Akun Wali
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle border text-sm">
            <thead class="table-light">
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Nama Siswa & Posisi</th>
                    <th class="text-center">No. Punggung</th>
                    <th>Tgl Lahir</th>
                    <th>Kontak WhatsApp</th>
                    <th style="background-color: #f0fdf4;">Akun Portal Wali Murid (Login)</th>
                    <th class="text-center" style="width: 130px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($athletes as $item)
                <tr>
                    <td class="text-center font-weight-bold">{{ $loop->iteration }}</td>
                    <td>
                        <div class="font-weight-bold text-dark">{{ $item->nama }}</div>
                        <span class="badge bg-secondary text-xs">{{ $item->posisi_bermain ?? 'Belum ditentukan' }}</span>
                    </td>
                    <td class="text-center"><span class="badge bg-dark fs-6">{{ $item->nomor_punggung ?? '-' }}</span></td>
                    <td class="small">{{ $item->tanggal_lahir ? \Carbon\Carbon::parse($item->tanggal_lahir)->format('d M Y') : '-' }}</td>
                    <td class="small">
                        <div><i class="bi bi-whatsapp text-success"></i> Ortu: <strong>{{ $item->nomor_wa_ortu }}</strong></div>
                        @if($item->nomor_wa) <div class="text-muted"><i class="bi bi-phone"></i> Siswa: {{ $item->nomor_wa }}</div> @endif
                    </td>
                    
                    <!-- KOLOM TAMPILAN KREDENSIAL LOGIN WALI MURID -->
                    <td style="background-color: #f8fafc;">
                        @if($item->user)
                            <div class="d-flex align-items-center">
                                <span class="badge bg-success me-2"><i class="bi bi-check-circle-fill"></i> Aktif</span>
                                <div>
                                    <div class="font-weight-bold text-dark small">{{ $item->user->name }}</div>
                                    <div class="text-xs text-muted">User: <code class="text-primary font-weight-bold">{{ $item->user->username }}</code></div>
                                </div>
                            </div>
                        @else
                            <span class="badge bg-danger"><i class="bi bi-x-circle"></i> Belum Punya Akun</span>
                            <a href="{{ route('admin.athletes.edit', $item->id) }}" class="d-block text-xs text-decoration-underline mt-1">Buatkan Akun</a>
                        @endif
                    </td>

                    <td class="text-center">
                        <a href="{{ route('admin.athletes.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('admin.athletes.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data siswa ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center py-4 text-muted">Belum ada data siswa yang terdaftar.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $athletes->links() }}</div>
</div>

<!-- MODAL POPUP UPLOAD EXCEL SISWA (Taruh di paling bawah sebelum endsection) -->
<div class="modal fade" id="modalImportAthlete" tabindex="-1" aria-labelledby="modalImportAthleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title font-weight-bold" id="modalImportAthleteLabel"><i class="bi bi-cloud-upload-fill me-2"></i>Upload File Excel Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.athletes.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="alert alert-info small mb-3">
                        <strong>💡 Aturan Upload:</strong>
                        <ul class="mb-0 pl-3 mt-1">
                            <li>Format file harus berakhiran <b>.xlsx</b>, <b>.xls</b>, atau <b>.csv</b>.</li>
                            <li>Baris pertama Excel harus berisi nama kolom (Header).</li>
                            <li>Sistem akan <b>otomatis membuatkan Akun Wali Murid</b> dari nama & tanggal lahir yang ada di file Excel!</li>
                        </ul>
                    </div>

                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Pilih File Excel dari Komputer <span class="text-danger">*</span></label>
                        <input type="file" name="file_excel" class="form-control" accept=".xlsx, .xls, .csv" required>
                    </div>

                    <!-- Panduan Nama Kolom Excel -->
                    <div class="p-3 bg-light rounded border text-xs">
                        <span class="font-weight-bold d-block mb-1 text-dark">Wajib gunakan nama kolom header ini di baris ke-1 Excel:</span>
                        <code class="text-primary font-weight-bold">nama_siswa</code>, 
                        <code class="text-dark">nomor_punggung</code>, 
                        <code class="text-dark">posisi_bermain</code>, 
                        <code class="text-primary font-weight-bold">tanggal_lahir</code> (YYYY-MM-DD), 
                        <code class="text-primary font-weight-bold">nomor_wa_ortu</code>, 
                        <code class="text-dark">nomor_wa_siswa</code>, 
                        <code class="text-dark">alamat</code>, 
                        <code class="text-dark">nama_orang_tua</code>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning font-weight-bold text-dark btn-sm px-4"><i class="bi bi-cloud-arrow-up-fill me-1"></i> Mulai Impor Data Sekarang</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection