@extends('layouts.admin')
@section('title', 'Manajemen Cepat Akun Wali Murid')

@section('content')

<!-- POPUP KREDENSIAL SUKSES & TOMBOL KIRIM WA -->
@if(session('success_generate'))
    @php $data = session('success_generate'); @endphp
    <div class="alert alert-success border-2 border-success shadow-lg p-4 mb-4 rounded-3 bg-white" role="alert">
        <div class="d-flex align-items-center mb-2">
            <span class="fs-2 me-3">🎉</span>
            <div>
                <h5 class="alert-heading font-weight-bold mb-0 text-success">Akun Wali Murid Berhasil Dibuat Otomatis!</h5>
                <span class="text-muted small">Kredensial login untuk orang tua dari siswa: <strong>{{ $data['nama_siswa'] }}</strong></span>
            </div>
        </div>
        
        <hr>
        
        <div class="row g-2 align-items-center bg-light p-3 rounded border mb-3">
            <div class="col-md-5">
                <span class="text-xs text-muted d-block uppercase font-weight-bold">Username Login:</span>
                <code class="fs-5 text-primary font-weight-bold">{{ $data['username'] }}</code>
            </div>
            <div class="col-md-4">
                <span class="text-xs text-muted d-block uppercase font-weight-bold">Password Default:</span>
                <code class="fs-5 text-dark font-weight-bold">{{ $data['password'] }}</code>
            </div>
            <div class="col-md-3 text-end">
                @php
                    $nomorWa = preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $data['nomor_wa']));
                    $pesanWa = urlencode("Halo Bapak/Ibu Wali dari *{$data['nama_siswa']}*.\n\nBerikut adalah akun akses Portal Wali Murid Superseed Academy Anda:\n\n🔗 *Link Portal:* https://superseedacademy.id/login\n👤 *Username:* {$data['username']}\n🔑 *Password:* {$data['password']}\n\nSilahkan login untuk memantau kehadiran dan raport anak Anda. Terima kasih! ⚽");
                @endphp
                <a href="https://wa.me/{{ $nomorWa }}?text={{ $pesanWa }}" target="_blank" class="btn btn-success font-weight-bold w-100 shadow-sm">
                    <i class="bi bi-whatsapp me-1"></i> Kirim ke WA Ortu
                </a>
            </div>
        </div>
        <small class="text-muted"><i class="bi bi-info-circle me-1"></i> Klik tombol hijau di atas untuk langsung mengirimkan username & password ke WhatsApp orang tua tanpa perlu mengetik ulang.</small>
    </div>
@endif

<!-- PESAN INFORMASI / ERROR BIASA -->
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
@if(session('success'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<!-- KARTU UTAMA -->
<div class="card card-custom bg-white p-4">
    <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom flex-wrap gap-2">
        <div>
            <h5 class="mb-1 font-weight-bold">Pusat Manajemen Akun Wali Murid</h5>
            <p class="text-muted small mb-0">Buat akun otomatis dengan 1-klik untuk siswa yang belum terhubung, atau reset password jika orang tua lupa.</p>
        </div>
        <span class="badge bg-light text-dark border p-2"><i class="bi bi-shield-lock text-warning me-1"></i> Password Default Sistem: <strong>superseed123</strong></span>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle border text-sm">
            <thead class="table-light">
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Nama Siswa (Atlet)</th>
                    <th>Nomor WA Ortu</th>
                    <th>Status Akun Portal</th>
                    <th>Kredensial (Username)</th>
                    <th class="text-center" style="width: 220px;">Aksi Cepat (1-Klik)</th>
                </tr>
            </thead>
            <tbody>
                @forelse($athletes as $item)
                <tr>
                    <td class="text-center font-weight-bold">{{ $loop->iteration }}</td>
                    <td>
                        <strong class="text-dark d-block">{{ $item->nama }}</strong>
                        <span class="badge bg-secondary text-xs">U-{{ $item->nomor_punggung ?? 'XX' }} | {{ $item->posisi_bermain ?? 'Siswa' }}</span>
                    </td>
                    <td>
                        <span class="text-success font-weight-bold"><i class="bi bi-whatsapp me-1"></i>{{ $item->nomor_wa_ortu }}</span>
                    </td>
                    
                    <!-- STATUS AKUN -->
                    <td>
                        @if($item->user)
                            <span class="badge bg-success bg-opacity-10 text-success px-3 py-1 font-weight-bold">
                                <i class="bi bi-check-circle-fill me-1"></i> Sudah Terhubung
                            </span>
                        @else
                            <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-1 font-weight-bold">
                                <i class="bi bi-x-circle-fill me-1"></i> Belum Punya Akun
                            </span>
                        @endif
                    </td>

                    <!-- USERNAME LOGIN -->
                    <td>
                        @if($item->user)
                            <code class="fs-6 bg-light px-2 py-1 border rounded text-primary font-weight-bold">{{ $item->user->username }}</code>
                        @else
                            <span class="text-muted text-xs font-italic">-</span>
                        @endif
                    </td>

                    <!-- TOMBOL AKSI CEPAT -->
                    <td class="text-center">
                        @if(!$item->user)
                            <!-- Tombol 1-Klik Generate Akun -->
                            <form action="{{ route('admin.wali.generate', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary font-weight-bold w-100 shadow-sm" title="Buatkan username & password otomatis">
                                    <i class="bi bi-lightning-charge-fill text-warning me-1"></i> Buat Akun Otomatis
                                </button>
                            </form>
                        @else
                            <!-- Tombol Kirim Ulang WA & Reset Password -->
                            <div class="d-flex gap-1 justify-content-center">
                                @php
                                    $nomorWa = preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $item->nomor_wa_ortu));
                                    $pesanWa = urlencode("Halo Bapak/Ibu Wali dari *{$item->nama}*.\n\nMengingatkan kembali akun akses Portal Wali Murid Superseed Academy Anda:\n\n🔗 *Link:* https://superseedacademy.id/login\n👤 *Username:* {$item->user->username}\n🔑 *Password:* superseed123\n\nTerima kasih! ⚽");
                                @endphp
                                <a href="https://wa.me/{{ $nomorWa }}?text={{ $pesanWa }}" target="_blank" class="btn btn-sm btn-outline-success" title="Kirim ulang info akun via WA">
                                    <i class="bi bi-whatsapp"></i> WA Ortu
                                </a>

                                <form action="{{ route('admin.wali.reset', $item->user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Reset password akun @{{ $item->user->username }} menjadi: superseed123 ?');">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-warning text-dark font-weight-bold" title="Reset Password ke superseed123">
                                        <i class="bi bi-key-fill"></i> Reset Pass
                                    </button>
                                </form>
                            </div>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center py-5 text-muted">Belum ada data siswa terdaftar.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $athletes->links() }}</div>
</div>
@endsection