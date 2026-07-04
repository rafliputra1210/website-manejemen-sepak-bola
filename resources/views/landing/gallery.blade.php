@extends('layouts.landing')

@section('title', 'Galeri Kegiatan')

@section('content')
<div class="bg-emerald-900 text-white py-12 px-4 text-center">
    <h1 class="text-3xl md:text-4xl font-bold uppercase tracking-wide">Galeri Kegiatan</h1>
    <p class="text-emerald-200 mt-2">Dokumentasi momen latihan, pertandingan, dan kebersamaan keluarga besar Superseed Academy</p>
</div>

<div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
    <div class="flex flex-wrap justify-center gap-2 mb-8">
        <button class="bg-emerald-800 text-white px-5 py-2 rounded-full text-sm font-semibold shadow">Semua</button>
        <button class="bg-white hover:bg-gray-100 text-gray-700 border px-5 py-2 rounded-full text-sm font-semibold transition">Latihan Rutin</button>
        <button class="bg-white hover:bg-gray-100 text-gray-700 border px-5 py-2 rounded-full text-sm font-semibold transition">Turnamen</button>
        <button class="bg-white hover:bg-gray-100 text-gray-700 border px-5 py-2 rounded-full text-sm font-semibold transition">Kegiatan Sosial</button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 group">
            <div class="h-48 bg-gray-200 flex items-center justify-center text-gray-400 text-4xl group-hover:scale-105 transition duration-300">
                📸 </div>
            <div class="p-4">
                <p class="font-bold text-sm text-gray-800 line-clamp-1">Latihan Taktikal U-15</p>
                <p class="text-xs text-gray-500 mt-1">12 Mei 2026</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 group">
            <div class="h-48 bg-gray-200 flex items-center justify-center text-gray-400 text-4xl group-hover:scale-105 transition duration-300">
                ⚽
            </div>
            <div class="p-4">
                <p class="font-bold text-sm text-gray-800 line-clamp-1">Final Soeratin Cup 2025</p>
                <p class="text-xs text-gray-500 mt-1">20 November 2025</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 group">
            <div class="h-48 bg-gray-200 flex items-center justify-center text-gray-400 text-4xl group-hover:scale-105 transition duration-300">
                🏃‍♂️
            </div>
            <div class="p-4">
                <p class="font-bold text-sm text-gray-800 line-clamp-1">Tes Fisik Berkala Siswa U-17</p>
                <p class="text-xs text-gray-500 mt-1">15 April 2026</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 group">
            <div class="h-48 bg-gray-200 flex items-center justify-center text-gray-400 text-4xl group-hover:scale-105 transition duration-300">
                🏆
            </div>
            <div class="p-4">
                <p class="font-bold text-sm text-gray-800 line-clamp-1">Penyerahan Trofi Liga Nusantara</p>
                <p class="text-xs text-gray-500 mt-1">10 Agustus 2025</p>
            </div>
        </div>
    </div>
</div>
@endsection