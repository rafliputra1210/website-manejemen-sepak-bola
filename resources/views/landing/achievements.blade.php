@extends('layouts.landing')
@section('title', 'Prestasi | Superseed Academy')

@section('content')
<section class="py-20 bg-slate-50 border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-in">
        <h1 class="text-3xl md:text-5xl font-black text-brand-navy mb-4 tracking-tight">Prestasi Kami</h1>
        <p class="text-slate-600 text-lg max-w-2xl mx-auto">
            Dedikasi dan kerja keras di lapangan membuahkan hasil. Inilah rekam jejak kebanggaan siswa-siswi Superseed Academy.
        </p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($reportsWithAchievements as $report)
            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-hover transition-shadow fade-in flex flex-col h-full">
                <div class="flex items-center gap-4 mb-4 pb-4 border-b border-slate-100">
                    <div class="w-12 h-12 rounded-full bg-brand-light text-brand-blue flex items-center justify-center text-xl shrink-0">
                        <i class="bi bi-award-fill"></i>
                    </div>
                    <div>
                        <div class="font-bold text-brand-navy text-lg leading-tight">{{ $report->athlete->nama ?? 'Siswa' }}</div>
                        <div class="text-slate-500 text-xs mt-1">Capaian Gemilang</div>
                    </div>
                </div>
                <div class="flex-grow">
                    <p class="text-slate-700 leading-relaxed text-sm font-medium">
                        "{{ $report->prestasi }}"
                    </p>
                </div>
                <div class="mt-4 pt-4 text-xs text-slate-400 font-semibold flex items-center gap-2">
                    <i class="bi bi-calendar2-check"></i> Tercatat pada: {{ $report->created_at->format('d M Y') }}
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-16 bg-slate-50 rounded-xl border border-slate-100">
                <i class="bi bi-trophy text-4xl text-slate-300 mb-3"></i>
                <p class="text-slate-500">Belum ada data prestasi yang tercatat saat ini.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection