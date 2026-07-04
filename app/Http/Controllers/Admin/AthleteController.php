<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Athlete;
use App\Models\User;
use Illuminate\Http\Request;

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

        Athlete::create($validated);

        return redirect()->route('admin.athletes.index')->with('success', 'Data Atlet berhasil ditambahkan!');
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