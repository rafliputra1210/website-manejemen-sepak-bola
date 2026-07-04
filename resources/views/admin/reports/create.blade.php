@extends('layouts.admin')
@section('title', 'Input Raport Atlet Baru')

@section('content')
<div class="card card-custom bg-white p-4 max-w-2xl">
    <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
        <h5 class="mb-0">Form Penilaian & Raport Atlet</h5>
        <a href="{{ route('admin.reports.index') }}" class="btn btn-sm btn-light border"><i class="bi bi-arrow-left"></i> Kembali</a>
    </div>

    <form action="{{ route('admin.reports.store') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-7">
                <label class="form-label font-weight-bold">Pilih Siswa / Atlet <span class="text-danger">*</span></label>
                <select name="athlete_id" class="form-select" required>
                    <option value="">-- Pilih Atlet --</option>
                    @foreach($athletes as $atlet)
                        <option value="{{ $atlet->id }}">{{ $atlet->nama }} (Posisi: {{ $atlet->posisi_bermain ?? '-' }})</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-5">
                <label class="form-label font-weight-bold">Periode Raport <span class="text-danger">*</span></label>
                <input type="text" name="periode" class="form-control" required placeholder="Contoh: Semester Genap 2026">
            </div>

            <!-- Input Nilai (Scale 10-100) -->
            <div class="col-12 mt-4"><h6 class="border-bottom pb-2 font-weight-bold text-primary">A. Daftar Nilai Evaluasi (Skala 10 - 100)</h6></div>
            <div class="col-md-3">
                <label class="form-label small font-weight-bold">Teknik & Dribbling</label>
                <input type="number" name="nilai_teknik" class="form-control text-center font-weight-bold" required min="0" max="100" value="85">
            </div>
            <div class="col-md-3">
                <label class="form-label small font-weight-bold">Fisik & Stamina</label>
                <input type="number" name="nilai_fisik" class="form-control text-center font-weight-bold" required min="0" max="100" value="80">
            </div>
            <div class="col-md-3">
                <label class="form-label small font-weight-bold">Pemahaman Taktik</label>
                <input type="number" name="nilai_taktik" class="form-control text-center font-weight-bold" required min="0" max="100" value="78">
            </div>
            <div class="col-md-3">
                <label class="form-label small font-weight-bold">Mental & Disiplin</label>
                <input type="number" name="nilai_mental" class="form-control text-center font-weight-bold" required min="0" max="100" value="90">
            </div>

            <!-- Progres, Prestasi & Catatan -->
            <div class="col-12 mt-4"><h6 class="border-bottom pb-2 font-weight-bold text-primary">B. Progres Skill & Prestasi</h6></div>
            <div class="col-md-6">
                <label class="form-label font-weight-bold">Progres Skill / Peningkatan</label>
                <textarea name="progres_skill" class="form-control" rows="3" placeholder="Contoh: Akurasi passing jarak jauh meningkat drastis, kontrol bola kaki kiri sudah jauh lebih stabil..."></textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label font-weight-bold">Prestasi Olahraga / Sekolah (Opsional)</label>
                <textarea name="prestasi" class="form-control" rows="3" placeholder="Contoh: Top Skor Liga Internal U-15 / Juara 1 Olimpiade Matematika Sekolah..."></textarea>
            </div>
            <div class="col-md-12">
                <label class="form-label font-weight-bold">Catatan & Saran Pelatih Kepala</label>
                <textarea name="catatan_pelatih" class="form-control" rows="2" placeholder="Contoh: Pertahankan kedisiplinan latihan dan perbanyak latihan fisik di rumah..."></textarea>
            </div>
        </div>

        <div class="mt-4 pt-3 border-top d-flex justify-content-end">
            <button type="submit" class="btn btn-primary px-4"><i class="bi bi-check-circle-fill me-1"></i> Terbitkan Raport</button>
        </div>
    </form>
</div>
@endsection