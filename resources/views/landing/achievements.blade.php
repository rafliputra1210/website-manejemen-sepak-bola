@extends('layouts.landing')

@section('title', 'Prestasi Akademi & Siswa')

@section('content')
<div class="bg-emerald-900 text-white py-12 px-4 text-center">
    <h1 class="text-3xl md:text-4xl font-bold uppercase tracking-wide">Prestasi & Kebanggaan</h1>
    <p class="text-emerald-200 mt-2">Mencatat jejak keunggulan siswa Superseed Academy di lapangan hijau maupun di sekolah</p>
</div>

<div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-2 border-l-4 border-amber-500 pl-3">🏆 Daftar Prestasi Atlet & Siswa</h2>
    <p class="text-gray-600 text-sm mb-6 pl-4">Berikut adalah prestasi yang dicatatkan oleh pelatih resmi dalam database evaluasi dan raport siswa:</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($reportsWithAchievements as $item)
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 flex flex-col justify-between hover:border-amber-400 transition">
            <div>
                <div class="flex justify-between items-center mb-3">
                    <span class="text-xs font-semibold bg-amber-100 text-amber-800 px-3 py-1 rounded-full uppercase tracking-wider">
                        {{ $item->periode }}
                    </span>
                    <span class="text-xs font-bold text-emerald-700 bg-emerald-50 px-2 py-1 rounded">
                        Posisi: {{ $item->athlete->posisi_bermain ?? 'Siswa' }}
                    </span>
                </div>

                <h3 class="font-bold text-lg text-gray-900 mt-2 mb-1">
                    {{ $item->athlete->nama ?? 'Atlet Superseed' }} 
                    <span class="text-xs font-normal text-gray-500">(U-{{ $item->athlete->nomor_punggung ?? 'XX' }})</span>
                </h3>
                
                <div class="mt-3 p-3 bg-amber-50/50 rounded-lg border border-amber-100">
                    <p class="text-xs font-bold text-amber-900 uppercase mb-1">🏅 Detail Prestasi:</p>
                    <p class="text-gray-700 text-sm font-medium whitespace-pre-line">{{ $item->prestasi }}</p>
                </div>
            </div>

            <div class="mt-4 pt-4 border-t border-gray-100 text-xs text-gray-400 flex justify-between items-center">
                <span>⚡ Progres: {{ Str::limit($item->progres_skill ?: 'Konsisten', 25) }}</span>
                <span> Tercatat di Raport</span>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-12 bg-white rounded-xl border border-dashed border-gray-300">
            <p class="text-gray-400 font-medium">Belum ada catatan prestasi siswa yang diunggah.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection