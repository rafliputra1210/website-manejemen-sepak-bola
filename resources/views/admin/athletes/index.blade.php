@extends('layouts.admin')
@section('title', 'Manajemen Data Atlet & Akun Wali Murid')

@section('content')
<div class="card card-custom bg-white p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="mb-1 font-weight-bold">Daftar Atlet Superseed Academy</h5>
            <p class="text-muted small mb-0">Kelola biodata siswa sekaligus pantau akun akses portal orang tua/wali.</p>
        </div>
        <a href="{{ route('admin.athletes.create') }}" class="btn btn-primary btn-sm font-weight-bold">
            <i class="bi bi-plus-circle me-1"></i> Tambah Siswa & Akun Wali
        </a>
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
                        <form action="{{ route('admin.athletes.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data siswa ini?');">
                            <a href="{{ route('admin.athletes.edit', $item->id) }}" class="btn btn-sm btn-outline-warning me-1" title="Edit & Reset Password"><i class="bi bi-pencil-square"></i></a>
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus"><i class="bi bi-trash"></i></button>
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
@endsection