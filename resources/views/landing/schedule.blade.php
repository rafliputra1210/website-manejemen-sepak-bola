@extends('layouts.landing')

@section('title', 'Jadwal Latihan')

@section('content')
<div class="bg-emerald-900 text-white py-12 px-4 text-center">
    <h1 class="text-3xl md:text-4xl font-bold uppercase tracking-wide">Jadwal Latihan Rutin</h1>
    <p class="text-emerald-200 mt-2">Disiplin adalah kunci utama menuju kesuksesan di lapangan hijau</p>
</div>

<div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
    <div class="bg-amber-50 border-l-4 border-amber-500 p-4 mb-8 rounded-r-lg">
        <div class="flex">
            <div class="flex-shrink-0">⚠️</div>
            <div class="ml-3">
                <p class="text-sm text-amber-800">
                    <strong>Catatan:</strong> Siswa diwajibkan hadir 15 menit sebelum jam latihan dimulai dengan mengenakan seragam latihan resmi sesuai hari yang ditentukan.
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-xl overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-emerald-800 text-white">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Kelompok Usia</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Hari</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Waktu</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Lokasi Lapangan</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Pelatih Utama</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap font-bold text-gray-900">Under 10 (U-10)</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">Selasa & Kamis</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">15.30 - 17.00 WIB</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">Lapangan Utama Superseed A</td>
                        <td class="px-6 py-4 whitespace-nowrap"><span class="bg-emerald-100 text-emerald-800 text-xs font-semibold px-2.5 py-1 rounded">Coach Rizky</span></td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap font-bold text-gray-900">Under 12 (U-12)</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">Rabu & Jumat</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">15.30 - 17.00 WIB</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">Lapangan Utama Superseed A</td>
                        <td class="px-6 py-4 whitespace-nowrap"><span class="bg-emerald-100 text-emerald-800 text-xs font-semibold px-2.5 py-1 rounded">Coach Budi</span></td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap font-bold text-gray-900">Under 15 (U-15)</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">Senin, Rabu & Sabtu</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">15.30 - 17.30 WIB</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">Stadion Mini Superseed B</td>
                        <td class="px-6 py-4 whitespace-nowrap"><span class="bg-emerald-100 text-emerald-800 text-xs font-semibold px-2.5 py-1 rounded">Coach Ahmad</span></td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap font-bold text-gray-900">Under 17 (U-17)</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">Selasa, Kamis & Minggu</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">15.30 - 17.30 WIB</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">Stadion Mini Superseed B</td>
                        <td class="px-6 py-4 whitespace-nowrap"><span class="bg-emerald-100 text-emerald-800 text-xs font-semibold px-2.5 py-1 rounded">Coach Ahmad</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection