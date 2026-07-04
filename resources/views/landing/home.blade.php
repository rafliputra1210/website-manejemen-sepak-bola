@extends('layouts.landing')

@section('title', 'Beranda')

@section('content')
<div class="bg-gradient-to-r from-emerald-900 to-emerald-700 text-white py-20 px-4 text-center">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl md:text-6xl font-extrabold mb-4 uppercase tracking-tight">
            Wujudkan Mimpi Menjadi Atlet Profesional
        </h1>
        <p class="text-lg md:text-xl text-emerald-100 mb-8">
            Selamat datang di Superseed Academy. Pusat pembinaan sepak bola usia dini dan muda dengan kurikulum modern dan pelatih berlisensi.
        </p>
        <a href="{{ route('landing.registration') }}" class="bg-amber-500 hover:bg-amber-600 text-white font-bold px-8 py-3 rounded-lg text-lg shadow-lg transition transform hover:-translate-y-0.5">
            Gabung Bersama Kami
        </a>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-16 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
            <div class="text-3xl mb-3">🏆</div>
            <h3 class="font-bold text-xl mb-2 text-gray-900">Prestasi Terbukti</h3>
            <p class="text-gray-600 text-sm">Fokus pada pengembangan bakat anak hingga menorehkan prestasi di tingkat regional maupun nasional.</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
            <div class="text-3xl mb-3">👨‍🏫</div>
            <h3 class="font-bold text-xl mb-2 text-gray-900">Coach Berlisensi</h3>
            <p class="text-gray-600 text-sm">Dilatih langsung oleh para praktisi dan pelatih profesional yang berlisensi resmi.</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
            <div class="text-3xl mb-3">📅</div>
            <h3 class="font-bold text-xl mb-2 text-gray-900">Jadwal Terstruktur</h3>
            <p class="text-gray-600 text-sm">Kurikulum latihan yang terukur untuk menyesuaikan perkembangan fisik dan taktik siswa.</p>
        </div>
    </div>
</div>
@endsection