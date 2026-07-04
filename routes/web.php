<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AthleteController;
use App\Http\Controllers\Admin\CoachController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\FinanceController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Wali\WaliPortalController;

// Rute Modul Landing Page (Publik)
Route::controller(LandingPageController::class)->group(function () {
    Route::get('/', 'index')->name('landing.home');
    Route::get('/profil-coach', 'coaches')->name('landing.coaches');
    Route::get('/jadwal-latihan', 'schedule')->name('landing.schedule');
    Route::get('/prestasi', 'achievements')->name('landing.achievements');
    Route::get('/galeri', 'gallery')->name('landing.gallery');
    Route::get('/pendaftaran', 'registration')->name('landing.registration');
});
// --- RUTE AUTENTIKASI ---
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- RUTE MODUL 3: PANEL ADMIN (Backend) ---
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); // Sementara kita arahkan ke file view sederhana
    })->name('dashboard');
});

// --- RUTE MODUL 4: PORTAL WALI MURID (Frontend User) ---
Route::middleware(['auth', 'role:wali_murid'])->prefix('portal-wali')->name('wali.')->group(function () {
    Route::get('/dashboard', function () {
        return view('wali.dashboard'); // Sementara kita arahkan ke file view sederhana
    })->name('dashboard');
});
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Route CRUD Data Atlet (Murid)
    Route::resource('/athletes', AthleteController::class);
});
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // ... rute dashboard & athletes sebelumnya ...
    
    // Route CRUD Coach & Absensi
    Route::resource('/coaches', CoachController::class);
    Route::resource('/attendances', AttendanceController::class);
});
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // ... rute dashboard, athletes, coaches, attendances sebelumnya ...

    // Rute Keuangan, Pengumuman, dan Raport
    Route::resource('/finances', FinanceController::class);
    Route::resource('/announcements', AnnouncementController::class);
    Route::resource('/reports', ReportController::class);
});
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // ... rute admin lainnya ...
    
    // Rute CRUD Jadwal Latihan
    Route::resource('/schedules', ScheduleController::class);
});
Route::middleware(['auth', 'role:wali_murid'])->prefix('portal-wali')->name('wali.')->group(function () {
    Route::get('/dashboard', [WaliPortalController::class, 'dashboard'])->name('dashboard');
    Route::get('/raport-absensi', [WaliPortalController::class, 'raportDanAbsensi'])->name('raport.absensi');
    Route::get('/keuangan', [WaliPortalController::class, 'keuangan'])->name('keuangan');
    Route::get('/pengumuman', [WaliPortalController::class, 'pengumuman'])->name('pengumuman');
});