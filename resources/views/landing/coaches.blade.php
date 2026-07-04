@extends('layouts.landing')

@section('title', 'Profil Coach & Akademi')

@section('content')
<div class="bg-emerald-900 text-white py-12 px-4 text-center">
    <h1 class="text-3xl md:text-4xl font-bold uppercase tracking-wide">Profil Coach & Akademi</h1>
    <p class="text-emerald-200 mt-2">Mengenal lebih dekat filosofi dan sosok di balik Superseed Academy</p>
</div>

<div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mb-12">
        <h2 class="text-2xl font-bold text-gray-900 mb-4 border-l-4 border-amber-500 pl-3">Tentang Superseed Academy</h2>
        <p class="text-gray-600 leading-relaxed mb-4">
            Superseed Academy didirikan dengan visi untuk mencetak bibit-bibit unggul sepak bola Indonesia yang tidak hanya memiliki ketrampilan teknis dan taktis di lapangan, tetapi juga menjunjung tinggi nilai sportivitas, kedisiplinan, dan keunggulan akademik. 
        </p>
        <p class="text-gray-600 leading-relaxed">
            Kami menerapkan kurikulum pembinaan modern yang disesuaikan dengan kelompok umur, didukung oleh fasilitas latihan yang memadai dan tim pelatih yang berdedikasi serta berpengalaman di level nasional maupun regional.
        </p>
    </div>

    <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-emerald-600 pl-3">Tim Pelatih (Coaches)</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition">
            <div class="h-64 bg-gray-200 flex items-center justify-center text-gray-400 text-5xl">
                👨‍🏫 </div>
            <div class="p-6">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="font-bold text-xl text-gray-900">Coach Ahmad Santoso</h3>
                    <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold px-2.5 py-0.5 rounded-full border border-emerald-300">
                        Lisensi AFC B
                    </span>
                </div>
                <p class="text-sm text-amber-600 font-medium mb-4">Head Coach U-15 & U-17</p>
                <div class="border-t border-gray-100 pt-3">
                    <p class="text-xs text-gray-500 font-semibold uppercase mb-1">Referensi & Pengalaman:</p>
                    <ul class="text-sm text-gray-600 list-disc list-inside space-y-1">
                        <li>Mantan Pemain Liga 2 Indonesia</li>
                        <li>Pelatih Kepala Tim Popda 2024</li>
                        <li>Sertifikasi Kepelatihan PSSI 2022</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition">
            <div class="h-64 bg-gray-200 flex items-center justify-center text-gray-400 text-5xl">
                👨‍🏫
            </div>
            <div class="p-6">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="font-bold text-xl text-gray-900">Coach Budi Pratama</h3>
                    <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold px-2.5 py-0.5 rounded-full border border-emerald-300">
                        Lisensi PSSI D
                    </span>
                </div>
                <p class="text-sm text-amber-600 font-medium mb-4">Pelatih Fisik & U-12</p>
                <div class="border-t border-gray-100 pt-3">
                    <p class="text-xs text-gray-500 font-semibold uppercase mb-1">Referensi & Pengalaman:</p>
                    <ul class="text-sm text-gray-600 list-disc list-inside space-y-1">
                        <li>Lulusan S1 Pendidikan Kepelatihan Olahraga</li>
                        <li>Asisten Pelatih Akademi Junior (3 Tahun)</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition">
            <div class="h-64 bg-gray-200 flex items-center justify-center text-gray-400 text-5xl">
                👨‍🏫
            </div>
            <div class="p-6">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="font-bold text-xl text-gray-900">Coach Rizky Ramadhan</h3>
                    <span class="bg-gray-100 text-gray-700 text-xs font-semibold px-2.5 py-0.5 rounded-full border border-gray-300">
                        Non-Lisensi (Asisten)
                    </span>
                </div>
                <p class="text-sm text-amber-600 font-medium mb-4">Asisten Pelatih U-10</p>
                <div class="border-t border-gray-100 pt-3">
                    <p class="text-xs text-gray-500 font-semibold uppercase mb-1">Referensi & Pengalaman:</p>
                    <ul class="text-sm text-gray-600 list-disc list-inside space-y-1">
                        <li>Pemain Aktif Turnamen Antarklub Regional</li>
                        <li>Pembina Ekstrakulikuler Sepak Bola SD</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection