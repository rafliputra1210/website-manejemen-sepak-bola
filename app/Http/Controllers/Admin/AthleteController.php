<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Athlete;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AthleteController extends Controller
{
    public function index()
    {
        $athletes = Athlete::with('user')->latest()->paginate(10);
        return view('admin.athletes.index', compact('athletes'));
    }

    public function create()
    {
        // Mengambil daftar user dengan role 'wali_murid' untuk dikaitkan ke atlet
        $parents = User::query()->where('role', 'wali_murid')->get();
        return view('admin.athletes.create', compact('parents'));
    }

    public function store(Request $request)
    {
        // 1. Validasi Input (Semua wajib diisi untuk otomatisasi akun)
        $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_punggung' => 'nullable|string|max:10',
            'tanggal_lahir' => 'required|date', // Wajib untuk Password
            'posisi_bermain' => 'nullable|string|max:50',
            'alamat' => 'nullable|string',
            'nomor_wa' => 'nullable|string|max:20',
            'nomor_wa_ortu' => 'required|string|max:20',
            'nama_wali' => 'required|string|max:255', // Wajib untuk Nama Akun Ortu
        ]);

        // 2. ATURAN USERNAME: Dari Nama Murid (lowercase, tanpa spasi)
        // Contoh: "Rafli Putra" -> "rafliputra"
        $cleanName = Str::slug($request->nama, '');
        $username = $cleanName;
        
        // Cegah duplikasi jika kebetulan ada nama murid yang persis sama di database
        $counter = 1;
        while (User::query()->where('username', $username)->exists()) {
            $username = $cleanName . $counter;
            $counter++;
        }

        // 3. ATURAN PASSWORD: Dari Tanggal Lahir (DD-MM-YYYY)
        // Contoh input "2026-07-04" -> "04-07-2026"
        $password = \Carbon\Carbon::parse($request->tanggal_lahir)->format('d-m-Y');

        // 4. Buat Akun Wali Murid Baru Secara Otomatis
        $newUser = User::create([
            'name' => $request->nama_wali,
            'username' => $username,
            'password' => Hash::make($password),
            'role' => 'wali_murid',
        ]);

        // 5. Simpan Data Siswa dan Hubungkan ke ID Akun yang Baru Dibuat
        Athlete::create([
            'nama' => $request->nama,
            'nomor_punggung' => $request->nomor_punggung ?? null,
            'tanggal_lahir' => $request->tanggal_lahir,
            'posisi_bermain' => $request->posisi_bermain ?? null,
            'alamat' => $request->alamat ?? null,
            'nomor_wa' => $request->nomor_wa ?? null,
            'nomor_wa_ortu' => $request->nomor_wa_ortu,
            'user_id' => $newUser->id, // Langsung otomatis terhubung!
        ]);

        return redirect()->route('admin.athletes.index')
            ->with('success', "Data Siswa berhasil disimpan & Akun Wali (@{$username}) otomatis aktif!");
    }

    public function edit(Athlete $athlete)
    {
        $parents = User::query()->where('role', 'wali_murid')->get();
        return view('admin.athletes.edit', compact('athlete', 'parents'));
    }

    public function update(Request $request, Athlete $athlete)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_punggung' => 'nullable|string|max:10',
            'tanggal_lahir' => 'nullable|date',
            'posisi_bermain' => 'nullable|string|max:50',
            'alamat' => 'nullable|string',
            'nomor_wa' => 'nullable|string|max:20',
            'nomor_wa_ortu' => 'required|string|max:20',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $athlete->update($validated);

        return redirect()->route('admin.athletes.index')->with('success', 'Data Atlet berhasil diperbarui!');
    }

    public function destroy(Athlete $athlete)
    {
        $athlete->delete();
        return redirect()->route('admin.athletes.index')->with('success', 'Data Atlet berhasil dihapus!');
    }
}