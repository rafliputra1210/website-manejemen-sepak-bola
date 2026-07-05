<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Report;
use App\Models\Attendance;
use App\Models\Announcement;
use App\Models\Athlete;
use App\Models\Schedule;
use App\Models\Banner;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    // 1. Beranda (Home) - Menampilkan statistik real & pengumuman aktif
    public function index()
    {
        $totalAthlete = Athlete::count('*');
        $totalCoach = Coach::count('*');
        $announcements = Announcement::where('is_active', '=', true, 'and')->latest('created_at')->take(3)->get();
        $banners = Banner::where('is_active', true)->orderBy('urutan')->take(5)->get();
        
        return view('landing.home', compact('totalAthlete', 'totalCoach', 'announcements', 'banners'));
    }

    // 2. Profil Coach - Menampilkan seluruh coach dari database
    public function coaches()
    {
        $coaches = Coach::latest('created_at')->get();
        return view('landing.coaches', compact('coaches'));
    }

    // 3. Jadwal Latihan - Menampilkan jadwal terstruktur
    public function schedule()
{
    // Mengambil jadwal beserta data coach-nya
    $schedules = Schedule::with('coach')->latest('created_at')->get();
    
    return view('landing.schedule', compact('schedules'));
}

    // 4. Prestasi - Menampilkan data prestasi yang diinput admin di modul Raport
    public function achievements()
    {
        // Mengambil raport yang kolom prestasinya terisi (tidak kosong)
        $reportsWithAchievements = Report::with('athlete')
            ->whereNotNull('prestasi')
            ->where('prestasi', '!=', '')
            ->latest()
            ->get();

        return view('landing.achievements', compact('reportsWithAchievements'));
    }

    // 5. Galeri - Menampilkan foto-foto bukti absensi latihan & kegiatan dari admin
    public function gallery()
    {
        // Mengambil data absensi yang memiliki lampiran foto bukti kegiatan
        $galleries = Attendance::with('athlete')
            ->whereNotNull('foto_bukti')
            ->latest()
            ->paginate(12);

        return view('landing.gallery', compact('galleries'));
    }

    // 6. Informasi Pendaftaran
    public function registration()
    {
        return view('landing.registration');
    }
}