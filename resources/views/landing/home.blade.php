@extends('layouts.landing')
@section('title', 'Superseed Academy | Sekolah Sepak Bola Modern')

@section('content')

{{-- ===================== HERO SECTION ===================== --}}
<section class="relative bg-white pt-12 pb-24 lg:pt-20 lg:pb-32 overflow-hidden border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-8 items-center">
            
            <!-- Text Content -->
            <div class="text-center lg:text-left fade-in">
                <span class="inline-block py-1 px-3 rounded-full bg-brand-light text-brand-blue text-sm font-semibold tracking-wide mb-6">
                    Pendaftaran Angkatan 2024 Dibuka
                </span>
                
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-brand-navy leading-tight mb-6 tracking-tight">
                    Bangun Fundamental <br class="hidden lg:block">
                    Sepak Bola <span class="text-brand-blue">Terbaik.</span>
                </h1>
                
                <p class="text-lg text-slate-600 mb-8 max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                    Superseed Academy menyediakan kurikulum standar internasional, pelatih berlisensi resmi, dan fasilitas modern untuk mengembangkan potensi maksimal setiap anak.
                </p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="{{ route('landing.registration') }}" class="w-full sm:w-auto px-8 py-3.5 bg-brand-blue hover:bg-blue-700 text-white font-semibold rounded-md transition-colors text-center shadow-sm">
                        Daftar Sekarang
                    </a>
                    <a href="{{ route('landing.coaches') }}" class="w-full sm:w-auto px-8 py-3.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 font-semibold rounded-md transition-colors text-center">
                        Lihat Profil Pelatih
                    </a>
                </div>
            </div>

            <!-- Image Content (Banner Slider) -->
            <div class="relative flex justify-center lg:justify-end fade-in" style="transition-delay: 200ms;">
                <div class="relative w-full max-w-md">
                    <!-- Clean image frame -->
                    <div class="absolute inset-0 bg-brand-light rounded-2xl transform translate-x-4 translate-y-4 -z-10"></div>
                    
                    <!-- Slider Container -->
                    <div class="relative rounded-2xl shadow-sm overflow-hidden w-full h-[400px] lg:h-[500px]" id="heroSlider">
                        @if(isset($banners) && $banners->count() > 0)
                            @foreach($banners as $index => $banner)
                                <img src="{{ asset('storage/' . $banner->image_path) }}" 
                                     alt="Superseed Academy Banner" 
                                     class="slider-image absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 ease-in-out {{ $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }}">
                            @endforeach
                        @else
                            <img src="https://images.unsplash.com/photo-1518605368461-1ee71c143926?q=80&w=800&auto=format&fit=crop" 
                                 alt="Pemain Sepak Bola Anak" 
                                 class="absolute inset-0 w-full h-full object-cover opacity-100 z-10">
                        @endif
                    </div>
                    
                    <!-- Stats Card -->
                    <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-xl shadow-hover border border-slate-100 flex items-center gap-4 z-20">
                        <div class="w-12 h-12 bg-brand-light rounded-full flex items-center justify-center">
                            <i class="bi bi-people-fill text-brand-blue text-xl"></i>
                        </div>
                        <div>
                            <div class="font-bold text-xl text-brand-navy">250+</div>
                            <div class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Siswa Aktif</div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

{{-- ===================== LOGO / TRUST SECTION ===================== --}}
<section class="py-10 bg-slate-50 border-b border-slate-100 fade-in">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-center text-sm font-semibold text-slate-400 uppercase tracking-widest mb-6">Fokus Utama Kami</p>
        <div class="flex flex-wrap justify-center items-center gap-8 md:gap-16 opacity-70">
            <div class="flex items-center gap-2 font-bold text-slate-600">
                <i class="bi bi-shield-check text-xl"></i> Lisensi Resmi
            </div>
            <div class="flex items-center gap-2 font-bold text-slate-600">
                <i class="bi bi-book text-xl"></i> Kurikulum Eropa
            </div>
            <div class="flex items-center gap-2 font-bold text-slate-600">
                <i class="bi bi-activity text-xl"></i> Fisioterapi
            </div>
            <div class="flex items-center gap-2 font-bold text-slate-600">
                <i class="bi bi-person-badge text-xl"></i> Pelatih AFC
            </div>
        </div>
    </div>
</section>

{{-- ===================== FEATURES SECTION ===================== --}}
<section class="py-24 bg-white fade-in">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <h2 class="text-brand-blue font-semibold tracking-wide text-sm uppercase mb-3">Keunggulan</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-brand-navy mb-4">Mengapa Memilih Kami?</h3>
            <p class="text-slate-500 text-lg">Program latihan terukur yang disesuaikan dengan tahapan usia, dipadukan dengan manajemen modern.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $features = [
                    ['icon' => 'bi-layout-text-window-reverse', 'title' => 'Portal Wali Murid', 'desc' => 'Sistem digital untuk memantau kehadiran, nilai raport latihan, dan pengumuman secara real-time.'],
                    ['icon' => 'bi-award', 'title' => 'Kurikulum Modern', 'desc' => 'Program latihan periodik berstandar AFC yang mencakup aspek teknis, taktis, fisik, dan mental.'],
                    ['icon' => 'bi-heart-pulse', 'title' => 'Pendampingan Medis', 'desc' => 'Penanganan cedera pertama dan pemantauan kondisi fisik siswa oleh tim medis dan fisioterapi.'],
                    ['icon' => 'bi-people', 'title' => 'Pelatih Pro', 'desc' => 'Dilatih oleh mantan pemain profesional yang memiliki lisensi kepelatihan resmi.'],
                    ['icon' => 'bi-trophy', 'title' => 'Kompetisi Rutin', 'desc' => 'Siswa secara rutin diikutsertakan dalam liga regional maupun turnamen nasional untuk mengasah mental.'],
                    ['icon' => 'bi-building-check', 'title' => 'Fasilitas Premium', 'desc' => 'Penggunaan lapangan berstandar dengan peralatan latihan lengkap untuk mendukung progres siswa.'],
                ];
            @endphp

            @foreach($features as $f)
            <div class="bg-white border border-slate-100 rounded-xl p-8 hover:shadow-hover transition-shadow duration-300">
                <div class="w-12 h-12 bg-brand-light rounded-lg flex items-center justify-center mb-6">
                    <i class="bi {{ $f['icon'] }} text-brand-blue text-xl"></i>
                </div>
                <h4 class="text-xl font-bold text-brand-navy mb-3">{{ $f['title'] }}</h4>
                <p class="text-slate-600 text-sm leading-relaxed">{{ $f['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===================== HOW IT WORKS SECTION ===================== --}}
<section class="py-24 bg-slate-50 fade-in border-y border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-brand-blue font-semibold tracking-wide text-sm uppercase mb-3">Langkah Mudah</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-brand-navy">Cara Bergabung Bersama Kami</h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center relative">
            @php
                $steps = [
                    ['num' => '1', 'title' => 'Daftar Online', 'desc' => 'Isi formulir pendaftaran melalui website kami'],
                    ['num' => '2', 'title' => 'Verifikasi', 'desc' => 'Lengkapi dokumen administrasi dan pembayaran'],
                    ['num' => '3', 'title' => 'Assessment', 'desc' => 'Ikuti sesi latihan perdana untuk evaluasi kemampuan'],
                    ['num' => '4', 'title' => 'Mulai Latihan', 'desc' => 'Penempatan kelas dan resmi menjadi siswa akademi'],
                ];
            @endphp

            @foreach($steps as $index => $step)
            <div class="relative z-10 px-4">
                <div class="w-16 h-16 mx-auto bg-white border border-slate-200 text-brand-blue rounded-full flex items-center justify-center font-bold text-2xl shadow-sm mb-6">
                    {{ $step['num'] }}
                </div>
                <h4 class="text-brand-navy font-bold text-lg mb-2">{{ $step['title'] }}</h4>
                <p class="text-slate-500 text-sm">{{ $step['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===================== BERITA TERBARU ===================== --}}
@if(isset($recentNews) && $recentNews->count() > 0)
<section class="py-24 bg-white fade-in">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-brand-blue font-semibold tracking-wide text-sm uppercase mb-3">Berita & Informasi</h2>
                <h3 class="text-3xl md:text-4xl font-bold text-brand-navy">Kabar Terbaru</h3>
            </div>
            <a href="{{ route('landing.news') }}" class="hidden sm:inline-flex items-center gap-2 text-brand-blue font-semibold hover:text-blue-800 transition-colors">
                Lihat Semua <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($recentNews as $newsItem)
            <div class="bg-white border border-slate-100 rounded-2xl overflow-hidden hover:shadow-hover transition-all duration-300 group flex flex-col">
                <div class="relative h-48 overflow-hidden bg-slate-100">
                    @if($newsItem->foto)
                        <img src="{{ asset('storage/' . $newsItem->foto) }}" alt="{{ $newsItem->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-slate-300">
                            <i class="bi bi-image text-4xl"></i>
                        </div>
                    @endif
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-brand-blue shadow-sm">
                        {{ $newsItem->kategori }}
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <div class="flex items-center gap-4 text-xs text-slate-500 font-medium mb-3">
                        <span class="flex items-center gap-1"><i class="bi bi-calendar-event"></i> {{ \Carbon\Carbon::parse($newsItem->tanggal)->format('d M Y') }}</span>
                    </div>
                    <h4 class="text-lg font-bold text-brand-navy mb-3 line-clamp-2 group-hover:text-brand-blue transition-colors">
                        <a href="{{ route('landing.news.detail', $newsItem->slug) }}">{{ $newsItem->judul }}</a>
                    </h4>
                    <p class="text-slate-600 text-sm line-clamp-3 mb-4 flex-grow">
                        {{ Str::limit(strip_tags($newsItem->konten), 120) }}
                    </p>
                    <a href="{{ route('landing.news.detail', $newsItem->slug) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-brand-blue hover:text-blue-800 transition-colors mt-auto">
                        Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="mt-10 text-center sm:hidden">
            <a href="{{ route('landing.news') }}" class="inline-flex items-center gap-2 text-brand-blue font-semibold hover:text-blue-800 transition-colors">
                Lihat Semua Berita <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
@endif

{{-- ===================== TESTIMONIALS ===================== --}}
<section class="py-24 bg-white fade-in">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-brand-blue font-semibold tracking-wide text-sm uppercase mb-3">Testimoni</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-brand-navy">Dipercaya Oleh Orang Tua</h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @php
                $testimonials = [
                    ['name' => 'Bapak Budi', 'role' => 'Wali Murid U-12', 'text' => 'Akses informasi sangat transparan melalui Portal Wali. Saya bisa tahu perkembangan anak tiap bulan tanpa harus ke lapangan.'],
                    ['name' => 'Ibu Ratna', 'role' => 'Wali Murid U-10', 'text' => 'Kurikulumnya sangat tertata. Anak saya yang dulu belum mengerti dasar bermain bola sekarang memiliki pondasi passing dan dribbling yang baik.'],
                    ['name' => 'Bapak Andi', 'role' => 'Wali Murid U-15', 'text' => 'Pelatihnya komunikatif dan sangat profesional. Disiplin anak saya juga meningkat pesat sejak bergabung dengan Superseed.']
                ];
            @endphp

            @foreach($testimonials as $t)
            <div class="bg-white border border-slate-100 rounded-xl p-8 shadow-sm">
                <div class="flex gap-1 mb-4">
                    @for($i=0; $i<5; $i++)
                        <i class="bi bi-star-fill text-yellow-400 text-sm"></i>
                    @endfor
                </div>
                <p class="text-slate-600 mb-8 text-sm leading-relaxed">"{{ $t['text'] }}"</p>
                <div class="flex items-center gap-4 border-t border-slate-50 pt-4">
                    <div class="w-10 h-10 rounded-full bg-brand-light flex items-center justify-center font-bold text-brand-blue">
                        {{ substr($t['name'], 6, 1) }}
                    </div>
                    <div>
                        <div class="text-brand-navy font-bold text-sm">{{ $t['name'] }}</div>
                        <div class="text-slate-500 text-xs">{{ $t['role'] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===================== CTA ===================== --}}
<section class="py-20 bg-brand-blue fade-in">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Siap Bergabung Bersama Kami?</h2>
        <p class="text-blue-100 text-lg mb-10 max-w-2xl mx-auto">
            Mulailah langkah pertama anak Anda menuju sepak bola profesional. Pendaftaran terbuka untuk usia 8 hingga 16 tahun.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('landing.registration') }}" class="w-full sm:w-auto px-8 py-3.5 bg-white text-brand-blue font-bold rounded-md hover:bg-slate-50 transition-colors">
                Daftar Sekarang
            </a>
            <a href="https://wa.me/6281234567890" class="w-full sm:w-auto px-8 py-3.5 bg-blue-800 text-white font-semibold rounded-md border border-blue-700 hover:bg-blue-900 transition-colors flex items-center justify-center gap-2">
                <i class="bi bi-whatsapp"></i> Hubungi Admin
            </a>
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const images = document.querySelectorAll('.slider-image');
        if (images.length > 1) {
            let currentIndex = 0;
            
            setInterval(() => {
                // Fade out current image
                images[currentIndex].classList.remove('opacity-100', 'z-10');
                images[currentIndex].classList.add('opacity-0', 'z-0');
                
                // Move to next image
                currentIndex = (currentIndex + 1) % images.length;
                
                // Fade in next image
                images[currentIndex].classList.remove('opacity-0', 'z-0');
                images[currentIndex].classList.add('opacity-100', 'z-10');
            }, 3000); // 3 seconds interval
        }
    });
</script>
@endpush
@endsection