@extends('layouts.admin')
@section('title', 'Tambah Data Atlet & Akun Wali Murid')

@section('content')
<div class="card card-custom bg-white p-4 max-w-4xl">
    <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
        <div>
            <h5 class="mb-0 font-weight-bold">Form Input Data Atlet / Murid Baru</h5>
            <p class="text-muted small mb-0">Lengkapi biodata siswa sekaligus buatkan akun akses portal untuk orang tua.</p>
        </div>
        <a href="{{ route('admin.athletes.index') }}" class="btn btn-sm btn-light border"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong class="d-block mb-1"><i class="bi bi-exclamation-triangle-fill me-2"></i>Terdapat kesalahan input!</strong>
            <ul class="mb-0 small">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="{{ route('admin.athletes.store') }}" method="POST">
        @csrf
        
        <!-- BAGIAN 1: BIODATA ATLET / SISWA -->
        <h6 class="text-primary font-weight-bold mb-3"><i class="bi bi-person-fill me-2"></i>A. Biodata Siswa / Atlet</h6>
        <div class="row g-3 mb-4">
            <div class="col-md-8">
                <label class="form-label font-weight-bold">Nama Lengkap Siswa <span class="text-danger">*</span></label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required placeholder="Contoh: Raditya Pratama">
            </div>
            <div class="col-md-4">
                <label class="form-label font-weight-bold">Nomor Punggung</label>
                <input type="number" name="nomor_punggung" class="form-control" value="{{ old('nomor_punggung') }}" placeholder="Contoh: 10">
            </div>
            <div class="col-md-6">
                <label class="form-label font-weight-bold">Posisi Bermain</label>
                <select name="posisi_bermain" class="form-select">
                    <option value="">-- Pilih Posisi --</option>
                    @foreach(['Penyerang (Forward)', 'Gelandang (Midfielder)', 'Pemain Bertahan (Defender)', 'Penjaga Gawang (Goalkeeper)'] as $posisi)
                        <option value="{{ $posisi }}" {{ old('posisi_bermain') == $posisi ? 'selected' : '' }}>{{ $posisi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label font-weight-bold">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}">
            </div>
            <div class="col-md-6">
                <label class="form-label font-weight-bold">Nomor WA Orang Tua/Wali <span class="text-danger">*</span></label>
                <input type="text" name="nomor_wa_ortu" class="form-control" value="{{ old('nomor_wa_ortu') }}" required placeholder="081234567890">
            </div>
            <div class="col-md-6">
                <label class="form-label font-weight-bold">Nomor WA Siswa (Opsional)</label>
                <input type="text" name="nomor_wa" class="form-control" value="{{ old('nomor_wa') }}" placeholder="089876543210">
            </div>
            <div class="col-md-12">
                <label class="form-label font-weight-bold">Alamat Domisili</label>
                <textarea name="alamat" class="form-control" rows="2" placeholder="Jl. Raya Malang No. 123...">{{ old('alamat') }}</textarea>
            </div>
        </div>

        <!-- BAGIAN 2: PENGATURAN AKUN LOGIN WALI MURID -->
        <div class="p-4 bg-light rounded border mb-4">
            <h6 class="text-success font-weight-bold mb-3"><i class="bi bi-shield-lock-fill me-2"></i>B. Pengaturan Akun Portal Wali Murid</h6>
            <p class="text-muted small mb-3">Akun ini digunakan oleh orang tua untuk masuk ke portal web melihat absensi, raport, dan uang kas anak.</p>
            
            <div class="mb-3">
                <label class="form-label font-weight-bold d-block">Pilih Metode Akun Wali:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="opsi_akun" id="opsi_baru" value="baru" {{ old('opsi_akun', 'baru') == 'baru' ? 'checked' : '' }} onchange="toggleAccountSection()">
                    <label class="form-check-label font-weight-bold text-success" for="opsi_baru">✨ Buat Akun Wali Murid Baru</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="opsi_akun" id="opsi_lama" value="lama" {{ old('opsi_akun') == 'lama' ? 'checked' : '' }} onchange="toggleAccountSection()">
                    <label class="form-check-label" for="opsi_lama">🔗 Hubungkan ke Akun Wali yang Sudah Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="opsi_akun" id="opsi_tanpa" value="tanpa_akun" {{ old('opsi_akun') == 'tanpa_akun' ? 'checked' : '' }} onchange="toggleAccountSection()">
                    <label class="form-check-label text-muted" for="opsi_tanpa">❌ Jangan Buatkan Akun Dulu</label>
                </div>
            </div>

            <!-- Form Buat Akun Baru (Muncul jika opsi 'baru' dipilih) -->
            <div id="section_akun_baru" class="row g-3 pt-2 border-top">
                <div class="col-md-4">
                    <label class="form-label small font-weight-bold">Nama Orang Tua / Wali <span class="text-danger">*</span></label>
                    <input type="text" name="nama_wali" id="nama_wali" class="form-control" value="{{ old('nama_wali') }}" placeholder="Contoh: Budi Santoso">
                </div>
                <div class="col-md-4">
                    <label class="form-label small font-weight-bold">Username Login <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-person"></i></span>
                        <input type="text" name="username_wali" id="username_wali" class="form-control" value="{{ old('username_wali') }}" placeholder="ortu_raditya">
                    </div>
                    <div class="form-text text-xs">Gunakan huruf kecil & tanpa spasi.</div>
                </div>
                <div class="col-md-4">
                    <label class="form-label small font-weight-bold">Password Login <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-key"></i></span>
                        <input type="text" name="password_wali" id="password_wali" class="form-control" value="{{ old('password_wali', 'superseed123') }}" placeholder="Minimal 6 karakter">
                    </div>
                    <div class="form-text text-xs text-success">Password default: <b>superseed123</b> (bisa diganti).</div>
                </div>
            </div>

            <!-- Dropdown Pilih Akun Lama (Muncul jika opsi 'lama' dipilih) -->
            <div id="section_akun_lama" class="row g-3 pt-2 border-top" style="display: none;">
                <div class="col-md-12">
                    <label class="form-label small font-weight-bold">Pilih Akun Orang Tua yang Sudah Terdaftar <span class="text-danger">*</span></label>
                    <select name="user_id" class="form-select">
                        <option value="">-- Pilih Akun Wali Murid --</option>
                        @foreach($parents as $parent)
                            <option value="{{ $parent->id }}" {{ old('user_id') == $parent->id ? 'selected' : '' }}>
                                {{ $parent->name }} — (Username: {{ $parent->username }})
                            </option>
                        @endforeach
                    </select>
                    <div class="form-text text-xs">Berguna jika siswa memiliki kakak atau adik di akademi sehingga orang tua cukup punya 1 akun login.</div>
                </div>
            </div>
        </div>

        <!-- Tombol Simpan -->
        <div class="pt-3 border-top d-flex justify-content-end gap-2">
            <a href="{{ route('admin.athletes.index') }}" class="btn btn-light border px-4">Batal</a>
            <button type="submit" class="btn btn-primary px-5 font-weight-bold">
                <i class="bi bi-save me-1"></i> Simpan Data Atlet & Akun Wali
            </button>
        </div>
    </form>
</div>

<script>
    function toggleAccountSection() {
        const opsiBaru = document.getElementById('opsi_baru').checked;
        const opsiLama = document.getElementById('opsi_lama').checked;
        
        document.getElementById('section_akun_baru').style.display = opsiBaru ? 'flex' : 'none';
        document.getElementById('section_akun_lama').style.display = opsiLama ? 'flex' : 'none';
        
        // Atur atribut required via JS agar form tidak error saat disubmit
        document.getElementById('nama_wali').required = opsiBaru;
        document.getElementById('username_wali').required = opsiBaru;
        document.getElementById('password_wali').required = opsiBaru;
    }
    
    // Jalankan saat halaman pertama kali dimuat
    window.onload = toggleAccountSection;
</script>
@endsection