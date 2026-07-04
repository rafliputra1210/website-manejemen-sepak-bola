<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Coach;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('coach')->latest()->paginate(10);
        $coaches = Coach::orderBy('nama', 'asc')->get(); // Untuk dropdown di modal/form
        return view('admin.schedules.index', compact('schedules', 'coaches'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kelompok_usia' => 'required|string|max:100',
            'hari' => 'required|string|max:100',
            'waktu' => 'required|string|max:100',
            'lokasi' => 'required|string|max:255',
            'coach_id' => 'nullable|exists:coaches,id',
        ]);

        Schedule::create($validated);

        return redirect()->route('admin.schedules.index')->with('success', 'Jadwal latihan berhasil ditambahkan!');
    }

    public function destroy(Schedule $schedule)
    {
        Schedule::destroy($schedule->id);
        return redirect()->back()->with('success', 'Jadwal latihan berhasil dihapus!');
    }
}