@extends('layouts.admin')
@section('title', 'Edit Jadwal Latihan')

@section('content')
<div class="card card-custom bg-white p-4 max-w-lg shadow-sm border-0">
    <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
        <h5 class="mb-0 font-weight-bold">Form Edit Jadwal Latihan</h5>
        <a href="{{ route('admin.schedules.index') }}" class="btn btn-sm btn-light border"><i class="bi bi-arrow-left"></i> Kembali</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger small">
            <ul class="mb-0">@foreach ($errors->all() as $err) <li>{{ $err }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.schedules.update', $schedule->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label small font-weight-bold">Kelompok Usia <span class="text-danger">*</span></label>
            <input type="text" name="kelompok_usia" class="form-control form-control-sm" value="{{ old('kelompok_usia', $schedule->kelompok_usia) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label small font-weight-bold">Hari Latihan <span class="text-danger">*</span></label>
            <input type="text" name="hari" class="form-control form-control-sm" value="{{ old('hari', $schedule->hari) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label small font-weight-bold">Waktu / Jam <span class="text-danger">*</span></label>
            <input type="text" name="waktu" class="form-control form-control-sm" value="{{ old('waktu', $schedule->waktu) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label small font-weight-bold">Lokasi Lapangan <span class="text-danger">*</span></label>
            <input type="text" name="lokasi" class="form-control form-control-sm" value="{{ old('lokasi', $schedule->lokasi) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label small font-weight-bold">Pelatih Penanggung Jawab</label>
            <select name="coach_id" class="form-select form-select-sm">
                <option value="">-- Pilih Coach --</option>
                @foreach($coaches as $coach)
                    <option value="{{ $coach->id }}" {{ $schedule->coach_id == $coach->id ? 'selected' : '' }}>{{ $coach->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
            <a href="{{ route('admin.schedules.index') }}" class="btn btn-light border btn-sm px-3">Batal</a>
            <button type="submit" class="btn btn-primary btn-sm px-3 font-weight-bold shadow"><i class="bi bi-save-fill me-1"></i> Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
