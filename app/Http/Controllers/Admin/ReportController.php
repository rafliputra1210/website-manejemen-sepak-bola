<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Athlete;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::with('athlete')->latest()->paginate(10);
        return view('admin.reports.index', compact('reports'));
    }

    public function create()
    {
        $athletes = Athlete::query()->orderBy('nama', 'asc')->get();
        return view('admin.reports.create', compact('athletes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'athlete_id' => 'required|exists:athletes,id',
            'periode' => 'required|string|max:50',
            'nilai_teknik' => 'required|integer|min:0|max:100',
            'nilai_fisik' => 'required|integer|min:0|max:100',
            'nilai_taktik' => 'required|integer|min:0|max:100',
            'nilai_mental' => 'required|integer|min:0|max:100',
            'progres_skill' => 'nullable|string',
            'prestasi' => 'nullable|string',
            'catatan_pelatih' => 'nullable|string',
        ]);

        // Simpan dalam format JSON agar terstruktur
        $daftarNilai = [
            'Teknik & Dribbling' => $request->nilai_teknik,
            'Fisik & Stamina' => $request->nilai_fisik,
            'Pemahaman Taktik' => $request->nilai_taktik,
            'Mental & Disiplin' => $request->nilai_mental,
        ];

        Report::create([
            'athlete_id' => $request->athlete_id,
            'periode' => $request->periode,
            'daftar_nilai' => json_encode($daftarNilai),
            'progres_skill' => $request->progres_skill,
            'prestasi' => $request->prestasi,
            'catatan_pelatih' => $request->catatan_pelatih,
        ]);

        return redirect()->route('admin.reports.index')->with('success', 'Raport evaluasi & prestasi berhasil diterbitkan!');
    }

    public function destroy(Report $report)
    {
        Report::destroy($report->id);
        return redirect()->back()->with('success', 'Raport berhasil dihapus!');
    }
}