<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Athlete;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $query = Attendance::with('athlete')->latest();

        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        $attendances = $query->paginate(10);
        $athletes = Athlete::orderBy('nama', 'asc')->get();

        return view('admin.attendances.index', compact('attendances', 'athletes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'athlete_id' => 'required|exists:athletes,id',
            'tanggal' => 'required|date',
            'status' => 'required|in:hadir,izin,sakit,alpa',
            'foto_bukti' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto_bukti')) {
            $validated['foto_bukti'] = $request->file('foto_bukti')->store('foto_bukti', 'public');
        }

        // Generate a unique barcode code (e.g. ATT + date + random string)
        $validated['kode_barcode'] = 'ATT' . date('YmdHis') . strtoupper(Str::random(4));

        Attendance::create($validated);

        return redirect()->route('admin.attendances.index')->with('success', 'Absensi berhasil dicatat!');
    }

    public function show(Attendance $attendance)
    {
        return view('admin.attendances.barcode', compact('attendance'));
    }

    public function destroy(Attendance $attendance)
    {
        if ($attendance->foto_bukti) {
            Storage::disk('public')->delete($attendance->foto_bukti);
        }

        Attendance::destroy($attendance->id);

        return redirect()->route('admin.attendances.index')->with('success', 'Absensi berhasil dihapus!');
    }
}