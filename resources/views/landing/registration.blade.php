@extends('layouts.landing')
@section('title', 'Informasi Pendaftaran | Superseed Academy')

@section('content')
<section class="py-20 bg-slate-50 border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-in">
        <h1 class="text-3xl md:text-5xl font-black text-brand-navy mb-4 tracking-tight">Informasi Pendaftaran</h1>
        <p class="text-slate-600 text-lg max-w-2xl mx-auto">
            Mari bergabung menjadi keluarga besar Superseed Academy. Simak rincian biaya dan persyaratan pendaftaran di bawah ini.
        </p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <!-- Rincian Biaya -->
            <div class="fade-in">
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                    <div class="bg-brand-navy p-6 text-center">
                        <h3 class="text-2xl font-bold text-white mb-2">Paket Pembinaan</h3>
                        <p class="text-brand-light text-sm">Investasi untuk masa depan karir sepak bola anak Anda</p>
                    </div>
                    
                    <div class="p-8">
                        <div class="flex items-center justify-between border-b border-slate-100 py-4">
                            <span class="text-slate-600 font-medium">Uang Pendaftaran</span>
                            <span class="font-bold text-brand-navy">Rp 500.000</span>
                        </div>
                        <div class="flex items-center justify-between border-b border-slate-100 py-4">
                            <span class="text-slate-600 font-medium">Iuran Bulanan (SPP)</span>
                            <span class="font-bold text-brand-navy">Rp 350.000</span>
                        </div>
                        
                        <div class="mt-8 mb-6">
                            <h4 class="text-sm font-bold text-brand-blue uppercase tracking-wider mb-4">Yang Didapatkan:</h4>
                            <ul class="space-y-3">
                                <li class="flex items-start gap-3">
                                    <i class="bi bi-check-circle-fill text-brand-blue mt-0.5"></i>
                                    <span class="text-slate-600 text-sm">2 Set Jersey Latihan Resmi (Home & Away)</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <i class="bi bi-check-circle-fill text-brand-blue mt-0.5"></i>
                                    <span class="text-slate-600 text-sm">1 Set Baju Bebas / Polo Shirt</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <i class="bi bi-check-circle-fill text-brand-blue mt-0.5"></i>
                                    <span class="text-slate-600 text-sm">ID Card Akses Portal Wali Murid</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <i class="bi bi-check-circle-fill text-brand-blue mt-0.5"></i>
                                    <span class="text-slate-600 text-sm">Latihan Rutin 3x Seminggu (Fasilitas Lapangan Premium)</span>
                                </li>
                            </ul>
                        </div>
                        
                        <a href="https://wa.me/6281234567890" class="block w-full py-4 bg-brand-blue hover:bg-blue-700 text-white font-bold text-center rounded-lg transition-colors">
                            <i class="bi bi-whatsapp mr-2"></i> Daftar Via WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            <!-- Persyaratan & FAQ -->
            <div class="fade-in" style="transition-delay: 200ms;">
                <h3 class="text-2xl font-bold text-brand-navy mb-6">Persyaratan Dokumen</h3>
                <div class="bg-slate-50 border border-slate-200 rounded-xl p-6 mb-8">
                    <ul class="space-y-4">
                        <li class="flex items-center gap-4 bg-white p-4 rounded-lg border border-slate-100 shadow-sm">
                            <div class="w-10 h-10 bg-brand-light rounded-full flex items-center justify-center text-brand-blue shrink-0">1</div>
                            <span class="text-slate-700 font-medium">Fotokopi Akte Kelahiran (2 Lembar)</span>
                        </li>
                        <li class="flex items-center gap-4 bg-white p-4 rounded-lg border border-slate-100 shadow-sm">
                            <div class="w-10 h-10 bg-brand-light rounded-full flex items-center justify-center text-brand-blue shrink-0">2</div>
                            <span class="text-slate-700 font-medium">Fotokopi Kartu Keluarga (2 Lembar)</span>
                        </li>
                        <li class="flex items-center gap-4 bg-white p-4 rounded-lg border border-slate-100 shadow-sm">
                            <div class="w-10 h-10 bg-brand-light rounded-full flex items-center justify-center text-brand-blue shrink-0">3</div>
                            <span class="text-slate-700 font-medium">Pas Foto 3x4 (Warna Merah/Biru - 4 Lembar)</span>
                        </li>
                        <li class="flex items-center gap-4 bg-white p-4 rounded-lg border border-slate-100 shadow-sm">
                            <div class="w-10 h-10 bg-brand-light rounded-full flex items-center justify-center text-brand-blue shrink-0">4</div>
                            <span class="text-slate-700 font-medium">Surat Keterangan Sehat dari Dokter</span>
                        </li>
                    </ul>
                </div>
                
                <h3 class="text-2xl font-bold text-brand-navy mb-4">Informasi Rekening</h3>
                <div class="bg-white border border-slate-200 p-6 rounded-xl flex items-center gap-6">
                    <i class="bi bi-bank text-4xl text-slate-300"></i>
                    <div>
                        <div class="text-slate-500 text-sm font-semibold uppercase tracking-wider mb-1">Bank Central Asia (BCA)</div>
                        <div class="font-black text-brand-navy text-xl">123-456-7890</div>
                        <div class="text-slate-600 text-sm">a/n Superseed Academy</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection