@extends('layouts.landing')

@section('title', 'Galeri Kegiatan & Latihan')

@section('content')
<div class="bg-emerald-900 text-white py-12 px-4 text-center">
    <h1 class="text-3xl md:text-4xl font-bold uppercase tracking-wide">Galeri Dokumentasi</h1>
    <p class="text-emerald-200 mt-2">Arsip momen latihan rutin, kegiatan akademi, dan kebersamaan di lapangan</p>
</div>

<div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($galleries as $item)
        <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 group flex flex-col justify-between">
            <div class="h-56 bg-gray-200 overflow-hidden relative">
                <img src="{{ asset('storage/' . $item->foto_bukti) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-300" alt="Dokumentasi">
                <div class="absolute top-2 right-2 bg-black/60 text-white text-xs px-2 py-1 rounded backdrop-blur-sm">
                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                </div>
            </div>
            <div class="p-4 bg-white">
                <p class="font-bold text-sm text-gray-800 line-clamp-1">
                    Kegiatan Latihan: {{ $item->athlete->nama ?? 'Skuad Superseed' }}
                </p>
                <p class="text-xs text-emerald-700 font-semibold mt-1">
                    ⚽ Status: {{ ucfirst($item->status) }} | <span class="text-gray-400">{{ $item->kode_barcode }}</span>
                </p>
            </div>
        </div>
        @empty
        <div class="col-span-4 text-center py-16 bg-white rounded-xl border border-dashed border-gray-300">
            <div class="text-4xl mb-2">📸</div>
            <p class="text-gray-500 font-medium">Belum ada foto dokumentasi yang diunggah oleh Admin.</p>
            <p class="text-xs text-gray-400 mt-1">Foto bukti kegiatan pada sistem absensi admin akan otomatis muncul di sini.</p>
        </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $galleries->links() }}
    </div>
</div>
@endsection