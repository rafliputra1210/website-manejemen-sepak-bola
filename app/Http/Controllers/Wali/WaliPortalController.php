<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use App\Models\Athlete;
use App\Models\Attendance;
use App\Models\Report;
use App\Models\Finance;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WaliPortalController extends Controller
{
    // 1. Dashboard & Biodata Anak
    public function dashboard(Request $request)
    {
        // Ambil daftar anak yang terhubung dengan akun wali ini
        $myAthletes = Auth::user()->athletes;

        // Jika punya lebih dari 1 anak, izinkan filter berdasarkan ID anak yang dipilih
        $selectedId = $request->get('child_id', $myAthletes->first()->id ?? null);
        $athlete = $myAthletes->where('id', $selectedId)->first() ?? $myAthletes->first();

        // Ambil pengumuman terbaru dari akademi
        $announcements = Announcement::where('is_active', '=', true, 'and')->latest('created_at')->take(5)->get();

        return view('wali.dashboard', compact('myAthletes', 'athlete', 'announcements'));
    }

    // 2. Laporan Raport & Rekapitulasi Absensi Anak
    public function raportDanAbsensi(Request $request)
    {
        $myAthletes = Auth::user()->athletes;
        $selectedId = $request->get('child_id', $myAthletes->first()->id ?? null);
        $athlete = $myAthletes->where('id', $selectedId)->first() ?? $myAthletes->first();

        $attendances = [];
        $reports = [];
        $rekapAbsen = ['hadir' => 0, 'izin' => 0, 'sakit' => 0, 'alpa' => 0];

        if ($athlete) {
            // Tarik riwayat absensi anak
            $attendances = Attendance::where('athlete_id', '=', $athlete->id, 'and')->latest('created_at')->paginate(10);
            
            // Hitung rekap statistik absensi
            $rekapAbsen['hadir'] = Attendance::where('athlete_id', '=', $athlete->id, 'and')->where('status', '=', 'hadir', 'and')->count('*');
            $rekapAbsen['izin'] = Attendance::where('athlete_id', '=', $athlete->id, 'and')->where('status', '=', 'izin', 'and')->count('*');
            $rekapAbsen['sakit'] = Attendance::where('athlete_id', '=', $athlete->id, 'and')->where('status', '=', 'sakit', 'and')->count('*');
            $rekapAbsen['alpa'] = Attendance::where('athlete_id', '=', $athlete->id, 'and')->where('status', '=', 'alpa', 'and')->count('*');

            // Tarik data raport evaluasi
            $reports = Report::where('athlete_id', '=', $athlete->id, 'and')->latest('created_at')->get();
        }

        return view('wali.raport_absensi', compact('myAthletes', 'athlete', 'attendances', 'rekapAbsen', 'reports'));
    }

    // 3. Transparansi Laporan Keuangan (Uang Kas)
    public function keuangan()
    {
        $finances = Finance::orderBy('tanggal', 'desc')->orderBy('id', 'desc')->paginate(15);
        $totalPemasukan = Finance::where('jenis', '=', 'pemasukan', 'and')->sum('nominal');
        $totalPengeluaran = Finance::where('jenis', '=', 'pengeluaran', 'and')->sum('nominal');
        $saldoSekarang = $totalPemasukan - $totalPengeluaran;

        return view('wali.keuangan', compact('finances', 'totalPemasukan', 'totalPengeluaran', 'saldoSekarang'));
    }

    // 4. Daftar Pengumuman Lengkap
    public function pengumuman()
    {
        $announcements = Announcement::where('is_active', '=', true, 'and')->latest('created_at')->paginate(10);
        return view('wali.pengumuman', compact('announcements'));
    }
}