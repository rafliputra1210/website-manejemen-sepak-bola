@extends('layouts.landing')

@section('title', 'Profil Coach & Akademi')

@section('content')
<div class="bg-emerald-900 text-white py-12 px-4 text-center">
    <h1 class="text-3xl md:text-4xl font-bold uppercase tracking-wide">Profil Coach & Akademi</h1>
    <p class="text-emerald-200 mt-2">Mengenal lebih dekat sosok pelatih berlisensi dan berpengalaman di balik Superseed Academy</p>
</div>

<div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mb-12">
        <h2 class="text-2xl font-bold text-gray-900 mb-4 border-l-4 border-amber-500 pl-3">Tentang Superseed Academy</h2>
        <p class="text-gray-600 leading-relaxed mb-4">
            Superseed Academy didirikan dengan visi untuk mencetak bibit-bibit unggul sepak bola Indonesia yang tidak hanya memiliki ketrampilan teknis dan taktis di lapangan, tetapi juga menjunjung tinggi nilai sportivitas, kedisiplinan, dan keunggulan akademik.
        </p>
    </div>

    <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-emerald-600 pl-3">Tim Pelatih Resmi (Coaches)</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($coaches as $coach)
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition flex flex-col justify-between">
            <div>
                <div class="h-64 bg-gray-100 flex items-center justify-center overflow-hidden">
                    @if($coach->foto)
                        <img src="{{ asset('storage/' . $coach->foto) }}" class="w-full h-full object-cover object-top" alt="{{ $coach->nama }}">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($coach->nama) }}&background=064E3B&color=fff&size=256" class="w-full h-full object-cover" alt="Avatar">
                    @endif
                </div>

                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="font-bold text-xl text-gray-900">{{ $coach->nama }}</h3>
                        @if($coach->status_lisensi === 'berlisensi')
                            <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold px-2.5 py-1 rounded-full border border-emerald-300">
                                {{ $coach->detail_lisensi ?: 'Berlisensi Resmi' }}
                            </span>
                        @else
                            <span class="bg-gray-100 text-gray-700 text-xs font-semibold px-2.5 py-1 rounded-full border border-gray-300">
                                Tidak Berlisensi / Asisten
                            </span>
                        @endif
                    </div>
                    
                    <p class="text-xs text-gray-500 font-semibold mt-4 uppercase mb-1">Referensi & Pengalaman:</p>
                    <p class="text-sm text-gray-600 leading-relaxed whitespace-pre-line">{{ $coach->referensi ?: 'Pelatih pembina Superseed Academy.' }}</p>
                </div>
            </div>

            <div class="px-6 py-3 bg-gray-50 border-t border-gray-100 text-right">
                <a href="https://wa.me/{{ preg_replace('/^0/', '62', $coach->nomor_wa) }}" target="_blank" class="text-xs font-bold text-emerald-700 hover:text-emerald-900">
                    💬 Hubungi Pelatih &rarr;
                </a>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-12 bg-white rounded-xl border border-dashed border-gray-300">
            <p class="text-gray-400 font-medium">Belum ada data coach yang ditambahkan oleh Admin.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection