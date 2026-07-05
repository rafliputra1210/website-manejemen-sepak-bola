<?php

namespace App\Imports;

use App\Models\Athlete;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class AthletesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // 1. SMART DETEKSI NAMA SISWA (Bisa pakai header: nama / nama_siswa / nama_lengkap_siswa)
        $namaSiswa = $row['nama_lengkap_siswa'] ?? $row['nama_siswa'] ?? $row['nama'] ?? $row['name'] ?? null;
        
        // Jika baris kosong (tidak ada nama), lewati
        if (!$namaSiswa || trim($namaSiswa) === '') {
            return null;
        }

        // 2. ATURAN USERNAME OTOMATIS (lowercase, tanpa spasi/simbol)
        $cleanName = Str::slug($namaSiswa, '');
        $username = $cleanName;
        
        $counter = 1;
        while (User::where('username', $username)->exists()) {
            $username = $cleanName . $counter;
            $counter++;
        }

        // 3. SMART DETEKSI TANGGAL LAHIR & PASSWORD
        $tanggalLahirRaw = $row['tanggal_lahir'] ?? $row['tgl_lahir'] ?? $row['tgl'] ?? null;
        $tanggalLahir = date('Y-m-d'); // Default hari ini jika kosong/rusak
        $password = 'superseed123';    // Default password jika tanggal rusak

        if ($tanggalLahirRaw) {
            try {
                if (is_numeric($tanggalLahirRaw)) {
                    // Jika dari format angka seri Excel
                    $dt = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($tanggalLahirRaw);
                    $tanggalLahir = $dt->format('Y-m-d');
                    $password = $dt->format('d-m-Y');
                } else {
                    // Jika dari format teks biasa (DD/MM/YYYY atau YYYY-MM-DD)
                    $parsedDate = Carbon::parse(str_replace('/', '-', $tanggalLahirRaw));
                    $tanggalLahir = $parsedDate->format('Y-m-d');
                    $password = $parsedDate->format('d-m-Y');
                }
            } catch (\Exception $e) {
                // Jika gagal parse tanggal, biarkan pakai default (tanpa error)
            }
        }

        // 4. SMART DETEKSI WA ORTU (Bisa: nomor_wa_orang_tua / nomor_wa_ortu / wa_ortu / no_wa)
        $waOrtu = $row['nomor_wa_orang_tua'] ?? $row['nomor_wa_ortu'] ?? $row['wa_ortu'] ?? $row['no_wa_ortu'] ?? $row['no_wa'] ?? '081234567890';
        
        // 5. SMART DETEKSI WA SISWA
        $waSiswa = $row['nomor_wa_siswa'] ?? $row['wa_siswa'] ?? $row['no_wa_siswa'] ?? null;

        // 6. SMART DETEKSI POSISI & NOMOR PUNGGUNG
        $posisi = $row['posisi_bermain'] ?? $row['posisi'] ?? 'Gelandang (Midfielder)';
        
        // Menangani kolom "Kelompok Usia / No. Punggung" (Misal isi "U-12", kita ambil angkanya atau biarkan null)
        $noPunggungRaw = $row['kelompok_usia_no_punggung'] ?? $row['nomor_punggung'] ?? $row['no_punggung'] ?? null;
        $noPunggung = is_numeric($noPunggungRaw) ? $noPunggungRaw : null;

        // 7. BUAT AKUN WALI MURID OTOMATIS
        $newUser = User::create([
            'name'     => $row['nama_orang_tua'] ?? ('Wali dari ' . $namaSiswa),
            'username' => $username,
            'password' => Hash::make($password),
            'role'     => 'wali_murid',
        ]);

        // 8. SIMPAN DATA ATLET
        return new Athlete([
            'nama'            => $namaSiswa,
            'nomor_punggung'  => $noPunggung,
            'tanggal_lahir'   => $tanggalLahir,
            'posisi_bermain'  => $posisi,
            'nomor_wa_ortu'   => $waOrtu,
            'nomor_wa'        => $waSiswa,
            'alamat'          => $row['alamat_domisili'] ?? $row['alamat'] ?? 'Malang',
            'user_id'         => $newUser->id,
        ]);
    }
}