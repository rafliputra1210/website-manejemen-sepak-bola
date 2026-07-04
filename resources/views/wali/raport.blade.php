@extends('layouts.wali')
@section('title', 'Raport & Evaluasi Perkembangan Anak')

@section('content')
@if(!$athlete)
    <div class="alert alert-warning text-center p-5 card-custom">Belum ada data anak terhubung dengan akun Anda.</div>
@else

@if($myAthletes->count() > 1)
<div class="mb-4 bg-white p-3 rounded shadow-sm d-flex align-items-center justify-content-between border flex-wrap gap-2">
    <span class="small font-weight-bold"><i class="bi bi-person-check-fill text-success me-2"></i>Menampilkan Raport Evaluasi untuk: <strong>{{ $athlete->nama }}</strong></span>
    <form action="{{ route('wali.raport') }}" method="GET" class="d-flex gap-2">
        <select name="child_id" class="form-select form-select-sm" onchange="this.form.submit()">
            @foreach($myAthletes as $child)
                <option value="{{ $child->id }}" {{ ($athlete->id == $child->id) ? 'selected' : '' }}>{{ $child->nama }} (U-{{ $child->nomor_punggung ?? 'XX' }})</option>
            @endforeach
        </select>
    </form>
</div>
@endif

<div class="card card-custom p-4 mb-4 bg-gradient text-white" style="background: linear-gradient(135deg, #064e3b 0%, #047857 100%);">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
        <div>
            <span class="text-uppercase text-xs tracking-wider opacity-75 font-weight-bold">Evaluasi Berkala Sekolah Sepak Bola</span>
            <h4 class="mb-0 mt-1 font-weight-bold">Raport Perkembangan Skill: {{ $athlete->nama }}</h4>
        </div>
        <span class="badge bg-warning text-dark fs-6 font-weight-bold px-3 py-2">Kelompok Usia U-{{ $athlete->nomor_punggung ?? 'XX' }}</span>
    </div>
</div>

<div class="space-y-4">
    @forelse($reports as $raport)
    @php $nilai = json_decode($raport->daftar_nilai, true) ?? []; @endphp
    <div class="card card-custom p-4 border-top border-4 border-success mb-4">
        <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom flex-wrap gap-2">
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-dark fs-6 px-3 py-1 font-weight-bold">{{ $raport->periode }}</span>
                <span class="text-xs text-muted"><i class="bi bi-calendar-check me-1"></i>Diterbitkan: {{ \Carbon\Carbon::parse($raport->created_at)->format('d M Y') }}</span>
            </div>
            <span class="badge bg-success bg-opacity-10 text-success font-weight-bold px-3 py-1">Evaluasi Resmi Pelatih</span>
        </div>

        <h6 class="font-weight-bold text-success small text-uppercase mb-3"><i class="bi bi-bar-chart-fill me-1"></i>A. Penilaian Parameter Aspek (Skala 10 - 100):</h6>
        <div class="row g-3 mb-4">
            @foreach($nilai as $aspek => $skor)
            <div class="col-6 col-md-3">
                <div class="p-3 bg-light rounded-3 border text-center h-100 d-flex flex-column justify-content-center shadow-sm">
                    <span class="d-block text-muted font-weight-bold mb-1" style="font-size: 0.75rem;">{{ $aspek }}</span>
                    <strong class="fs-3 {{ $skor >= 80 ? 'text-success' : 'text-warning' }}">{{ $skor }}</strong>
                    <span class="text-xs text-muted">{{ $skor >= 85 ? 'Sangat Baik' : ($skor >= 75 ? 'Baik' : 'Perlu Latihan') }}</span>
                </div>
            </div>
            @endforeach
        </div>

        <h6 class="font-weight-bold text-success small text-uppercase mb-2"><i class="bi bi-trophy-fill me-1"></i>B. Catatan Progres & Prestasi:</h6>
        <div class="row g-3 small mb-4">
            <div class="col-md-6">
                <div class="bg-white p-3 rounded-3 border h-100 shadow-sm">
                    <strong class="text-dark d-block mb-1 font-weight-bold"><i class="bi bi-graph-up-arrow text-primary me-1"></i> Progres Skill / Peningkatan:</strong>
                    <p class="text-gray-700 mb-0" style="line-height: 1.5;">{{ $raport->progres_skill ?: 'Konsisten mengikuti latihan rutin dengan perkembangan yang stabil.' }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-white p-3 rounded-3 border h-100 shadow-sm">
                    <strong class="text-success d-block mb-1 font-weight-bold"><i class="bi bi-award text-success me-1"></i> Prestasi / Apresiasi Khusus:</strong>
                    <p class="text-gray-700 mb-0" style="line-height: 1.5;">{{ $raport->prestasi ?: 'Belum ada catatan kejuaraan atau turnamen pada periode ini.' }}</p>
                </div>
            </div>
        </div>

        <div class="bg-warning bg-opacity-10 border-start border-4 border-warning p-3 rounded-3 small shadow-sm">
            <strong class="text-dark d-block mb-1 font-weight-bold"><i class="bi bi-chat-quote-fill text-warning me-1"></i> Catatan & Saran Pelatih Kepala:</strong>
            <p class="mb-0 text-dark font-italic fs-6" style="line-height: 1.5;">"{{ $raport->catatan_pelatih ?: 'Pertahankan kedisiplinan berlatih, jaga pola makan, dan perbanyak latihan sentuhan bola di rumah.' }}"</p>
        </div>
    </div>
    @empty
    <div class="card card-custom text-center py-5 text-muted">
        <i class="bi bi-folder-x fs-1 d-block mb-2 text-secondary opacity-50"></i>
        <h6 class="font-weight-bold text-dark">Belum Ada Raport Diterbitkan</h6>
        <p class="small mb-0 text-muted">Pelatih kepala belum memasukkan data evaluasi atau raport untuk periode saat ini.</p>
    </div>
    @endforelse
</div>
@endif
@endsection