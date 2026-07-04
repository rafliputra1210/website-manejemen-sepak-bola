<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoachController extends Controller
{
    public function index()
    {
        $coaches = Coach::latest('created_at')->paginate(10);
        return view('admin.coaches.index', compact('coaches'));
    }

    public function create()
    {
        return view('admin.coaches.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_wa' => 'nullable|string|max:20',
            'status_lisensi' => 'required|in:berlisensi,tidak_berlisensi',
            'detail_lisensi' => 'nullable|string|max:100',
            'referensi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('coaches', 'public');
        }

        Coach::create($validated);

        return redirect()->route('admin.coaches.index')->with('success', 'Data Coach berhasil ditambahkan!');
    }

    public function edit(Coach $coach)
    {
        return view('admin.coaches.edit', compact('coach'));
    }

    public function update(Request $request, Coach $coach)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_wa' => 'nullable|string|max:20',
            'status_lisensi' => 'required|in:berlisensi,tidak_berlisensi',
            'detail_lisensi' => 'nullable|string|max:100',
            'referensi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($coach->foto && Storage::disk('public')->exists($coach->foto)) {
                Storage::disk('public')->delete($coach->foto);
            }
            $validated['foto'] = $request->file('foto')->store('coaches', 'public');
        }

        $coach->update($validated);

        return redirect()->route('admin.coaches.index')->with('success', 'Data Coach berhasil diperbarui!');
    }

    public function destroy(Coach $coach)
    {
        if ($coach->foto && Storage::disk('public')->exists($coach->foto)) {
            Storage::disk('public')->delete($coach->foto);
        }
        Coach::destroy($coach->id);

        return redirect()->route('admin.coaches.index')->with('success', 'Data Coach berhasil dihapus!');
    }
}