@extends('layouts.admin')
@section('title', 'Manajemen Data Coach & Pelatih')

@section('content')
<div class="card card-custom bg-white p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="mb-1 font-weight-bold">Daftar Coach Superseed Academy</h5>
            <p class="text-muted small mb-0">Kelola status lisensi, referensi kepelatihan, dan nomor kontak pelatih.</p>
        </div>
        <a href="{{ route('admin.coaches.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i> Tambah Coach Baru
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle border">
            <thead class="table-light">
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Nama Coach</th>
                    <th>Status & Lisensi</th>
                    <th>Referensi / Pengalaman</th>
                    <th>Kontak WA</th>
                    <th class="text-center" style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($coaches as $item)
                <tr>
                    <td class="text-center font-weight-bold">{{ $loop->iteration }}</td>
                    <td>
                        <div class="d-flex items-center">
                            @if($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" class="rounded-circle me-2" width="40" height="40" style="object-fit: cover;">
                            @else
                                <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;"><i class="bi bi-person"></i></div>
                            @endif
                            <div>
                                <div class="font-weight-bold text-dark">{{ $item->nama }}</div>
                                <span class="text-muted small">{{ Str::limit($item->alamat, 25) }}</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        @if($item->status_lisensi == 'berlisensi')
                            <span class="badge bg-success"><i class="bi bi-patch-check-fill me-1"></i> Berlisensi</span>
                            <div class="small font-weight-bold mt-1 text-dark">{{ $item->detail_lisensi ?? 'Lisensi Resmi' }}</div>
                        @else
                            <span class="badge bg-secondary">Tidak Berlisensi / Asisten</span>
                        @endif
                    </td>
                    <td>
                        <p class="small text-muted mb-0" style="max-width: 250px; white-space: normal;">
                            {{ $item->referensi ?: '-' }}
                        </p>
                    </td>
                    <td>
                        <a href="https://wa.me/{{ preg_replace('/^0/', '62', $item->nomor_wa) }}" target="_blank" class="btn btn-sm btn-outline-success">
                            <i class="bi bi-whatsapp"></i> {{ $item->nomor_wa ?: '-' }}
                        </a>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('admin.coaches.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data coach ini?');">
                            <a href="{{ route('admin.coaches.edit', $item->id) }}" class="btn btn-sm btn-outline-warning me-1" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">Belum ada data coach yang terdaftar.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $coaches->links() }}</div>
</div>
@endsection