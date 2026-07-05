@extends('layouts.landing')
@section('title', 'Galeri Kegiatan | Superseed Academy')

@section('content')
<section class="py-20 bg-slate-50 border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-in">
        <h1 class="text-3xl md:text-5xl font-black text-brand-navy mb-4 tracking-tight">Galeri Kegiatan</h1>
        <p class="text-slate-600 text-lg max-w-2xl mx-auto">
            Momen-momen berharga dalam setiap sesi latihan dan turnamen yang terekam kamera.
        </p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
            @forelse($galleries as $gallery)
            <div class="group relative aspect-square overflow-hidden rounded-xl bg-slate-100 fade-in border border-slate-200">
                <img src="{{ asset('storage/' . $gallery->foto_bukti) }}" alt="Kegiatan" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-brand-navy/80 via-brand-navy/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                    <span class="text-white font-bold text-sm">{{ $gallery->athlete->nama ?? 'Siswa' }}</span>
                    <span class="text-brand-light text-xs">{{ $gallery->tanggal ?? $gallery->created_at->format('d M Y') }}</span>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-16 bg-slate-50 rounded-xl border border-slate-100">
                <i class="bi bi-images text-4xl text-slate-300 mb-3"></i>
                <p class="text-slate-500">Galeri foto belum tersedia.</p>
            </div>
            @endforelse
        </div>
        
        @if(isset($galleries) && $galleries->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $galleries->links('pagination::tailwind') }}
        </div>
        @endif
    </div>
</section>
@endsection