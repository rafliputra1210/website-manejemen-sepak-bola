@extends('layouts.landing')

@section('title', 'Jadwal Latihan')

@section('content')
<div class="bg-emerald-900 text-white py-12 px-4 text-center">
    <h1 class="text-3xl md:text-4xl font-bold uppercase tracking-wide">Jadwal Latihan Rutin</h1>
    <p class="text-emerald-200 mt-2">Disiplin dan konsistensi adalah kunci utama menuju kesuksesan di lapangan hijau</p>
</div>

<div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
    <div class="bg-amber-50 border-l-4 border-amber-500 p-4 mb-8 rounded-r-lg shadow-sm">
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
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Waktu / Jam</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Lokasi Lapangan</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Pelatih Utama</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($schedules as $item)
                    <tr class="hover:bg-emerald-50/50 transition">
                        <td class="px-6 py-4 whitespace-nowrap font-bold text-gray-900">{{ $item->kelompok_usia }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600 font-medium">📅 {{ $item->hari }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-emerald-700 font-bold">⏰ {{ $item->waktu }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">📍 {{ $item->lokasi }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($item->coach)
                                <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold px-3 py-1 rounded-full border border-emerald-300">
                                    👨‍🏫 {{ $item->coach->nama }}
                                </span>
                            @else
                                <span class="bg-gray-100 text-gray-500 text-xs font-semibold px-3 py-1 rounded-full">
                                    Asisten Pelatih
                                </span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-400 bg-gray-50/50">
                            <div class="text-3xl mb-2">🗓️</div>
                            Belum ada jadwal latihan yang diatur oleh Admin.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection