<?php

namespace App\Imports;

use App\Models\Coach;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CoachesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Deteksi nama coach (bisa: nama_lengkap_coach / nama_coach / nama)
        $namaCoach = $row['nama_lengkap_coach'] ?? $row['nama_coach'] ?? $row['nama'] ?? null;

        if (!$namaCoach || trim($namaCoach) === '') {
            return null;
        }

        return new Coach([
            'nama'           => $namaCoach,
            'status_lisensi' => strtolower($row['status_lisensi'] ?? 'tidak_berlisensi'),
            'detail_lisensi' => $row['detail_lisensi'] ?? $row['lisensi'] ?? 'Asisten Pelatih',
            'nomor_wa'       => $row['nomor_whatsapp'] ?? $row['nomor_wa'] ?? $row['no_wa'] ?? '081234567890',
            'referensi'      => $row['referensi_pengalaman_melatih'] ?? $row['referensi_pengalaman'] ?? $row['referensi'] ?? '-',
            'alamat'         => $row['alamat_domisili'] ?? $row['alamat'] ?? 'Malang',
        ]);
    }
}