@extends('layouts.admin')
@section('title', 'Kelola Pengumuman')

@section('content')
<div class="card card-custom bg-white p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="mb-1 font-weight-bold">Pengumuman Sekolah Sepak Bola</h5>
            <p class="text-muted small mb-0">Pesan yang diterbitkan di sini akan dapat dibaca oleh seluruh Orang Tua/Wali Murid.</p>
        </div>
        <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-megaphone me-1"></i> Buat Pengumuman Baru
        </a>
    </div>

    <div class="row g-3">
        @forelse($announcements as $item)
        <div class="col-md-6">
            <div class="card border h-100 p-3 shadow-sm">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <span class="badge {{ $item->is_active ? 'bg-success' : 'bg-secondary' }}">
                        {{ $item->is_active ? 'Aktif / Tayang' : 'Diarsipkan' }}
                    </span>
                    <small class="text-muted"><i class="bi bi-calendar3"></i> {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</small>
                </div>
                <h6 class="font-weight-bold text-dark mt-1">{{ $item->judul }}</h6>
                <p class="text-muted small mb-3 flex-grow-1" style="white-space: pre-line;">{{ Str::limit($item->konten, 150) }}</p>
                <div class="border-top pt-2 text-end">
                    <form action="{{ route('admin.announcements.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus pengumuman ini?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash me-1"></i> Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5 text-muted">Belum ada pengumuman yang dibuat.</div>
        @endforelse
    </div>
    <div class="mt-4">{{ $announcements->links() }}</div>
</div>
@endsection