<?php

namespace App\Exports;

use App\Models\Athlete;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AthletesExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    private $rowNumber = 0;

    // Mengambil data atlet beserta relasi akun wali murid
    public function collection()
    {
        return Athlete::with('user')->orderBy('nama')->get();
    }

    // Menentukan judul kolom (Header) di Excel
    public function headings(): array
    {
        return [
            'No.',
            'Nama Lengkap Siswa',
            'Kelompok Usia / No. Punggung',
            'Posisi Bermain',
            'Tanggal Lahir',
            'Nomor WA Orang Tua',
            'Nomor WA Siswa',
            'Username Portal Wali',
            'Alamat Domisili',
            'Tanggal Terdaftar'
        ];
    }

    // Memetakan isi data per baris
    public function map($athlete): array
    {
        $this->rowNumber++;

        return [
            $this->rowNumber,
            $athlete->nama,
            'U-' . ($athlete->nomor_punggung ?? 'XX'),
            $athlete->posisi_bermain ?? 'Belum ditentukan',
            $athlete->tanggal_lahir ? \Carbon\Carbon::parse($athlete->tanggal_lahir)->format('d/m/Y') : '-',
            $athlete->nomor_wa_ortu,
            $athlete->nomor_wa ?: '-',
            $athlete->user ? $athlete->user->username : 'Belum Ada Akun',
            $athlete->alamat ?: '-',
            \Carbon\Carbon::parse($athlete->created_at)->format('d/m/Y'),
        ];
    }

    // Memberikan styling (Warna Header Hijau khas Superseed)
    public function styles(Worksheet $sheet)
    {
        return [
            // Baris 1 (Header) dibold dan diberi warna latar hijau lembut
            1    => [
                'font' => ['bold' => true, 'color' => ['argb' => 'FFFFFF']],
                'fill' => ['fillType' => 'solid', 'startColor' => ['argb' => '064E3B']]
            ],
        ];
    }
}