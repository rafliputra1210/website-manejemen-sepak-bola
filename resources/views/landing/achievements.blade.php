@extends('layouts.landing')

@section('title', 'Prestasi Akademi & Siswa')

@section('content')
<div class="bg-emerald-900 text-white py-12 px-4 text-center">
    <h1 class="text-3xl md:text-4xl font-bold uppercase tracking-wide">Prestasi & Bangga</h1>
    <p class="text-emerald-200 mt-2">Membangun kebanggaan melalui prestasi di lapangan hijau maupun di bangku sekolah</p>
</div>

<div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
    <div class="mb-16">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-amber-500 pl-3">🏆 Prestasi Turnamen Sepak Bola</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 flex flex-col justify-between">
                <div>
                    <span class="text-xs font-semibold bg-amber-100 text-amber-800 px-3 py-1 rounded-full uppercase tracking-wider">Tahun 2025</span>
                    <h3 class="font-bold text-lg text-gray-900 mt-3 mb-2">Juara 1 Soeratin Cup U-15 Tingkat Regional</h3>
                    <p class="text-gray-600 text-sm">Tim U-15 Superseed Academy berhasil menorehkan rekor tidak terkalahkan sepanjang turnamen berlangsung.</p>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100 text-xs text-gray-400 font-semibold">
                    📍 diselenggarakan di Malang
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 flex flex-col justify-between">
                <div>
                    <span class="text-xs font-semibold bg-gray-100 text-gray-800 px-3 py-1 rounded-full uppercase tracking-wider">Tahun 2025</span>
                    <h3 class="font-bold text-lg text-gray-900 mt-3 mb-2">Runner Up Liga Anak Nusantara U-12</h3>
                    <p class="text-gray-600 text-sm">Perjuangan sengit tim U-12 membawa pulang piala perak dalam ajang kompetisi bergengsi tingkat provinsi.</p>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100 text-xs text-gray-400 font-semibold">
                    📍 diselenggarakan di Surabaya
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 flex flex-col justify-between">
                <div>
                    <span class="text-xs font-semibold bg-amber-100 text-amber-800 px-3 py-1 rounded-full uppercase tracking-wider">Tahun 2024</span>
                    <h3 class="font-bold text-lg text-gray-900 mt-3 mb-2">Juara 3 Festival Grassroots U-10</h3>
                    <p class="text-gray-600 text-sm">Ajang pengembangan mental tanding perdana bagi siswa usia dini dengan hasil yang sangat membanggakan.</p>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100 text-xs text-gray-400 font-semibold">
                    📍 diselenggarakan di Sidoarjo
                </div>
            </div>
        </div>
    </div>

    <div>
        <h2 class="text-2xl font-bold text-gray-900 mb-2 border-l-4 border-emerald-600 pl-3">🎓 Prestasi Akademik & Sekolah Siswa</h2>
        <p class="text-gray-600 text-sm mb-6 pl-4">Kami sangat mendukung pendidikan formal. Berikut adalah apresiasi bagi atlet kami yang juga berprestasi di sekolahnya:</p>
        
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Nama Atlet</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Kelompok Usia</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Asal Sekolah</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Prestasi Akademik / Non-Akademik</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 font-semibold text-gray-900">Muhammad Davi</td>
                        <td class="px-6 py-4 text-gray-600">U-15</td>
                        <td class="px-6 py-4 text-gray-600">SMP Negeri 1 Malang</td>
                        <td class="px-6 py-4"><span class="bg-emerald-50 text-emerald-700 font-medium px-3 py-1 rounded text-sm">Juara 1 Olimpiade Matematika Tingkat Kota 2025</span></td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 font-semibold text-gray-900">Raditya Pratama</td>
                        <td class="px-6 py-4 text-gray-600">U-12</td>
                        <td class="px-6 py-4 text-gray-600">SD Negeri Percobaan</td>
                        <td class="px-6 py-4"><span class="bg-emerald-50 text-emerald-700 font-medium px-3 py-1 rounded text-sm">Peringkat 1 Paralel Nilai Rapor Semester Genap</span></td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 font-semibold text-gray-900">Satria Wibowo</td>
                        <td class="px-6 py-4 text-gray-600">U-17</td>
                        <td class="px-6 py-4 text-gray-600">SMA Negeri 3 Malang</td>
                        <td class="px-6 py-4"><span class="bg-emerald-50 text-emerald-700 font-medium px-3 py-1 rounded text-sm">Lolos Seleksi Pertukaran Pelajar Antar-Provinsi</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection