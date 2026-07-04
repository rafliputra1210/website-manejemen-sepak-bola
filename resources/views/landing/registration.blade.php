@extends('layouts.landing')

@section('title', 'Informasi Pendaftaran')

@section('content')
<div class="bg-emerald-900 text-white py-12 px-4 text-center">
    <h1 class="text-3xl md:text-4xl font-bold uppercase tracking-wide">Informasi Pendaftaran Siswa Baru</h1>
    <p class="text-emerald-200 mt-2">Mari bergabung dan kembangkan potensi sepak bola anak Anda bersama Superseed Academy</p>
</div>

<div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="md:col-span-2 space-y-8">
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-amber-500 pl-3">Alur & Cara Pendaftaran</h2>
                <ol class="space-y-6">
                    <li class="flex items-start">
                        <span class="flex-shrink-0 bg-emerald-800 text-white font-bold rounded-full w-8 h-8 flex items-center justify-center mr-4 mt-0.5">1</span>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900">Siapkan Berkas Persyaratan</h3>
                            <p class="text-gray-600 text-sm mt-1">Siapkan salinan (fotokopi/scan) Akta Kelahiran, Kartu Keluarga (KK), Pas Foto terbaru ukuran 3x4 (2 lembar), serta Surat Keterangan Sehat dari dokter.</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 bg-emerald-800 text-white font-bold rounded-full w-8 h-8 flex items-center justify-center mr-4 mt-0.5">2</span>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900">Hubungi Admin / Datang ke Sekretariat</h3>
                            <p class="text-gray-600 text-sm mt-1">Konfirmasi pendaftaran melalui kontak WhatsApp resmi di bawah ini atau datang langsung ke sekretariat saat jam latihan berlangsung.</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 bg-emerald-800 text-white font-bold rounded-full w-8 h-8 flex items-center justify-center mr-4 mt-0.5">3</span>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900">Pembayaran Administrasi Awal & Penyerahan Jersey</h3>
                            <p class="text-gray-600 text-sm mt-1">Melakukan pembayaran biaya pendaftaran awal untuk mendapatkan 1 set Jersey latihan resmi, kaos kaki, dan ID Card siswa.</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 bg-emerald-800 text-white font-bold rounded-full w-8 h-8 flex items-center justify-center mr-4 mt-0.5">4</span>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900">Mengikuti Latihan Perdana & Assessment Skill</h3>
                            <p class="text-gray-600 text-sm mt-1">Siswa mengikuti latihan perdana untuk dilakukan penempatan kelas oleh Head Coach sesuai kemampuan dan kelompok usia.</p>
                        </div>
                    </li>
                </ol>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="text-xl font-bold text-gray-900 mb-4 border-b pb-3">Investasi Pembinaan</h3>
                <div class="space-y-4">
                    <div>
                        <p class="text-xs text-gray-500 uppercase font-semibold">Biaya Pendaftaran Awal</p>
                        <p class="text-2xl font-extrabold text-emerald-700">Rp 350.000</p>
                        <p class="text-xs text-gray-500 mt-0.5">*Sudah termasuk 1 Set Jersey Latihan & ID Card</p>
                    </div>
                    <div class="border-t pt-3">
                        <p class="text-xs text-gray-500 uppercase font-semibold">Iuran Bulanan / Uang Kas</p>
                        <p class="text-2xl font-extrabold text-gray-900">Rp 150.000 / <span class="text-sm font-normal text-gray-600">bulan</span></p>
                        <p class="text-xs text-gray-500 mt-0.5">*Fasilitas lapangan, air minum, dan honor pelatih</p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-emerald-800 to-emerald-950 text-white p-6 rounded-2xl shadow-lg text-center">
                <div class="text-4xl mb-3">💬</div>
                <h3 class="text-lg font-bold mb-2">Butuh Bantuan Pendaftaran?</h3>
                <p class="text-sm text-emerald-200 mb-6">Admin kami siap menjawab pertanyaan Anda mengenai persyaratan dan jadwal latihan.</p>
                <a href="https://wa.me/6281234567890" target="_blank" class="block w-full bg-amber-500 hover:bg-amber-600 text-white font-bold py-3 rounded-xl shadow transition text-center">
                    Hubungi WhatsApp Admin
                </a>
            </div>
        </div>
    </div>
</div>
@endsection